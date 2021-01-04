<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles=Article::with('photos')->latest()->take(16)->get();

        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('articles',compact(['articles','user',]));
        }
        return view('articles',compact(['articles']));
    }

    public function show($slug)
    {

        $article=Article::with('photos')->whereSlug($slug)->first();
        $article->increment('viewCount');
        $comments=$article->comments()->where('status',1)->where('parent_id',0)->latest()->with(['comments'=>function ($query){
            $query->where('status',1)->latest();
        }])->get();
        $articles=Article::with('photos')->inRandomOrder()->take(4)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('article',compact(['article','user','articles','comments']));
        }
        return view('article',compact(['article','articles','comments']));
    }
}
