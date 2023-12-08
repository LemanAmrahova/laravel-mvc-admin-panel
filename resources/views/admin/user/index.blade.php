@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>All Users</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="align-middle">{{ $user->id }}</td>
                    <td><img src="{{ asset('img/' . $user->image) }}" alt="{{ $user->name }}" width="50"></td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->surname }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">******</td>
                    <td>
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form method="POST" action="{{ route('user.destroy', $user) }}"
                              style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{ route('user.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Add User
        </a>
    </div>
@endsection
