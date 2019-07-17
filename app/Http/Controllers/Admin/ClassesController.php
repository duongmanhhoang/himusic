<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\StoreClassesRequest;
use App\Http\Requests\Admin\UpdateClassesRequest;
use App\Model\Classes;
use App\Model\Image;
use App\Model\TypeClass;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::orderBy('id', 'desc')->get();
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $types = TypeClass::all();

        return view('admin.classes.create', compact('types'));
    }

    public function edit($id)
    {
        $classes = Classes::findOrFail($id);
        $types =  TypeClass::all();
        $images = Image::where('type', 'classes')->where('object_id', $id)->orderBy('id', 'desc')->get();
        $videos = Video::where('type', 'classes')->where('object_id', $id)->orderBy('id', 'desc')->get();
        $data = compact(
            'classes',
            'images',
            'videos',
            'types'
        );
        return view('admin.classes.edit', $data);
    }

    public function store(StoreClassesRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $image->move('uploads/classes', $imageName);
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::slug($data['name'], '-');
        $classes = Classes::create($data);
        $request->session()->flash('store');
        return redirect(route('admin.classes.edit', $classes->id));
    }

    public function update(UpdateClassesRequest $request, $id)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $image = $request->image;
            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $image->move('uploads/classes', $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = $data['old_image'];
        }
        $classes = Classes::find($id);
        $classes->image = $data['image'];
        $classes->name = $data['name'];
        $classes->slug = Str::slug($data['name'], '-');
        $classes->body = $data['body'];
        $classes->description = $request->description;
        $classes->type_class = $request->type_class;
        $classes->save();
        Video::where('type', 'classes')->where('object_id', $id)->delete();
        if ($request->url) {
            foreach ($data['url'] as $item) {
                if ($item == null) {
                    break;
                }
                $data_video = ['type' => 'classes', 'object_id' => $id, 'url' => $item];
                Video::create($data_video);
            }
        };
        $request->session()->flash('update');
        return redirect()->back();
    }

    public function uploadImage(Request $request, $id)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move('uploads/images', $imageName);

        $image = new Image();
        $image->type = 'classes';
        $image->object_id = $id;
        $image->name = $imageName;
        $image->save();
        $request->session()->flash('image_active');

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
        Image::where('id', $id)->delete();
        $path = public_path() . '/uploads/images/' . $name;
        if (file_exists($path)) {
            unlink($path);
        }
        $request->session()->flash('image_active');
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        Video::where('type', 'classes')->where('object_id', $id)->delete();
        $images = Image::where('type', 'classes')->where('object_id', $id)->get();
        foreach ($images as $image) {
            $path = public_path() . '/uploads/images/' . $image->name;
            if (file_exists($path)) {
                unlink($path);
            }
            Image::where('id', $image->id)->delete();
        }
        Classes::where('id', $id)->delete();
        $request->session()->flash('delete');
        return redirect()->back();
    }
}
