<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CivilPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CivilPageController extends Controller
{
   
    public function edit()
    {
        $civilPage = CivilPage::first();
        return view('admin.civilpage.edit', compact('civilPage'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'title' => 'nullable',
            'description' => 'nullable',
            'book_link' => 'nullable',
            'service1image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'service2image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'service3image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'service1title' => 'nullable',
            'service2title' => 'nullable',
            'service3title' => 'nullable',
            'price1' => 'nullable',
            'price2' => 'nullable',
            'price3' => 'nullable',
            'service1description' => 'nullable',
            'service2description' => 'nullable',
            'service3description' => 'nullable',
            'final_description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $civilPage = CivilPage::first();

        $input = $request->except('_token', '_method');

        // Handle image upload and replacement
        foreach (['image', 'service1image', 'service2image', 'service3image'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete old image if exists
                if ($civilPage->$imageField && File::exists(public_path($civilPage->$imageField))) {
                    File::delete(public_path($civilPage->$imageField));
                }

                // Upload new image
                $image = $request->file($imageField);
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $input[$imageField] = 'images/' . $imageName;
            }
        }

        $civilPage->update($input);

        return redirect()->route('civilpage.edit')->with('success', 'Civil page content updated successfully.');
    }
}
