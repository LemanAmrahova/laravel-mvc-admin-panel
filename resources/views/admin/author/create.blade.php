@extends('layout')

@section('content')
    <div class="container">
        <h2 class="mb-4">{{ isset($author) ? 'Edit Author' : 'Add Author' }}</h2>

        <form method="POST" action="{{ isset($author) ? route('author.update', $author->id) : route('author.store') }}">
            @csrf

            @if(isset($author))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Author Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old('name', isset($author) ? $author->name : '') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Author Surname:</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname"
                       value="{{ old('surname', isset($author) ? $author->surname : '') }}">
                @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($author) ? 'Update Author' : 'Add Author' }}</button>
        </form>
    </div>
@endsection
