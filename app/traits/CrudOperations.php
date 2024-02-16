<?php
// app/Traits/CrudOperations.php

namespace App\Traits;

trait CrudOperations
{
    public function store($data)
    {
        return $this->model::create($data);
    }

    public function index()
    {
        return $this->model::all();
    }

    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    public function update($id, $data)
    {
        $record = $this->model::findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function edit($id)
    {
        return $this->model::findOrFail($id);
    }

    public function destroy($id)
    {
        $record = $this->model::findOrFail($id);
        $record->delete();
        return $record;
    }
}
