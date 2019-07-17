<?php

namespace App\Http\Controllers\Client;

use App\Model\Category;
use App\Model\Image;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        if(isset($_GET['order']) && $_GET['order'] == 'name_asc'){
            $products = Product::orderBy('name','asc')->paginate(9);
        }
        elseif(isset($_GET['order']) && $_GET['order'] == 'name_desc'){
            $products = Product::orderBy('name','desc')->paginate(9);
        }
        elseif(isset($_GET['order']) && $_GET['order'] == 'price_desc'){
            $products = Product::orderBy('price','desc')->paginate(9);
        } elseif(isset($_GET['order']) && $_GET['order'] == 'price_asc'){
            $products = Product::orderBy('price','asc')->paginate(9);
        }
        elseif(isset($_GET['keyword'])){
            $products = Product::where('name' , 'LIKE' , '%'.$_GET['keyword'].'%')->orderBy('id','desc')->paginate(9);
        }
        else{

            $products = Product::latest()->paginate(9);
        }
        $data = compact(
            'products'
        );
        return view('client.products.index' , $data);
    }

    public function detail($slug)
    {
        $product = Product::where('slug' , $slug)->first();
        if(is_null($product)){
            abort(404);
        }
        $images = Image::where('type' , 'product')->where('object_id' , $product->id)->orderBy('id','desc')->get();
        $data = compact(
            'product',
            'images'
        );
        return view('client.products.detail' , $data);
    }

    public function categories($slug){
        $category = Category::where('type' , 'product')->where('slug', $slug)->first();
        if(is_null($category)){
            abort(404);
        }
        if(isset($_GET['order']) && $_GET['order'] == 'name_asc'){
            $products = Product::where('cate_id' , $category->id)->orderBy('name','asc')->paginate(9);
        }
        elseif(isset($_GET['order']) && $_GET['order'] == 'name_desc'){
            $products = Product::where('cate_id' , $category->id)->orderBy('name','desc')->paginate(9);
        }
        elseif(isset($_GET['order']) && $_GET['order'] == 'price_desc'){
            $products = Product::where('cate_id' , $category->id)->orderBy('price','desc')->paginate(9);
        } elseif(isset($_GET['order']) && $_GET['order'] == 'price_asc'){
            $products = Product::where('cate_id' , $category->id)->orderBy('price','asc')->paginate(9);
        }
        elseif(isset($_GET['keyword'])){
            $products = Product::where('name' , 'LIKE' , '%'.$_GET['keyword'].'%')->orderBy('id','desc')->paginate(9);
        }else{
            $products = Product::where('cate_id' , $category->id)->orderBy('id' , 'desc')->paginate(9);
        }

        $data = compact(
            'category',
            'products'
        );
        return view('client.products.categories' , $data);
    }
}
