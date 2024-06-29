<?php

namespace App\Http\Controllers;

use App\Models\AirconPage;
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
