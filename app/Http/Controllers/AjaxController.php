<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Services\CookieService;
use App\Http\Services\CommentService;
use Illuminate\Support\Facades\Cookie;

class AjaxController extends Controller
{
    protected $commentService;
    protected $postService;
    protected $cookieService;

    public function __construct(CommentService $commentService,PostService $postService,CookieService $cookieService){
        $this->commentService = $commentService;
        $this->postService = $postService;
        $this->cookieService = $cookieService;
    }

    public function getCommentCount(Request $request){
        // dd($id);
        $cmtNumb=$this->commentService->getCommentCount($request->input('id'));
        $html = "".$cmtNumb." bình luận";
        echo $html;
    }

    public function getViewCount(Request $request){
        $viewNumb = $this->postService->getViewNumber($request->input('id'));
        echo $viewNumb[0]->viewNums;
    }

    public function reactHeart(Request $request){
        if ($request->input('condition') == 1){
            $this->postService->addHeart($request->input('id'));
            $this->cookieService->set($request->input('id'),'red');
        }
        else{
            $this->postService->minusHeart($request->input('id'));
            $this->cookieService->set($request->input('id'),'black');
        }
        $heartNumb = $this->postService->getHeartNumber($request->input('id'));
        $viewNumb = $this->postService->getViewNumber($request->input('id'));
        // $html = "".$heartNumb;
        // dd($heartNumb);
        // echo $heartNumb[0]->heartNums . ',' .$viewNumb[0]->viewNums;
        return ['heart' => $heartNumb[0]->heartNums,'view' => $viewNumb[0]->viewNums];
    }
}
