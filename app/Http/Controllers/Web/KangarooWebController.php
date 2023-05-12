<?php 

namespace App\Http\Controllers\Web;

use App\Http\Requests\KangarooFormRequest;
use App\Services\KangarooService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KangarooWebController extends Controller
{

    public function __construct(private KangarooService $kangarooService) {}

    public function kangarooData(int $id) {
        return view(
            'details',
            [
                'kangaroo' => $this->kangarooService->kangarooData($id)
            ]
        );
    }

    public function updateData(int $id) {
        // dd($this->kangarooService->kangarooData($id)->get());
        return view(
            'create',
            [
                'kangaroo' => $this->kangarooService->kangarooData($id)
            ]
        );
    }
}
