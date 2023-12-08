@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>All Authors</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td class="align-middle">{{ $author->id }}</td>
                    <td class="align-middle">{{ $author->name }}</td>
                    <td class="align-middle">{{ $author->surname }}</td>
                    <td>
                        <a href="{{ route('author.edit', $author) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="bi bi-pencil align-middle"></i>
                        </a>

                        <form method="POST" action="{{ route('author.destroy', $author) }}" style="display: inline-block;">
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

        <a href="{{ route('author.create') }}" class="btn btn-success">
            <i class="bi bi-person"></i> Add Author
        </a>
    </div>
@endsection
