<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function submit(AuthRequest $request)
    {
        $user = User::where('email' , $request->email)->where('role_id' , '1')->first();
        if($user != null){
            $password = $user->password;
            if(password_verify($request->password , $password)){
                $request->session()->put('admin' , $user);
                return redirect(route('admin.index'));
            }
            else{
                $request->session()->flash('wrong-password');
                return redirect()->back();
            }
        }
        else{
            $request->session()->flash('wrong-email');
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        $request->session()->forget('admin');
        return redirect(route('client.index'));
    }
}
