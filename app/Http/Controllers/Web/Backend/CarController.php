<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarsImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('images')->orderBy("created_at", "desc")->get();
       return view('backend.layout.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layout.car.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  Create a validator instance and define validation rules for the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'make' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required',
            'license_plate' => 'required|string|max:255|unique:cars',
            'rental_price_per_day' => 'required|numeric',
            'available' => 'required|in:yes,no',
            'status' => 'required|in:repair,ok',
            'images.*' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            // Create a new Car entry with the sanitized data
            $car = Car::create([
                'name' => $request->name,
                'make' => $request->make,
                'model' => $request->model,
                'year' => $request->year,
                'license_plate' => $request->license_plate,
                'rental_price_per_day' => $request->rental_price_per_day,
                'available' => $request->available,
                'status' => $request->status,
            ]);

            // Check if the request contains any files with the name 'images'
            if ($request->hasFile('images')) {
                // Loop through each file in the 'images' array
                foreach ($request->file('images') as $key => $file) {
                    $extension = $file->getClientOriginalExtension();
                    // Create a unique file name using the key and current timestamp
                    $imagePath = $key . '-' . time() . '.' . $extension;
                    $path = public_path('uploads/cars');
                    $file->move($path, $imagePath);
                    // Create a new record in the CarsImage table with the car ID and image URL
                    CarsImage::create([
                        'car_id' => $car->id,
                        'image_url' => $imagePath,
                    ]);
                }
            }

            // Flash a success message with options
            flash()
                ->options([
                    'timeout' => 3000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Car Data Added.');

            // Redirect to the Car index page with a success message
           return redirect(route('admin-cars.index'));
        } catch (Exception $e) {
            // If an error occurs, redirect back with an error message
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Car::with('images')->findOrFail($id);
        //dd($data->images);
        return view('backend.layout.car.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Car::find($id);
        return view('backend.layout.car.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //  Create a validator instance and define validation rules for the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'make' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required',
            'rental_price_per_day' => 'required|numeric',
            'available' => 'required|in:yes,no',
            'status' => 'required|in:repair,ok',
            //'images.*' => 'required|image|mimes:png,jpg,jpeg,webp',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $car = Car::findOrFail($id);
            // update Car entry with the sanitized data
            $car->update([
                'name' => $request->name,
                'make' => $request->make,
                'model' => $request->model,
                'year' => $request->year,
                'rental_price_per_day' => $request->rental_price_per_day,
                'available' => $request->available,
                'status' => $request->status,
            ]);

            // Flash a success message with options
            flash()->success('Car Data Updated.');

            // Redirect to the Car index page with a success message
            return redirect(route('admin-cars.index'));
        } catch (Exception $e) {
            return back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::findOrFail($id)->delete();
        flash()->success('Car Data Delete Success.');
        return redirect()->route('admin-cars.index');
    }
}
