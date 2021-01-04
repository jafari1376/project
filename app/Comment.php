<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $fillable=[
        'user_id',
        'body',
        'status',
        'commentable_id',
        'commentable_type',
        'created_at'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'parent_id','id');
    }

    public function getBodyAttribute($value)
    {
        return  $this->attributes['body']=str_replace(PHP_EOL,'<br>',$value);
    }

    public function successFull()
    {
        $success=Comment::where('status',1)->get();
        return $success->count();
    }
    public function unSuccessFull()
    {
        $success=Comment::where('status',0)->get();
        return $success->count();
    }
}
