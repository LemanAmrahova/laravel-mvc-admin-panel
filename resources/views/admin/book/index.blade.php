@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>All Books</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Author</th>
                <th>Publish Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td class="align-middle">{{ $book->id }}</td>
                    <td><img src="{{ asset('img/' . $book->image) }}" alt="{{ $book->name }}" width="40" height="50"></td>
                    <td class="align-middle">{{ $book->name }}</td>
                    <td class="align-middle">{{ $book->author->name. ' '. $book->author->surname }}</td>
                    <td class="align-middle">{{ $book->publish_date }}</td>
                    <td>
                        <a href="{{ route('book.edit', $book) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="bi bi-pencil align-middle"></i>
                        </a>

                        <form method="POST" action="{{ route('book.destroy', $book) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                <i class="bi bi-trash align-middle"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{ route('book.create') }}" class="btn btn-success">
            <i class="bi bi-book"></i> Add Book
        </a>
    </div>
@endsection
