<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(User $user)
    {
        $users = $user->all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function edit(User $user)
    {
        return view('admin.user.create', compact('user'));
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('', $request->file('image')->getClientOriginalName(), 'public');
            $validatedData['image'] = $imagePath;
        }
        User::create($validatedData);

        return redirect()->route('user.index')->with('success', 'Post created successfully!');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete('img/' . $user->image);
            }
            $imagePath = $request->file('image')->storeAs('', $request->file('image')->getClientOriginalName(), 'public');
            $validatedData['image'] = $imagePath;
        }

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

}
