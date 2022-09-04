<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    /**
     * Retrieve test data just for a test
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([ 'data' => [] ]);
    }
}
