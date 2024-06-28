<?php

namespace App\Http\Controllers;

use App\Models\BrandImage;
use App\Models\HomeContent;
use App\Models\ServiceCategory;
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
}
