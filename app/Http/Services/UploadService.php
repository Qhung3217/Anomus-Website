<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class UploadService{

    public function store($request){
        try {
            if ($request->hasFile('thumb')){

                $pathFull = 'uploads/'. date('Y-m-d');

                $path = $request->file('thumb')->store('public/'.$pathFull);

                $result = str_replace('public','storage', $path);

                $result = '/' . $result;

                return $result;
            }
        } catch (\Exception $e) {
            return false;
        }

    }

}
