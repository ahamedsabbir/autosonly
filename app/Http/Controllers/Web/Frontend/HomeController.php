<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->put('alert-success', "Please Login First");
        // return redirect()->route('home')->with('alert', 'Please Login First');	
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
}
