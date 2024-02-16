<?php
namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Services\PublisherService;

class PublisherController extends Controller
{
    protected $publisherService;

    public function __construct(PublisherService $publisherService)
    {
        $this->publisherService = $publisherService;
    }

    public function index()
    {
        return $this->publisherService->getAllPublishers();
    }

    public function create()
    {
        // Logic for showing the create form
    }

    public function store(PublisherRequest $request)
    {
        return $this->publisherService->createPublisher($request->validated());
    }

    public function show($id)
    {
        return $this->publisherService->getPublisherById($id);
    }

    public function edit($id)
    {
        return $this->publisherService->editPublisher($id);
    }

    public function update(PublisherRequest $request, $id)
    {
        return $this->publisherService->updatePublisher($id, $request->validated());
    }

    public function destroy($id)
    {
        return $this->publisherService->deletePublisher($id);
    }
}
