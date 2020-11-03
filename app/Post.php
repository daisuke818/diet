<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //テーブル名
    protected $table = 'posts';

    //可変項目
    protected $fillable =
    [
        'user_id',
        'weight',
        'percentage',
        'content',
    ];
}
