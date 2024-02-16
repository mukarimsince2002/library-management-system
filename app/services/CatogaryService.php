<?php
// app/Services/BookService.php

namespace App\Services;

use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookService
{
    public function getAllBooks()
    {
        return Book::all();
    }

    public function getBookById($id)
    {
        try {
            return Book::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new \Exception("Book not found");
        }
    }

    public function createBook($data)
    {
        return Book::create($data);
    }

    public function updateBook($id, $data)
    {
        try {
            $book = Book::findOrFail($id);
            $book->update($data);
            return $book;
        } catch (ModelNotFoundException $exception) {
            throw new \Exception("Book not found");
        }
    }

    public function deleteBook($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return $book;
        } catch (ModelNotFoundException $exception) {
            throw new \Exception("Book not found");
        }
    }
}
