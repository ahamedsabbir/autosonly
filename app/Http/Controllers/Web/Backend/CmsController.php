<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helper\Helper;
use App\Models\Cms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cms = Cms::all();
        return view('backend.layout.cms.index', compact('cms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layout.cms.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, FlasherInterface $flasher)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cms = new Cms;
        $cms->name = $request->name;
        $cms->title = $request->title;
        $cms->description = $request->description;

        if ($request->hasFile('image')) {
            $cms->image = Helper::fileUpload($request->file('image'), 'cms', Str::random(20));
        }

        if (!empty($request->status)) {
            $cms->status = $request->status;
        }

        $cms->save();

        $flasher->options([
            'timeout' => 3000,
            'position' => 'top-right',
        ])->success('Your account has been re-activated.');

        return redirect()->route('cms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cms $cms, $id)
    {
        $cms = Cms::find($id);
        return view('backend.layout.cms.show', compact('cms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cms $cms, $id)
    {
        $cms = Cms::find($id);
        return view('backend.layout.cms.edit', compact('cms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cms $cms, FlasherInterface $flasher, $id)
    {
        $request->validate([
            'title' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cms = Cms::find($id)->first();

        $cms->title = $request->title;
        $cms->description = $request->description;
        if ($request->hasFile('image')) {
            $cms->image = Helper::fileUpload($request->file('image'), 'cms', Str::random(20));
        }
        $cms->status = $request->status;
        $cms->save();

        $flasher->options([
            'timeout' => 3000,
            'position' => 'top-right',
        ])->success('Your account has been re-activated.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cms $cms, $id)
    {
        $cms = Cms::find($id);
        $cms->delete();
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])
            ->success('Cms Data Delete Success.');
        return redirect()->route('cms.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function statusChange($id, FlasherInterface $flasher)
    {
        $cms = Cms::find($id);
        $cms->status = $cms->status == 'active' ? 'inactive' : 'active';

        $cms->save();

        $flasher->options([
            'timeout' => 3000,
            'position' => 'top-right',
        ])->success('Your account has been re-activated.');

        return redirect()->back();
    }
}
