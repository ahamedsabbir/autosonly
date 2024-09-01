<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
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
