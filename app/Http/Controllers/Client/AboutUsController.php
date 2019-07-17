<?php

namespace App\Http\Controllers\Client;

use App\Model\AboutUs;
use App\Model\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::find(1);
        $setting = Setting::find(1);
        $data = compact(
            'about',
            'setting'
        );
        return view('client.pages.about' , $data);
    }
}
