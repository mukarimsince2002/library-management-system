<?php

namespace App\Http\Controllers;


use App\Http\Requests\GenreRequest;
use App\Services\GenreService; // Import the ImageUploadTrait
use App\Models\Genre;

class GenreController  extends Controller
{

    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        $genres = $this->genreService->index();
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(GenreRequest $request)
    {
        $data = $request->validated();
        $this->genreService->store($data);
        return redirect()->route('genres.index')->with('message', 'User created successfully.');
    }

    public function show($id)
    {
        return $this->genreService->show($id);
    }

    public function edit($id)
    {
        $genre = $this->genreService->edit($id);
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(GenreRequest $request, $id)
    {
        $data = $request->validated();
        $this->genreService->update($id, $data);
        return redirect()->route('genres.index')->with('message', 'publisher updated successfully.');
    }

    public function destroy($id)
{
    // Delete the user
    $this->genreService->destroy($id);

    return redirect()->route('genres.index')->with('message', 'publisher deleted successfully.');
}


}
