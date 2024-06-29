<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HvacPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HvacPageController extends Controller
{
    

    public function edit()
    {
        $hvacPage = HvacPage::first();
        return view('admin.hvacpage.edit', compact('hvacPage'));
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

        $hvacPage = HVACPage::first();

        $input = $request->except('_token', '_method');

        // Handle image upload and replacement
        foreach (['image', 'service1image', 'service2image', 'service3image'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete old image if exists
                if ($hvacPage->$imageField && File::exists(public_path($hvacPage->$imageField))) {
                    File::delete(public_path($hvacPage->$imageField));
                }

                // Upload new image
                $image = $request->file($imageField);
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $input[$imageField] = 'images/' . $imageName;
            }
        }

        $hvacPage->update($input);

        return redirect()->route('hvacpage.edit')->with('success', 'HVAC page content updated successfully.');
    }
}
