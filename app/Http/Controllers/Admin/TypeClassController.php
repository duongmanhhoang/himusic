<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreTypeClass;
use App\Http\Requests\Admin\UpdateTypeClass;
use App\Model\TypeClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeClassController extends Controller
{
    public function index()
    {
        $type_classes = TypeClass::orderBy('id', 'desc')->get();

        return view('admin.type_classes.index', compact('type_classes'));
    }

    public function create()
    {
        return view('admin.type_classes.create');
    }

    public function store(StoreTypeClass $request)
    {
        $data = $request->all();
        $data['name'] = trim($request->name);
        $data['slug'] = Str::slug($data['name']);
        if ($request->has('image')) {
            $image = $request->image;
            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $image->move('uploads/classes', $imageName);
            $data['image'] = $imageName;
        }
        TypeClass::create($data);
        $request->session()->flash('success', 'Tạo danh mục thành công');

        return redirect(route('admin.type_classes.index'));
    }

    public function edit($id)
    {
        $item = TypeClass::findOrFail($id);

        return view('admin.type_classes.edit', compact('item'));
    }

    public function update(UpdateTypeClass $request, $id)
    {
        $data = $request->all();
        $item = TypeClass::findOrFail($id);
        if ($request->has('image')) {
            $image = $request->image;
            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $image->move('uploads/classes', $imageName);
            $data['image'] = $imageName;
        }
        $item->update($data);
        $request->session()->flash('success', 'Cập nhập thành công');

        return redirect()->back();

    }

    public function delete($id, Request $request)
    {
        $item = TypeClass::findOrFail($id);
        DB::beginTransaction();
        try {
            $item->getClass()->delete();
            $item->delete();
            DB::commit();
            $request->session()->flash('success', 'Xóa thành công');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}
