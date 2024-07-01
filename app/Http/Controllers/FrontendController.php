<?php

namespace App\Http\Controllers;

use App\Models\AirconPage;
use App\Models\BookingManage;
use App\Models\BrandImage;
use App\Models\CivilPage;
use App\Models\ElectricalPage;
use App\Models\HomeContent;
use App\Models\HvacPage;
use App\Models\PlumbingPage;
use App\Models\ServiceCategory;
use App\Models\Services;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function home()
    {
        $brands =BrandImage::where('status',1)->get();
        $homeContent = HomeContent::first();
        $setting = Settings::first();
        $features = ServiceCategory::where('feature',1)->where('status',1)->get();

        return view('frontend.index', compact('homeContent','brands','setting','features'));

    }
    public function categorydetails($id)
    {
        $category = ServiceCategory::find($id);
        $services = Services::where('service_category_id',$id)->get();
        return view('frontend.categorydetails', compact('services','category'));

    }
    public function booking($id)
    {
        $service = Services::find($id);
        return view('frontend.booking-page', compact('service'));
    }
     // Store a newly created resource in storage
     public function bookingStore(Request $request)
     {
         Validator::extend('not_in_past', function ($attribute, $value, $parameters, $validator) {
             return strtotime($value) >= strtotime(date('Y-m-d'));
         });
     
         // Set custom error messages for the validation rule
         $messages = [
             'date.not_in_past' => 'The selected date must not be in the past.',
         ];
     
         // Validate the incoming request data
         $validator = Validator::make($request->all(), [
             'services_id' => 'required|exists:services,id',
             'date' => ['required', 'date', 'not_in_past'], // Apply the custom rule here
             'time' => 'required',
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255',
             'phone' => 'required|string|max:35',
             'description' => 'nullable|string|max:255',
         ], $messages);
     
         // Redirect back with errors if validation fails
         if ($validator->fails()) {
             return Redirect::back()->withInput()->withErrors($validator);
         }
         // Create a new booking using the BookingManage model
         BookingManage::create([
             'services_id' => $request->service_id,
             'date' => $request->date,
             'time' => $request->time,
             'name' => $request->name,
             'email' => $request->email,
             'phone' => $request->phone,
             'description' => $request->description,
             'status' => 'pending',
         ]);
     
         // Redirect back with success message
         return redirect()->back()->with('success', 'Booking created successfully.');
     }
    public function allservice($id = null)
    {
        $categories = ServiceCategory::all();

        if (is_null($id)) {
            $selectedCategory = ServiceCategory::first();
        } else {
            $selectedCategory = ServiceCategory::find($id);
        }
    
        // If selectedCategory is null, handle it appropriately
        if (is_null($selectedCategory)) {
            $services = collect(); // No services if no category is found
        } else {
            $services = Services::where('service_category_id', $selectedCategory->id)->get();
        }
    
        return view('frontend.allservice', compact('categories', 'selectedCategory', 'services'));
    }
    public function hvacpage()
    {
        $content = HvacPage::first();
        return view('frontend.hvacpage', compact('content'));

    }
   
    public function civilpage()
    {
        $content = CivilPage::first();
        return view('frontend.civilpage', compact('content'));

    }
   
    public function plumbingpage()
    {
        $content = PlumbingPage::first();
        return view('frontend.plumbingpage', compact('content'));

    }
   
    public function airconpage()
    {
        $content = AirconPage::first();
        return view('frontend.airconpage', compact('content'));

    }
   
    public function electricalpage()
    {
        $content = ElectricalPage::first();
        return view('frontend.electricalpage', compact('content'));

    }
   
}
