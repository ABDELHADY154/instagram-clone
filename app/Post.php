<?php

namespace App;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model implements Commentable
{
    use SoftDeletes, Favoriteable, Likeable, HasComments;
    use \Conner\Tagging\Taggable;


    protected $fillable = [
        'user_id', 'image', 'caption', 'like_no', 'comment_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function canBeRated(): bool
    {
        return false; // default false
    }

    public function mustBeApproved(): bool
    {
        return false; // default false
    }
}
