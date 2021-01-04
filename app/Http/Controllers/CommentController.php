<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
            $comment=new Comment();
            $comment->user_id=auth()->user()->id;
            $comment->parent_id=$request->parent_id;
            $comment->commentable_id=$request->commentable_id;
            $comment->commentable_type=$request->commentable_type;
            $comment->body=$request->body;
            $comment->save();
            alert()->success('دیدگاه شما بعد از تایید مدیران قابل نمایش خواهد بود.','ارسال دیدگاه')->persistent('بستن');
            return back();
    }
}
