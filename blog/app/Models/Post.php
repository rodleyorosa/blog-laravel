<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
