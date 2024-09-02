<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::latest('id')->first();
        return view('backend.layout.settings', compact('settings'));
    }
    public function update(Request $request, Setting $setting)
    {
        $setting = Setting::latest('id')->first();

        // Check Exit Of Setting
        if ($setting == null) {
            $setting = new Setting();
        }

        $setting->title = $request->title;
        $setting->description = $request->description;
        $setting->address = $request->address;

        // Upload Logo
        if (!empty($request['logo'])) {
            if (empty($setting->logo)) {
                // Upload New Logo
                $logo = Helper::fileUpload($request->logo, 'setting', 'logo');
            } else {
                // Remove Old File
                @unlink(public_path('/') . $setting->logo);

                // Upload New Logo
                $logo = Helper::fileUpload($request->logo, 'setting', 'logo');
            }
            $setting->logo = $logo;
        }

        // Upload Favicon
        if (!empty($request['favicon'])) {
            if (empty($setting->favicon)) {
                // Upload New Favicon
                $favicon = Helper::fileUpload($request->favicon, 'setting', 'favicon');
            } else {
                // Remove Old File
                @unlink(public_path('/') . $setting->favicon);

                // Upload New Favicon
                $favicon = Helper::fileUpload($request->favicon, 'setting', 'favicon');
            }
            $setting->favicon = $favicon;
        }

        $setting->save();

        return redirect()->route('settings')->with('t-success', 'Update successfully.');
    }
}
