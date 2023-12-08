<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.author.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->validated());
        return redirect()->route('author.index')->withSuccess('Author created successfully!');
    }

    public function edit(Author $author)
    {
        return view('admin.author.create', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());
        return redirect()->route('author.index')->withSuccess('Author updated successfully!');
    }

    public function destroy(Author $author)
    {
        try {
            DB::beginTransaction();

            $author->delete();
            $author->books()->delete();

            DB::commit();

            return redirect()->route('author.index')->withSuccess('Author and associated books deleted successfully!');
        } catch (\Exception $e) {

            DB::rollback();

            return back()->withError('Error deleting author: '.$e->getMessage());
        }
    }
}
