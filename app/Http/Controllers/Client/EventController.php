<?php

namespace App\Http\Controllers\Client;

use App\Model\Event;
use App\Model\Image;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $latest_event = Event::latest()->first();
        $events = Event::latest()->paginate(4);
        $data = compact(
            'latest_event',
            'events'
        );
        return view('client.events.index',$data);
    }

    public function detail($slug)
    {
        $event = Event::where('slug' , $slug)->first();
        if(is_null($event)){
            abort(404);
        }
        $images = Image::where('type' , 'event')->where('object_id', $event->id)->orderBy('id','desc')->get();
        $videos = Video::where('type' , 'event')->where('object_id', $event->id)->orderBy('id','desc')->get();
        $data = compact(
            'event',
            'images',
            'videos'
        );
        return view('client.events.detail' , $data);
    }
}
