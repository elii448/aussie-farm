<?php

namespace App\Repositories;

use App\Models\Kangaroo;
use Illuminate\Support\Facades\DB;

class KangarooRepository
{
    public function __construct(private Kangaroo $kangaroo) {}

    public function create(array $data): Kangaroo
    {
        return $this->kangaroo::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->kangaroo::find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->kangaroo::find($id)->update([ 'is_deleted' => 1 ]);
    }

    public function getAll(array $filters = [], int $perPage = 10)
    {
        $query = $this->kangaroo::query();
        $query->where('is_deleted', '=', 0);

        foreach ($filters as $field => $value) {
            if ($value !== null && $value !== '') {
                $query->where($field, 'like', '%' . $value . '%');
            }
        }

        $sortField = request('sort_field', 'id');
        $sortDirection = request('sort_direction', 'asc');
        $query->orderBy($sortField, $sortDirection);

        return $query->get();
    }

    public function getDataById(int $id)
    {
        return $this->kangaroo::find($id);
    }
}
