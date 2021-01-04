<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads='/storage/photos/';

    public function getPathAttribute($photo)
    {
        return $this->uploads.$photo;
    }

    protected $table='photos';
    protected $fillable=[
        'path',
        'original_name',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsToMany(Article::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
