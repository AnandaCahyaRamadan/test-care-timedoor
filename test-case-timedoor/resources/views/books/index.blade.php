<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List - Top Ratings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light py-5">

<div class="container bg-secondary p-4 rounded shadow">
    <h2 class="text-center mb-4">List of Books (Top Ratings)</h2>

    <div class="w-100 mb-3">
        <a href="{{ route('authors.top-author') }}" class="btn btn-success">Top Author</a>
        <a href="{{ route('ratings.create') }}" class="ml-2 btn btn-warning">Add Rating</a>
    </div>

    <form method="GET" action="{{ route('books.index') }}" class="row mb-4 g-3">
        <div class="col-md-3">
            <label for="limit" class="form-label">List Shown:</label>
            <select name="limit" id="limit" class="form-select">
                @for ($i = 10; $i <= 100; $i += 10)
                    <option value="{{ $i }}" {{ $limit == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="col-md-6">
            <label for="search" class="form-label">Search:</label>
            <input type="text" name="search" id="search" value="{{ $search }}" class="form-control" placeholder="Book name or Author name">
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
        </div>
    </form>

    <table class="table table-striped table-hover table-dark text-center align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $book->book_name }}</td>
                    <td>{{ $book->category_name }}</td>
                    <td>{{ $book->author_name }}</td>
                    <td>{{ number_format($book->average_rating, 2) }}</td>
                    <td>{{ $book->voter }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
