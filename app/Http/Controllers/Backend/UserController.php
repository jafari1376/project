<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $users=User::with('photo','comments')->paginate(10);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return response()->view('admin.users.index',compact(['users','user']));
    }


    public function create()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return response()->view('admin.users.create',compact('user'));
    }


    public function store(AddUserRequest $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->email_verified_at=Carbon::now();
        $user->admin_active=$request->admin_active;
        $user->level=$request->level;
        $user->save();
        alert()->success('کاربر '.$user->name.' با موفقیت اضافه شد.','کاربر')->persistent("بستن");
        return redirect('/admin/users');
    }


    public function show($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $user_au=User::with('photo','comments')->findOrFail($id);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return response()->view('admin.users.show',compact(['user_au','user']));
    }


    public function edit($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $user_au=User::with('photo','comments')->findOrFail($id);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return response()->view('admin.users.edit',compact(['user','user_au']));
    }


    public function update(UserRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->email_verified_at=Carbon::now();
        $user->admin_active=$request->admin_active;
        $user->level=$request->level;
        if ($request->password)
        {
            $user->password=Hash::make($request->password);
        }
        $user->save();
        alert()->success('کاربر '.$user->name.' با موفقیت بروزرسانی شد.','کاربر')->persistent("بستن");
        return redirect('/admin/users');
    }


    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        alert()->error('کاربر '.$user->name.' با موفقیت حذف شد.','کاربر')->persistent("بستن");
        return back();
    }

    public function profile()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $profile=User::findOrFail(auth()->user()->id);
        return view('admin.profile.show',compact(['profile','user']));
    }
    public function profileEdit()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $profile=User::findOrFail(auth()->user()->id);
        return view('admin.profile.edit',compact(['profile','user']));
    }
    public function profileUpdate(ProfileRequest $request)
    {
        $profile=User::findOrFail(auth()->user()->id);
        $profile->name=$request->name;
        $profile->email=$request->email;
        if($request->password)
        {
            $profile->password=Hash::make($request->password);
        }
        $profile->photo_id=$request->photo_id;
        $profile->email_verified_at=Carbon::now();
        if($request->level){
            $profile->level=$request->level;
        }
        $profile->save();
        alert()->success('پروفایل '.$profile->name.' با موفقیت بروزرسانی شد.','پروفایل')->persistent("بستن");
        return redirect('admin/profile');
    }
}
