<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateTestimonialRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Testimonial;
use App\Http\Requests\Admin\CreateTestimonialRequest;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id' , 'desc')->paginate(5);
        return view('admin.testimonials.index' , compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonials.edit' , compact('testimonial'));
    }

    public function store(CreateTestimonialRequest $request)
    {
        $testimonial = new Testimonial();
        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = uniqid().'-'.$image->getClientOriginalName();
            $image->move('uploads/testimonials' , $imageName);
            $testimonial->image = $imageName;
            $testimonial->detail = $request->detail;
            $testimonial->save();
            $request->session()->flash('store');
            return redirect(route('admin.testimonials.index'));
        }
    }

    public function update(UpdateTestimonialRequest $request , $id)
    {
        $testimonial = Testimonial::find($id);
        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = uniqid().'-'.$image->getClientOriginalName();
            $image->move('uploads/testimonials' , $imageName);
            $testimonial->image = $imageName;

        }

        $testimonial->detail = $request->detail;
        $testimonial->save();
        $request->session()->flash('update');
        return redirect()->back();

    }

    public function delete(Request $request,$id)
    {
        Testimonial::where('id' , $id)->delete();
        $request->session()->flash('delete');
        return redirect()->back();
    }

}
