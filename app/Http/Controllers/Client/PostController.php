<?php

namespace App\Http\Controllers\Client;

use App\Model\Category;
use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        if(isset($_GET['keyword'])){
            $posts = Post::where('title' , 'like' , '%'.$_GET['keyword'].'%')->orderBy('id','desc')->paginate(5);
        }
        else{
            $posts = Post::orderBy('id','desc')->paginate(5);
        }


        $data = compact(
            'posts'
        );
        return view('client.posts.index',$data);
    }

    public function detail($slug){
        $post = Post::where('slug' , $slug)->first();
        if(is_null($post)){
            abort(404);
        }
        return view('client.posts.detail' , compact('post'));
    }

    public function categories($slug){
        $category = Category::where('type' , 'post')->where('slug', $slug)->first();
        if(is_null($category)){
            abort(404);
        }
        $posts = Post::where('cate_id' , $category->id)->latest()->paginate(5);

        $data = compact(
            'category',
            'posts'
        );
        return view('client.posts.categories' , $data);

    }
}
