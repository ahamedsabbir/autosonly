<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

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
            'cars' => Car::paginate(12),
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
}
