<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //$request->session()->put('success', "Please Login First");
        //return redirect()->route('home')->with('alert', 'Please Login First');	
        return view('frontend.layout.index');
        //return redirect()->back()->with('success', 'Operation successful!');
    }
    public function faq()
    {
        return view('frontend.layout.faq');
    }
    public function about()
    {
        return view('frontend.layout.about');
    }
    public function dynamicPages($id)
    {
        $page = Page::where('id', $id)->first();
        if (!$page) {
            abort(404);
        }
        return view('frontend.layout.page', [
            'page' => $page
        ]);
    }
}
