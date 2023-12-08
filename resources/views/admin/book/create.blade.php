@extends('layout')

@section('content')
    <div class="container">
        <h2 class="mb-4">{{ isset($book) ? 'Edit Book' : 'Add Book' }}</h2>

        <form method="POST" action="{{ isset($book) ? route('book.update', $book->id) : route('book.store') }}"
              enctype="multipart/form-data">
            @csrf

            @if(isset($book))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Book Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old('name', isset($book) ? $book->name : '') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author_id" class="form-label">Author:</label>
                <select class="form-control @error('author_id') is-invalid @enderror" id="author_id" name="author_id">
                    <option value="" disabled selected>Select an author</option>
                    @foreach ($authors as $author)
                        <option
                            value="{{ $author->id }}" {{ (isset($book) && $book->author_id == $author->id) ? 'selected' : '' }}>{{ $author->name . ' ' . $author->surname }}</option>
                    @endforeach
                </select>
                @error('author_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="publish_date" class="form-label">Publish Date:</label>
                <input type="date" class="form-control @error('publish_date') is-invalid @enderror" id="publish_date" name="publish_date"
                       value="{{ old('publish_date', isset($book) ? $book->publish_date : '') }}">
                @error('publish_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($book) ? 'Update Book' : 'Add Book' }}</button>
        </form>
    </div>
@endsection
