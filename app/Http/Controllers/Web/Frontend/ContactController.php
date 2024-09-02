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
        session()->flash('success', 'Data has been saved successfully!');
        return redirect()->back();
    }
}
