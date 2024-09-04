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
        $cars = Car::all();
        return view('backend.layout.car.index');
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
        
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $file) {
                    $extension = $file->getClientOriginalExtension();
                    $imagePath = $key . '-' . time() . '.' . $extension;
                    $path = public_path('uploads/cars');
                    $file->move($path, $imagePath);
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
            return redirect(route('car'))->with('t-success', 'Car added successfully.');
        } catch (Exception $e) {
            // If an error occurs, redirect back with an error message
            return back()->with('t-error', 'Failed to added Car');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:100',
            'make' => 'sometimes|required|string|max:100',
            'model' => 'sometimes|required|string|max:100',
            'year' => 'sometimes|required|date',
            'license_plate' => 'sometimes|required|string|max:255|unique:cars,license_plate,' . $id,
            'rental_price_per_day' => 'sometimes|required|numeric',
            'available' => 'sometimes|required|in:yes,no',
            'status' => 'sometimes|required|in:repair,ok',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $car = Car::findOrFail($id);
            $car->update($request->all());

            // Flash a success message with options
            flash()
                ->options([
                    'timeout' => 3000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Car Data Updated.');

            // Redirect to the Car index page with a success message
            return redirect(route('car.index'))->with('t-success', 'Car updated successfully.');
        } catch (Exception $e) {
            return back()->with('t-error', 'Failed to update Car');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::findOrFail($id)->delete();
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->success('Car Data Delete Success.');
        return redirect()->route('car.index');
    }
}
