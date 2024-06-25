<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Services::orderBy('created_at', 'desc')->get();
        return view('admin.Service.index', compact('services'));
    }

    // Show the form for creating a new service
    public function create()
    {
        $categories = ServiceCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.Service.add', compact('categories'));
    }

    // Store a newly created service in storage
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'time_duration' => 'nullable|string',
            'price' => 'nullable|numeric',
            'location' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'status' => 'required|boolean',
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

        Services::create($input);

        return redirect()->route('service.index')->with('success', 'Service created successfully.');
    }

    // Show the form for editing the specified service
    public function edit($id)
    {
        $service = Services::findOrFail($id);
        $categories = ServiceCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.Service.edit', compact('service', 'categories'));
    }

    // Update the specified service in storage
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'time_duration' => 'nullable|string',
            'price' => 'nullable|numeric',
            'location' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $service = Services::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (File::exists(public_path($service->image))) {
                File::delete(public_path($service->image));
            }
            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services'), $imageName);
            $input['image'] = 'images/services/' . $imageName;
        }

        $service->update($input);

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }

    // Remove the specified service from storage
    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        
        // Delete the image from storage if exists
        if (File::exists(public_path($service->image))) {
            File::delete(public_path($service->image));
        }
        
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}
