<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->back()->with('success', 'Thanks for contacting us. We will get back to you soon.');
    }
}
