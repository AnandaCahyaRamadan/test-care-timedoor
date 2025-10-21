
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
    <h2 class="text-center mb-4">Insert Rating</h2>


      <form action="{{ route('ratings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="author_id" class="form-label">Book Author</label>
            <select id="author_id" name="author_id" class="form-select" required>
                <option value="">-- Select Author --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Book Name</label>
            <select id="book_id" name="book_id" class="form-select" required>
                <option value="">-- Select Book --</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select id="rating" name="rating" class="form-select" required>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
    </form>
</div>

</body>
</html>

<script>
    document.getElementById('author_id').addEventListener('change', function () {
        const authorId = this.value;
        const bookSelect = document.getElementById('book_id');
        bookSelect.innerHTML = '<option value="">Loading...</option>';

        fetch(`/ratings/${authorId}`)
            .then(response => response.json())
            .then(data => {
                let options = '<option value="">-- Select Book --</option>';
                data.forEach(book => {
                    options += `<option value="${book.id}">${book.name}</option>`;
                });
                bookSelect.innerHTML = options;
            });
    });
</script>