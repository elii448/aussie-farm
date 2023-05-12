<?php

namespace App\Services;

use App\Http\Requests\KangarooFormRequest;
use App\Repositories\KangarooRepository;
use Illuminate\Http\Request;

class KangarooService
{
    public function __construct(private KangarooRepository $kangarooRepository) {}

    public function saveData(KangarooFormRequest $request)
    {
        return $this->kangarooRepository->create($request->toArray());
    }

    public function updateData(KangarooFormRequest $request)
    {
        return $this->kangarooRepository->update($request->id, $request->toArray());
    }

    public function deleteData(int $id)
    {
        return $this->kangarooRepository->delete($id);
    }

    public function kangarooList(Request $request)
    {
        return $this->kangarooRepository->getAll();
    }

    public function kangarooData(int $id)
    {
        return $this->kangarooRepository->getDataById($id);
    }
}
