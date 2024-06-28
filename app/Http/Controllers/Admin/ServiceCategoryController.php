<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::where('status', true)->orderBy('created_at', 'desc')->get();
        return view('admin.ServiceCategory.index', compact('categories'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.ServiceCategory.add');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:service_categories,name',
            'price' => 'required',
            'description' => 'required',
            'feature' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',

            'status' => 'required|string',
        ]);
      
    
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imageName);
            $input['image'] = 'images/services/' . $imageName;
        }

    
        ServiceCategory::create($input);
    
        return redirect()->route('service.category.index')->with('success', 'Category created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $category = ServiceCategory::findOrFail($id);
        return view('admin.ServiceCategory.edit', compact('category'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $category = ServiceCategory::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required',
            'description' => 'required',
            'feature' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp',

            'status' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $input = $request->all();
    
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }
            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imageName);
            $input['image'] = 'images/services/' . $imageName;
        }

        $category->update($input);
    
        return redirect()->route('service.category.index')->with('success', 'Service Category updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $category = ServiceCategory::findOrFail($id);
        if (File::exists(public_path($category->image))) {
            File::delete(public_path($category->image));
        }
        $category->delete();
    
        return redirect()->route('service.category.index')->with('success', 'Category deleted successfully.');
    }
}
