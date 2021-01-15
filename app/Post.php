<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = "posts";

    protected  $fillable = [
        'title',
        'desctiption',
        'sdesc',
        'body',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
