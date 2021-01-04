<?php

namespace App\Http\Controllers\Backend;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;
use App\User;
use Carbon\Carbon;


class MainController extends Controller
{
    public function index()
    {
        $userCount=User::all()->count();
        $commentCount=Comment::all()->count();
        $articleCount=Article::all()->count();
        $contactCount=Contact::all()->count();
        $arrays=[
            'userCount'=>$userCount ,
            'contactCount'=>$contactCount ,
            'commentCount'=>$commentCount,
            'articleCount'=>$articleCount,
        ];
        $users=User::with('photo')->whereDate('created_at', Carbon::today())->get();
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        alert()->success('کاربر '.$user->name.' به بخش مدیریت خوش آمدید.','ورود');
        return view('admin.main.index',compact(['user','users','arrays']));
    }
}
