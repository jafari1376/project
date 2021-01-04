<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $articles=Article::with('photos')->latest()->paginate(10);
        return  response()->view('admin.articles.index',compact(['articles','user']));
    }

    public function create()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
       return view('admin.articles.create',compact(['user']));
    }

    public function store(ArticleRequest $request)
    {
            //dd($request->all());
            $article=new Article();
            $article->title=$request->title;
            $article->slug=$this->makeSlug($request->title);
            $article->body=$request->body;
            $article->user_id=auth()->user()->id;
            $article->save();
            $photos = explode(',', $request->input('photo_id')[0]);
            $article->photos()->attach($photos);
            alert()->success('مناطق گردشگری '.$article->title.' به موفقیت اضافه شد.','مناطق گردشگری')->persistent("بستن");
            return  redirect()->route('articles.index');

    }

    public function show(Article $article)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $article=Article::with('photos')->findOrFail($article->id);
        return response()->view('admin.articles.show',compact(['article','user']));
    }

    public function edit($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $article=Article::with('photos')->findOrFail($id);
        return response()->view('admin.articles.edit',['article'=>$article,'user'=>$user]);
    }

    public function update(ArticleRequest $request, $id)
    {

        $article=Article::findOrFail($id);
        $article->title=$request->title;
        $article->slug=$this->makeSlug($request->title);
        $article->body=$request->body;
        $article->user_id=auth()->user()->id;
        $article->save();
        $photos = explode(',', $request->input('photo_id')[0]);
        $article->photos()->sync($photos);
        alert()->success('مناطق گردشگری '.$article->title.' با موفقیت بروز رسانی شد.','مناطق گردشگری')->persistent("بستن");
        return  redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article=Article::findOrFail($id);
        $article->delete();
//        $article->phtotos->detach();
        alert()->error('مناطق گردشگری '.$article->title.' با موفقیت حذف شد.','مناطق گردشگری')->persistent("بستن");
        return  redirect()->route('articles.index');
    }


    public function makeSlug($string)
    {
        //$string = strtolower($string);
        //$string = str_replace(['؟', '?'], '', $string);
        return preg_replace('/\s+/u', '-', trim($string));
    }
}
