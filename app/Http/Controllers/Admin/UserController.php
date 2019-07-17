<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Requests\Admin\PasswordRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        $data = compact('users');
        return view('admin.users.index', $data);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->password = $password;
        $user->role_id = '1';
        $user->save();
        $request->session()->flash('store');
        return redirect(route('admin.users.index'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data = compact(
            'user'
        );
        return view('admin.users.edit' , $data);
    }

    public function update(UserUpdateRequest $request , $id)
    {
        $user = User::find($id);
        $user->email = $request->email;
        $user->role_id = '1';
        $user->name = $request->name;
        $user->save();
        $request->session()->flash('update');
        return redirect()->back();
    }

    public function delete(Request $request , $id)
    {
        if($id == session('admin')->id){
            $request->session()->flash('error');
            return redirect()->back();
        }
        else{
            User::where('id' , $id)->delete();
            $request->session()->flash('delete');
            return redirect()->back();

        }
    }

    public function password($id)
    {
        $user = User::find($id);
        return view('admin.users.password' , compact('user'));
    }

    public function updatePassword(PasswordRequest $request , $id)
    {
        $user = User::find($id);
        $old_password = $request->old_password;
        if(password_verify($old_password , $user->password)){
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->save();
            $request->session()->flash('success');
            return redirect()->back();
        }
        else{
            $request->session()->flash('wrong-old');
            return redirect()->back();
        }
    }

}
