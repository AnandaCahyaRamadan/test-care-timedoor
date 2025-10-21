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
    <h2 class="text-center mb-4">10 Top Most Famous Author</h2>

    <table class="table table-striped table-hover table-dark text-center align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Author Name</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $index => $author)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $author->author_name }}</td>
                    <td>{{ $author->voter }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No data found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
