<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $guarded = [];

    public function article() {
        return $this->belongsTo(Author::class, 'article_id', 'id', 'articles');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }
}
