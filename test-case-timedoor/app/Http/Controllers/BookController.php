<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);
        $search = $request->input('search', '');

        $books = Book::select(
                'books.id',
                'books.name as book_name',
                'categories.name as category_name',
                'authors.name as author_name',
                DB::raw('COALESCE(AVG(ratings.rating), 0) as average_rating'),
                DB::raw('COUNT(ratings.id) as voter')
            )
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->when($search, function ($query) use ($search) {
                $query->where('books.name', 'like', "%{$search}%")
                      ->orWhere('authors.name', 'like', "%{$search}%");
            })
            ->groupBy('books.id', 'books.name', 'categories.name', 'authors.name')
            ->orderByDesc('average_rating')
            ->limit($limit)
            ->get();

        return view('books.index', compact('books', 'limit', 'search'));
    }
}
