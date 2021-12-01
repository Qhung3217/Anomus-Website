<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class CookieService{
    public function set($name, $value){
        // dd($request);
        // dd($name,$value);
        // cookie forever minute 2628000
        Cookie::queue($name,$value,2628000);
    }

    public function delete(Request $request,$name){
        try{
            Cookie::forget($request->cookie($name));
        }
        catch(\Exception $e){
            return false;
        }

        return true;
    }
}
