@extends('layout')

@section('content')
    <div class="container">
        <h2 class="mb-4">{{ isset($user) ? 'Edit User' : 'Add User' }}</h2>

        <form method="POST" action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}"
              enctype="multipart/form-data">
            @csrf

            @if(isset($user))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ old('name', isset($user) ? $user->name : '') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Surname:</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname"
                       value="{{ old('surname', isset($user) ? $user->surname : '') }}">
                @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                       value="{{ old('email', isset($user) ? $user->email : '') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                @error('password')
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

            <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update User' : 'Add User' }}</button>
        </form>
    </div>
@endsection
