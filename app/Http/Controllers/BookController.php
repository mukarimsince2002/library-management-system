<?php
namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;


class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    // Controller methods

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        // Fetch necessary data for dropdowns
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view('admin.books.create', compact('authors', 'genres', 'publishers'));
    }

    public function store(Request $request)
    {
        // Validation logic here

        $this->bookService->createBook($request->all());
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = $this->bookService->getBookById($id);
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view('admin.books.edit', compact('book', 'authors', 'genres', 'publishers'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here

        $book = $this->bookService->getBookById($id);
        $this->bookService->updateBook($book, $request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = $this->bookService->getBookById($id);
        $this->bookService->deleteBook($book);
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
