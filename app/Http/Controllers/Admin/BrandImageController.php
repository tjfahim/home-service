<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BrandImageController extends Controller
{
    public function index()
    {
        $brandImages = BrandImage::where('status', true)->orderBy('created_at', 'desc')->get();
        return view('admin.BrandImage.index', compact('brandImages'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.BrandImage.add');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'status' => 'required|boolean',
        ]);
    
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $input = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/brand'), $imageName);
            $input['image'] = 'images/brand/' . $imageName;
        }
    
        BrandImage::create($input);
    
        return redirect()->route('brandimage.index')->with('success', 'Brand Image created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $brandImage = BrandImage::findOrFail($id);
        return view('admin.BrandImage.edit', compact('brandImage'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $brandImage = BrandImage::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'status' => 'required|boolean',
        ]);
        
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $input = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($brandImage->image && File::exists(public_path($brandImage->image))) {
                File::delete(public_path($brandImage->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/brand'), $imageName);
            $input['image'] = 'images/brand/' . $imageName;
        }
    
        $brandImage->update($input);
    
        return redirect()->route('brandimage.index')->with('success', 'Brand Image updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $brandImage = BrandImage::findOrFail($id);
        
        // Delete image file if exists
        if ($brandImage->image && File::exists(public_path($brandImage->image))) {
            File::delete(public_path($brandImage->image));
        }

        $brandImage->delete();
    
        return redirect()->route('brandimage.index')->with('success', 'Brand Image deleted successfully.');
    }
}
