<?php

namespace App\Http\Controllers\Client;

use App\Model\Classes;
use App\Model\Image;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::orderBy('id', 'desc')->paginate(8);
        $data = compact(
            'classes'
        );

        return view('client.classes.index', $data);
    }

    public function detail($slug)
    {
        $class = Classes::where('slug' , $slug)->first();
        if(is_null($class)){
            abort(404);
        }

        $images = Image::where('type' , 'classes')->where('object_id' , $class->id)->orderBy('id','desc')->get();
        $videos = Video::where('type' , 'classes')->where('object_id' , $class->id)->orderBy('id','desc')->get();

        $data = compact(
            'class',
            'images',
            'videos'
        );
        return view('client.classes.detail' , $data);
    }
}
