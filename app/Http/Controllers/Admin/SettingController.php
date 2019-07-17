<?php

namespace App\Http\Controllers\Admin;

use App\Model\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        $data = compact(
            'setting'
        );
        return view('admin.settings.index' , $data);
    }

    public function update(SettingRequest $request , $id)
    {
        $setting = Setting::find($id);
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->phone = $request->phone;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        if ($request->hasFile('logo')) {
            $logo = $request->logo;
            $logo_name = uniqid().'-'.$logo->getClientOriginalName();
            $logo->move('uploads/logo', $logo_name);
            $setting->logo = $logo_name;
        }
        else{
            $setting->logo =$request->input('old_logo');
        }

        $setting->save();
        $request->session()->flash('update');
        return redirect()->back();
    }
}
