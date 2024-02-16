<?php
// app/Services/PublishersService.php

namespace App\Services;

use App\Models\Publishers;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PublishersService
{
    public function getAllPublisherss()
    {
        return Publishers::all();
    }

    public function getPublishersById($id)
    {
        try {
            return Publishers::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new \Exception("Publishers not found");
        }
    }

    public function createPublishers($data)
    {
        return Publishers::create($data);
    }

    public function updatePublishers($id, $data)
    {
        try {
            $Publishers = Publishers::findOrFail($id);
            $Publishers->update($data);
            return $Publishers;
        } catch (ModelNotFoundException $exception) {
            throw new \Exception("Publishers not found");
        }
    }

    public function deletePublishers($id)
    {
        try {
            $Publishers = Publishers::findOrFail($id);
            $Publishers->delete();
            return $Publishers;
        } catch (ModelNotFoundException $exception) {
            throw new \Exception("Publishers not found");
        }
    }
}
