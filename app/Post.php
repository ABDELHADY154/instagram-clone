<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'image', 'caption', 'like_no', 'comment_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
