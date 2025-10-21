<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = "ratings";
    protected $fillable = ['id','rating','book_id'];

    public function book() {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
