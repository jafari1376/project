<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table='products';

    protected $fillable=[
      'title',
      'body',
      'price',
      'photo_id',
      'created_at',
      'updated_at',
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
