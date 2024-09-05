<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Flasher\Prime\FlasherInterface;
use App\Helper\Helper;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = Page::all();
        return view('backend.layout.page.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layout.page.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, FlasherInterface $flasher)
    {
        $request->validate([
            'slug' => 'required',
            'title' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $page = new page;
        $page->slug = $request->slug;
        $page->title = $request->title;
        $page->description = $request->description;

        if ($request->hasFile('image')) {
            $page->image = Helper::fileUpload($request->file('image'), 'page', Str::random(20));
        }

        if (!empty($request->status)) {
            $page->status = $request->status;
        }

        $page->save();

        $flasher->options([
            'timeout' => 3000,
            'position' => 'top-right',
        ])->success('Your account has been re-activated.');

        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('backend.layout.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('backend.layout.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FlasherInterface $flasher, $id)
    {
        $request->validate([
            'title' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $page = Page::find($id)->first();

        $page->title = $request->title;
        $page->description = $request->description;
        if ($request->hasFile('image')) {
            $page->image = Helper::fileUpload($request->file('image'), 'page', Str::random(20));
        }
        $page->status = $request->status;
        $page->save();

        $flasher->options([
            'timeout' => 3000,
            'position' => 'top-right',
        ])->success('Your account has been re-activated.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->success('page Data Delete Success.');
        return redirect()->route('page.index');
    }
}
