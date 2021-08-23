<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * このポストの全コメント取得
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
