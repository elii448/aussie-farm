<?php 

namespace App\Http\Controllers\Api;

use App\Http\Requests\KangarooFormRequest;
use App\Services\KangarooService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KangarooApiController extends Controller
{

    public function __construct(private KangarooService $kangarooService) {}

    public function saveData(KangarooFormRequest $request) {
        return $this->kangarooService->saveData($request);
    }

    public function updateData(KangarooFormRequest $request) {
        return $this->kangarooService->updateData($request);
    }

    public function deleteData(int $id) {
        return $this->kangarooService->deleteData($id);
    }

    public function kangarooList(Request $request) {
        return $this->kangarooService->kangarooList($request);
    }
}
