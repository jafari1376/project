<?php

namespace App\Http\Controllers;

use App\Article;
use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products=Product::with('photo')->latest()->paginate(10);
        $articles=Article::with('photos')->latest()->take(16)->get();
        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('welcome',compact(['user','articles','products']));
        }
        else
        {
            return view('welcome',compact(['articles','products']));
        }

    }

    public function about()
    {

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('about',compact(['user']));
        }
        else
        {
            return view('about');
        }

    }


    public function contact_us()
    {

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('contact-us',compact(['user']));
        }
        else
        {
            return view('contact-us');
        }
    }



    public function contact_me(ContactRequest $request)
    {
        $contact=new Contact();
        $contact->user_id=auth()->user()->id;
        $contact->title=$request->title;
        $contact->description=$request->description;
        $contact->save();
        alert()->success('پیشنهاد یا انتقاد شما با موفقیت ارسال شد.','ارسال پیشنهاد و انتقاد')->persistent('بستن');
        return back();
    }

    public function search(Request  $request)
    {
        $articles=Article::with('photos')->where('body','like',"%{$request->search}%")->orWhere('title','like',"%{$request->search}%")->get();
        $products=Product::with('photo')->where('title','like',"%{$request->search}%")->orWhere('body','like',"%{$request->search}%")->get();
        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('searches',compact(['user','articles','products']));
        }
        else
        {
            return view('searches',compact(['articles','products']));
        }
    }

}
