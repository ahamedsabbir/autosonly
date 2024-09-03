<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderBy("created_at", "desc")->get();
        return view('backend.layout.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layout.faq.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            // Remove the 'files' key from the request data
            $request->offsetUnset('files');

            // Sanitize the description field by removing HTML tags
            $htmlContent = $request->input('description');
            $plainText = strip_tags($htmlContent);

            // Merge the sanitized description back into the request data
            $request->merge(['description' => $plainText]);

            // Create a new FAQ entry with the sanitized data
            Faq::create($request->all());

            // Flash a success message with options
            flash()
                ->options([
                    'timeout' => 3000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Faq Data Added.');

            // Redirect to the FAQ index page with a success message
            return redirect(route('faq.index'))->with('t-success', 'Faq added successfully.');
        } catch (Exception $e) {
            // If an error occurs, redirect back with an error message
            return back()->with('t-error', 'Failed to added Faq');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$faq = Faq::find($id);
        //return view('backend.layout.faq.show',compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Faq::find($id);
        return view('backend.layout.faq.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            // Remove the 'files' key from the request data
            $request->offsetUnset('files');

            // Sanitize the description field by removing HTML tags
            $htmlContent = $request->input('description');
            $plainText = strip_tags($htmlContent);

            // Merge the sanitized description back into the request data
            $request->merge(['description' => $plainText]);
            Faq::findOrFail($id)->update($request->all());

            flash()
                ->options([
                    'timeout' => 3000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Faq Data Update.');
            return redirect(route('faq.index'))->with('t-success', 'Faq Update successfully.');
        } catch (Exception $e) {
            return back()->with('t-error', 'Failed to Update Faq');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Faq::find($id)->delete();
        flash()
                ->options([
                    'timeout' => 3000, // 3 seconds
                    'position' => 'bottom-right',
                ])
                ->success('Faq Data Delete Success.');
        return redirect()->route('faq.index');
    }
}
