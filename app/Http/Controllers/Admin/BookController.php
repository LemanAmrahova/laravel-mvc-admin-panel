<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get();
        return view('admin.book.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('admin.book.create', compact('authors'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('admin.book.create', compact('book', 'authors'));
    }

    public function store(StoreBookRequest $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validated();

            $book = new Book($validatedData);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->storeAs('', $request->file('image')->getClientOriginalName(), 'public');
                $book['image'] = $imagePath;
            }

            $book->save();

            DB::commit();

            return redirect()->route('book.index')->withSuccess('Book created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('Error creating book: ' . $e->getMessage())->withInput();
        }
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        DB::beginTransaction();

        try {

            $validatedData = $request->validated();
            if ($request->hasFile('image')) {
                if ($book->image) {
                    Storage::disk('public')->delete('img/' . $book->image);
                }
                $imagePath = $request->file('image')->storeAs('', $request->file('image')->getClientOriginalName(), 'public');
                $validatedData['image'] = $imagePath;
            }
            $book->update($validatedData);

            DB::commit();

            return redirect()->route('book.index')->withSuccess('Book updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('Error updating book: ' . $e->getMessage())->withInput();
        }

    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Book deleted successfully');
    }
}
