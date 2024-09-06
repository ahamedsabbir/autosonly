<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class HomeController extends Controller
{
    public function index(Request $request)
    {	
        $faqs = Faq::all();
        return view('frontend.layout.index');
    }
    public function faq()
    {
        return view('frontend.layout.faq');
    }
    public function about()
    {
        return view('frontend.layout.about');
    }
    public function cars()
    {
        return view('frontend.layout.cars', [
            'cars' => Car::with('images', 'review')->paginate(12),
            'recent_cars' => Car::latest()->take(3)->get()
        ]);
    }
    public function car($id)
    {
        return view('frontend.layout.car', [
            'car' => Car::find($id),
            'recent_cars' => Car::latest()->take(3)->get()
        ]);
    }
    public function dynamicPages($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if (!$page) {
            abort(404);
        }
        return view('frontend.layout.page', [
            'page' => $page
        ]);
    }
    public function search(Request $request){
        //dd($request->location);

        if ($request->has('available') && $request->available == "yes") {
            $query = Car::where('available', 'yes');
        }else{
            $query = Car::query();
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        if ($request->has('location')) {
            $query->where('location', $request->location);
        }

        if ($request->has('price')) {
            $query->whereBetween('rental_price_per_day', [$request->price, $request->price + 100]);
        }

        if($request->has('transmission')){
            $query->where('transmission', $request->transmission);
        }

        if($request->has('bags')){
            $query->where('bags', $request->bags);
        }

        if($request->has('review')){
            $query->whereHas('review', function($q) use ($request) {
                $q->where('rating', $request->review);
            });

        }

        $cars = $query->orderBy('id', 'desc')->paginate(12);

        return view('frontend.layout.cars', [
            'cars' => $cars
        ]);
    }
}
