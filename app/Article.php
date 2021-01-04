<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articles';
    protected $fillable=[
        'id',
        'title',
        'slug',
        'body',
        'user_id',
        'viewCount',
        'commentCount',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

}
