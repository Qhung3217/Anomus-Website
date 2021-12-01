<?php

namespace App\Http\Controllers;

use App\Http\Services\CookieService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;


class CookieController extends Controller
{
    protected $cookieService;

    public function __construct(CookieService $cookieService){
        $this->cookieService = $cookieService;
    }

    public function setCookie($name, $value, $expires){
        // dd($request->id,$request->value);
        // dd($this->cookieService);
        return $this->cookieService->set($name,$value ,$expires);

    }

    public function setCookieColor(Request $request){
        // dd($request);
        $id = $request->id;
        // dd($id);
        $cookieValue = $this->getCookie($request);
        dd($cookieValue[$id]);
        // if ($cookieValue[$id] == )
        if ($cookieValue[$id] == 'black')
            return $this->cookieService->set($id, 'red');
        else
            return $this->cookieService->set($id, 'black');

    }

    public function deleteCookie(Request $request,$name){
        return $this->cookieService->delete($request,$name);
    }

    public function getCookie(Request $request) {
        // dd($request);
        $value = $request->cookie();
        // return $value['colorReact'];
        return $value;
    }
}
