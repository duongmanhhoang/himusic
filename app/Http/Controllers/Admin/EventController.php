<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Model\Event;
use App\Model\Image;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $images = Image::where('type', 'event')->where('object_id', $id)->orderBy('id', 'desc')->get();
        $videos = Video::where('type', 'event')->where('object_id', $id)->orderBy('id', 'desc')->get();
        $data = compact(
            'event',
            'images',
            'videos'
        );
        return view('admin.events.edit', $data);
    }

    public function store(StoreEventRequest $request)
    {
        $data = $request->all();

        if ($request->has('image')) {
            $image = $request->image;
            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $image->move('uploads/events', $imageName);
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::slug($data['title'], '-');
        $event = Event::create($data);
        $request->session()->flash('store');
        return redirect(route('admin.events.edit', $event->id));
    }

    public function update(UpdateEventRequest $request, $id)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $image = $request->image;
            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $image->move('uploads/events', $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = $data['old_image'];
        }
        $event = Event::find($id);
        $event->image = $data['image'];
        $event->title = $data['title'];
        $event->slug = Str::slug($data['title'], '-');
        $event->body = $data['body'];
        $event->start_at = $data['start_at'];
        $event->end_at = $data['end_at'];
        $event->address = $data['address'];
        $event->link = $data['link'];
        $event->organizer_name = $data['organizer_name'];
        $event->organizer_phone = $data['organizer_phone'];
        $event->organizer_email = $data['organizer_email'];
        $event->save();
        Video::where('type', 'event')->where('object_id', $id)->delete();
        if ($request->url) {
            foreach ($data['url'] as $item) {
                if ($item == null) {
                    break;
                }
                $data_video = ['type' => 'event', 'object_id' => $id, 'url' => $item];
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
        $image->type = 'event';
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
        Video::where('type', 'event')->where('object_id', $id)->delete();
        $images = Image::where('type', 'event')->where('object_id', $id)->get();
        foreach ($images as $image) {
            $path = public_path() . '/uploads/images/' . $image->name;
            if (file_exists($path)) {
                unlink($path);
            }
            Image::where('id', $image->id)->delete();
        }
        Event::where('id', $id)->delete();
        $request->session()->flash('delete');
        return redirect()->back();
    }
}
