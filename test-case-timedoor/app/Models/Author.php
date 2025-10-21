<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "authors";
    protected $fillable = ['id','name'];

    public function books() {
        return $this->hasMany(Book::class);
    }
}
