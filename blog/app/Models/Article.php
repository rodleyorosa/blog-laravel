<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $guarded = [];

    public function author() {
        return $this->belongsTo(Author::class, 'author_id', 'id', 'authors');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
