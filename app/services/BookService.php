<?php

namespace App\Services;

use App\Models\Book;
use App\Traits\CrudOperations;

// app/Services/BookService.php
class BookService
{
    public function getAllBooks()
    {
        return Book::all();
    }

    public function createBook($data)
    {
        return Book::create($data);
    }

    public function getBookById($id)
    {
        return Book::findOrFail($id);
    }

    public function updateBook($book, $data)
    {
        $book->update($data);
        return $book;
    }

    public function deleteBook($book)
    {
        $book->delete();
    }
}

