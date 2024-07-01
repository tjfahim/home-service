<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BookingManageController extends Controller
{
    public function index(Request $request, $status = null)
    {
        $query = BookingManage::query();
    
        // Filter by status if provided
        if ($request->has('status')) {
            $status = strtolower($request->status); // Convert status to lowercase
            if ($status == 'all') {
                $query = BookingManage::query();
            } else {
                $query->where('status', $status); // Filter by the lowercase status
            }
        } elseif ($status !== null) { // Handle the route parameter
            $status = strtolower($status); // Convert status to lowercase
            $query->where('status', $status); // Filter by the lowercase status
        }
    
        // Sort by created_at
        $sortBy = $request->input('sort_by', 'created_at-desc');
        if ($sortBy == 'created_at-asc') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }
    
        $bookingManages = $query->get();
    
        // Return the view or JSON response as needed
        return view('admin.BookingManage.index', compact('bookingManages'));
    }
    
    

   
    // Show the form for editing the specified resource
    public function edit($id)
    {
        $bookingManage = BookingManage::findOrFail($id);
        return view('admin.BookingManage.edit', compact('bookingManage'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $bookingManage = BookingManage::findOrFail($id);

        $validator = Validator::make($request->all(), [
           
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:35',
            'description' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);
        
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    
        $bookingManage->update($request->all());
    
        return redirect()->route('bookingmanage.index')->with('success', 'Booking updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $bookingManage = BookingManage::findOrFail($id);
        $bookingManage->delete();
    
        return redirect()->route('bookingmanage.index')->with('success', 'Booking deleted successfully.');
    }
}
