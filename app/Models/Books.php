<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = "books";

    public function authors()
    {
        return $this->hasMany(Author::class, 'author_book', 'book_id', 'author_id');
    }
}
