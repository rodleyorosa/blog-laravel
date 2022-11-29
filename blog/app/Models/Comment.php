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

    public function client() {
        return $this->belongsTo(Client::class, 'client_id', 'id', 'clients');
    }
}
