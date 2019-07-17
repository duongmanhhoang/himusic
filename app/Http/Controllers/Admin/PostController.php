<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryPostRequest;
use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use App\Model\TagLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('type', 'post')->get();
        $data = compact(
            'categories'
        );
        return view('admin.posts.create', $data);
    }

    public function edit($id)
    {
        $categories = Category::where('type', 'post')->get();
        $post = Post::findOrFail($id);
        $data = compact(
            'categories',
            'post');
        return view('admin.posts.edit', $data);
    }

    public function store(CreatePostRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = uniqid() . $image->getClientOriginalName();
            $image->move('uploads/posts', $imageName);
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::slug($data['title'], '-');
        Post::create($data);
        $request->session()->flash('store');
        return redirect(route('admin.posts.index'));

    }

    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = uniqid() . $image->getClientOriginalName();
            $image->move('uploads/posts', $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = $data['old_image'];
        }
        $post = Post::find($id);
        $post->image = $data['image'];
        $post->title = $data['title'];
        $data['slug'] = Str::slug($data['title'], '-');
        $post->slug = $data['slug'];
        if ($request->cate_id) {
            $post->cate_id = $data['cate_id'];
        }
        $post->description = $data['description'];
        $post->body = $data['body'];
        $post->keywords = $data['keywords'];
        $post->save();
        $request->session()->flash('update');
        return redirect()->back();
    }

    public function delete(Request $request,$id)
    {
        Post::where('id',$id)->delete();
        $request->session()->flash('delete');
        return redirect()->back();

    }

    public function categories()
    {
        $categories = Category::where('type','post')->orderBy('id','desc')->get();
        $data = compact(
            'categories'
        );
        return view('admin.posts.categories_index' , $data);
    }


    public function categoriesCreate()
    {
        $parent_categories = Category::where('type','post')->where('parent_id' , 0)->get();
        $data = compact(
            'parent_categories'
        );
        return view('admin.posts.categories_create', $data);
    }

    public function categoriesEdit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::where('type' , 'post')->where('parent_id' , 0)->whereNotIn('id',[$id])->get();
        $categories = Category::where('type' , 'post')->get();
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
        return view('admin.posts.categories_edit' , $data);
    }

    public function categoriesStore(CategoryPostRequest $request)
    {
        $data = $request->all();
        if($data['parent_id'] == null){
            $data['parent_id'] = 0;
        }
        $data['type'] = 'post';
        $data['slug'] = Str::slug($data['name'] , '-');
        Category::create($data);
        $request->session()->flash('store');
        return redirect(route('admin.posts.categories.index'));
    }

    public function categoriesUpdate(CategoryPostRequest $request, $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['name'], '-');
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
        $categories = Category::where('type' , 'post')->get();
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
