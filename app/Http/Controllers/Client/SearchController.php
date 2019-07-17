<?php

namespace App\Http\Controllers\Client;

use App\Model\Classes;
use App\Model\Event;
use App\Model\Post;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        $keyword = $_GET['keyword'];
        $products = Product::where('name','like' , '%'.$keyword.'%')->latest()->get();
        $classes = Classes::where('name','like' , '%'.$keyword.'%')->latest()->get();
        $posts = Post::where('title','like' ,'%'.$keyword.'%')->latest()->get();
        $events = Event::where('title','like' , '%'.$keyword.'%')->latest()->get();
        $data = compact(
            'products',
            'classes',
            'posts',
            'events'
        );
        return view('client.search.index' , $data);
    }
}
