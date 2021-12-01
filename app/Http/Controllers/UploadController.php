<?php

namespace App\Http\Controllers;

use App\Http\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    // php artisan storage:link
    protected $uploadService;

    public function __construct(UploadService $uploadService){
        $this->uploadService = $uploadService;
    }

    public function store(Request $request){
        // dd($request);
        $url = $this->uploadService->store($request);

        if ($url != false) {
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }
}
