<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Post extends Model
{
    use SoftDeletes, Favoriteable;
    use \Conner\Tagging\Taggable;


    protected $fillable = [
        'user_id', 'image', 'caption', 'like_no', 'comment_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
