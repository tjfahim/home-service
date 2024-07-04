<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ContactManageController extends Controller
{
    public function index(Request $request)
    {
        $contactManages = ContactManage::get();
    
        return view('admin.ContactManage.index', compact('contactManages'));
    }
    
    // Show the form for editing the specified resource
    public function edit($id)
    {
        $contactManage = ContactManage::findOrFail($id);
        return view('admin.ContactManage.edit', compact('contactManage'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $contactManage = ContactManage::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:35',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    
        $contactManage->update($request->all());
    
        return redirect()->route('contactmanage.index')->with('success', 'Contact updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $contactManage = ContactManage::findOrFail($id);
        $contactManage->delete();
    
        return redirect()->route('contactmanage.index')->with('success', 'Contact deleted successfully.');
    }
}
