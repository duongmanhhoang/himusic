<?php

namespace App\Http\Controllers\Client;
use App\Model\Album;
use App\Model\Banner;
use App\Model\Category;
use App\Model\Classes;
use App\Model\Event;
use App\Model\Product;
use App\Model\Setting;
use App\Model\Slide;
use App\Model\Testimonial;
use App\Model\TypeClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $new_classes = Classes::orderBy('id', 'desc')->limit(2)->get();
        $types = TypeClass::orderBy('id', 'desc')->get();
        $classes = Classes::orderBy('id', 'desc')->limit(6)->get();
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        $events = Event::orderBy('id', 'desc')->limit(3)->get();
        $data = compact(
            'new_classes',
            'types',
            'classes',
            'testimonials',
            'events'
        );

        return view('client.index', $data);
    }

}
