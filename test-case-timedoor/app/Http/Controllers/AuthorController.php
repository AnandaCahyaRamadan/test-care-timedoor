<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function topAuthor() 
    {
        $authors = DB::table('authors')
            ->select(
                'authors.id',
                'authors.name as author_name',
                DB::raw('COUNT(ratings.id) as voter')
            )
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->join('ratings', 'books.id', '=', 'ratings.book_id')
            ->where('ratings.rating', '>', 5) 
            ->groupBy('authors.id', 'authors.name')
            ->orderByDesc('voter')
            ->limit(10)
            ->get();

        return view('authors.authortop', compact('authors'));
    }
}
