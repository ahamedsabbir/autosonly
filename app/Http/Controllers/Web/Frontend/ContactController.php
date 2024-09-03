<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function store(Request $request, FlasherInterface $flasher)
    {
        Contact::create($request->all());
        $flasher->options([
            'timeout' => 3000,
            'position' => 'top-right',
        ])->success('Your account has been re-activated.');
        return redirect()->back();
    }
}
