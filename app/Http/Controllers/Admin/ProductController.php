<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProductCategoryRequest;
use App\Model\Category;
use App\Model\Image;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id' , 'desc')->get();
        $data = compact(
            'products'
        );
        return view('admin.products.index' , $data);
    }

    public function create()
    {
        $categories = Category::where('type' , 'product')->get();
        $data = compact(
            'categories'
        );
        return view('admin.products.create' , $data);
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('type' , 'product')->get();
        $images = Image::where('type' , 'product')->where('object_id' , $id)->orderBy('id','desc')->get();
        $data = compact(
            'images',
            'product',
            'categories'
        );
        return view('admin.products.edit' , $data);
    }

    public function store(CreateProductRequest $request)
    {

        $data = $request->all();
        $image = $request->image;
        $imageName = uniqid().'-'.$image->getClientOriginalName();
        $image->move('uploads/products' , $imageName);
        $data['image'] = $imageName;
        $data['slug'] = Str::slug($request->name , '-');
        Product::create($data);
        $request->session()->flash('store');
        return redirect(route('admin.products.index'));
    }

    public function update(UpdateProductRequest $request , $id)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = uniqid().'-'.$image->getClientOriginalName();
            $image->move('uploads/products' , $imageName);
            $data['image'] = $imageName;
        }
        {
            $data['image'] = $request->old_image;
        }
        $product = Product::find($id);
        $product->image = $data['image'];
        $product->name = $data['name'];
        $product->cate_id = $data['cate_id'];
        $product->slug = $data['slug'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->sale_price = $data['sale_price'];
        if($request->sale_status){
            $product->sale_status = $data['sale_status'];
        }
        else{
            $product->sale_status = 0;
        }
        $product->meta_title = $data['meta_title'];
        $product->meta_description = $data['meta_description'];
        $product->meta_keywords = $data['meta_keywords'];
        $product->save();
        $request->session()->flash('update');
        return redirect()->back();
    }

    public function uploadImage(Request $request , $id)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move('uploads/images', $imageName);

        $image = new Image();
        $image->type = 'product';
        $image->object_id = $id;
        $image->name = $imageName;
        $image->save();
        $request->session()->flash('active');

        return response()->json(['success' => $imageName]);
    }

    public function imageDestroy(Request $request)
    {
        $filename = $request->get('filename');

        Image::where('name', $filename)->delete();
        $path = public_path() . '/uploads/images/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function imageDelete(Request $request, $id)
    {
        $name = Image::find($id)->name;
        Image::where('id' , $id)->delete();
        $path = public_path() . '/uploads/images/' . $name;
        if (file_exists($path)) {
            unlink($path);
        }
        $request->session()->flash('active');
        return redirect()->back();
    }

    public function delete(Request $request,$id){
        $images = Image::where('type' , 'product')->where('object_id' , $id)->get();
        foreach ($images as $image){
            $path = public_path() . '/uploads/images/' . $image->name;
            if (file_exists($path)) {
                unlink($path);
            }
            Image::where('id' , $image->id)->delete();
        }
        Product::where('id' , $id)->delete();
        $request->session()->flash('delete');
        return redirect()->back();
    }


    public function categories()
    {
        $categories = Category::where('type','product')->orderBy('id','desc')->get();
        $data = compact(
            'categories'
        );
        return view('admin.products.categories_index' , $data);
    }


    public function categoriesCreate()
    {
        $parent_categories = Category::where('type','product')->where('parent_id' , 0)->get();
        $data = compact(
            'parent_categories'
        );
        return view('admin.products.categories_create', $data);
    }

    public function categoriesEdit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::where('type' , 'product')->where('parent_id' , 0)->whereNotIn('id',[$id])->get();
        $categories = Category::where('type' , 'product')->get();
        $parent = false;
        foreach ($categories as $item){
            if($item->parent_id == $id){
                $parent = true;
                break;
            }
        }
        $data = compact(
            'category',
            'parents',
            'parent'
        );
        return view('admin.products.categories_edit' , $data);
    }

    public function categoriesStore(CreateProductCategoryRequest $request)
    {
        $data = $request->all();
        if($data['parent_id'] == null){
            $data['parent_id'] = 0;
        }
        $data['type'] = 'product';
        $data['slug'] = 'san-pham-'.Str::slug($data['name'] , '-');
        Category::create($data);
        $request->session()->flash('store');
        return redirect(route('admin.products.categories.index'));
    }

    public function categoriesUpdate(CreateProductCategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->slug = 'san-pham-'.Str::slug($data['name'], '-');
        if(isset($data['parent_id'])){

            $category->parent_id = $data['parent_id'];
        }
        $category->save();
        $request->session()->flash('update');
        return redirect()->back();
    }

    public function categoriesDelete(Request $request,$id)
    {
        $cate = Category::findOrFail($id);
        $categories = Category::where('type' , 'product')->get();
        foreach ($categories as $category){
            if($category->parent_id = $id){
                $category->parent_id = 0;
                $category->save();
            }
        }
        $cate->delete();
        $request->session()->flash('delete');
        return redirect()->back();
    }

}
