<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return response()->view('auth.profile',compact(['user']));
        }
        else
        {
            alert()->error('لطفا اول وارد سایت شده و بعد وارد ویرایش اطلاعات پروفایل شوید.','پروفایل')->persistent("بستن");
            return redirect('/login');
        }
    }

    public function profileEdit()
    {

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return response()->view('auth.edit',compact(['user']));
        }
        else
        {
            alert()->error('لطفا اول وارد سایت شده و بعد وارد ویرایش اطلاعات پروفایل شوید.','پروفایل')->persistent("بستن");
            return redirect('/login');
        }
    }

    public function profileUpdate(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'name'=>'required|string|max:256',
            'password'=>'nullable|string|min:8|max:64',
            'email'=>'required|email|unique:users,email,'.auth()->user()->id,
        ]);
        $profile=User::findOrFail(auth()->user()->id);
        $profile->name=$request->name;
        $profile->email=$request->email;
        if ($request->password){
            $profile->password=Hash::make($request->password);
        }
        $profile->photo_id=$request->photo_id;
        $profile->save();
        alert()->success('پروفایل '.$profile->name.' با موفقیت بروزرسانی شد.','پروفایل')->persistent("بستن");
        return redirect('/profile');
    }

}
