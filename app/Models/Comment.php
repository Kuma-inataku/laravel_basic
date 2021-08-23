<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * commentableな親モデルの取得（投稿かビデオ）
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
