<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function edit()
    {
        $homeContent = HomeContent::first();
        return view('admin.Home.edit', compact('homeContent'));
    }

    public function update(Request $request)
{
    $validator = Validator::make($request->all(), [
        'section1title' => 'nullable',
        'section1subtitle' => 'nullable',
        'section1buttontext' => 'nullable',
        'section1buttonlink' => 'nullable',
        'section1image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
        'section2title' => 'nullable',
        'section2description' => 'nullable',
        'section2buttontext' => 'nullable',
        'section2buttonlink' => 'nullable',
        'section2image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
        'aboutservicetitle' => 'nullable',
        'aboutservicedescription' => 'nullable',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $homeContent = HomeContent::first();

    $input = $request->except('_token', '_method');

    if ($request->hasFile('section1image')) {
        // Delete old image if exists
        if ($homeContent->section1image && File::exists(public_path($homeContent->section1image))) {
            File::delete(public_path($homeContent->section1image));
        }

        // Upload new image
        $section1image = $request->file('section1image');
        $section1imageName = time() . '_' . $section1image->getClientOriginalName();
        $section1image->move(public_path('images'), $section1imageName);
        $input['section1image'] = 'images/' . $section1imageName;
    }

    if ($request->hasFile('section2image')) {
        // Delete old image if exists
        if ($homeContent->section2image && File::exists(public_path($homeContent->section2image))) {
            File::delete(public_path($homeContent->section2image));
        }

        // Upload new image
        $section2image = $request->file('section2image');
        $section2imageName = time() . '_' . $section2image->getClientOriginalName();
        $section2image->move(public_path('images'), $section2imageName);
        $input['section2image'] = 'images/' . $section2imageName;
    }

    $homeContent->update($input);

    return redirect()->route('home-content.edit')->with('success', 'Home content updated successfully.');
}

}
