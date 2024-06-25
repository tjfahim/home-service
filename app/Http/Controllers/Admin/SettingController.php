<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Settings::first();
        return view('admin.Settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'webtitle' => 'nullable',
            'callnownumber' => 'nullable',
            'whatsapp' => 'nullable',
            'email' => 'nullable|email',
            'opentime' => 'nullable',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'pinterest' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $setting = Settings::first();
        $input = $request->except('_token', '_method');

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($setting->logo && File::exists(public_path($setting->logo))) {
                File::delete(public_path($setting->logo));
            }

            // Upload new logo
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('images'), $logoName);
            $input['logo'] = 'images/' . $logoName;
        }

        if ($request->hasFile('favicon')) {
            // Delete old favicon if exists
            if ($setting->favicon && File::exists(public_path($setting->favicon))) {
                File::delete(public_path($setting->favicon));
            }

            // Upload new favicon
            $favicon = $request->file('favicon');
            $faviconName = time() . '_' . $favicon->getClientOriginalName();
            $favicon->move(public_path('images'), $faviconName);
            $input['favicon'] = 'images/' . $faviconName;
        }

        $setting->update($input);

        return redirect()->route('settings.edit')->with('success', 'Settings updated successfully.');
    }
}
