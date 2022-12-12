<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $dates = [];

    public function author() {
        return $this->belongsTo(User::class, 'author_id', 'id', 'users');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
