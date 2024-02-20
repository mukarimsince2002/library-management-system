<?php

namespace App\Http\Controllers;


use App\Http\Requests\PublisherRequest;
use App\Services\PublisherService; // Import the ImageUploadTrait
use App\Models\Publisher;

class PublisherController extends Controller
{


    protected $publisherService;

    public function __construct(PublisherService $publisherService)
    {
        $this->publisherService = $publisherService;
    }

    public function index()
    {
        $publishers = $this->publisherService->index();
        return view('admin.publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('admin.publishers.create');
    }

    public function store(PublisherRequest $request)
    {
        $data = $request->validated();
        $this->publisherService->store($data);
        return redirect()->route('publishers.index')->with('message', 'User created successfully.');
    }

    public function show($id)
    {
        return $this->publisherService->show($id);
    }

    public function edit($id)
    {
        $publisher = $this->publisherService->edit($id);
        return view('admin.publishers.edit', compact('publisher'));
    }

    public function update(PublisherRequest $request, $id)
    {
        $data = $request->validated();
        $this->publisherService->update($id, $data);
        return redirect()->route('publishers.index')->with('message', 'publisher updated successfully.');
    }

    public function destroy($id)
{
    // Delete the user
    $this->publisherService->destroy($id);

    return redirect()->route('publishers.index')->with('message', 'publisher deleted successfully.');
}


}
