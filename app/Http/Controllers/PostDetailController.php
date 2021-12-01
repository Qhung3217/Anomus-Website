<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Services\CommentService;
use App\Http\Services\CookieService;
use Illuminate\Http\Response;
use App\Models\posts;
use Illuminate\Support\Facades\Cookie;

class PostDetailController extends Controller
{
    protected $postService;
    protected $commentService;
    protected $cookieService;

    public function __construct(PostService $postService, CommentService $commentService,CookieService $cookieService)
    {
        $this->postService = $postService;
        $this->commentService = $commentService;
        $this->cookieService = $cookieService;
    }

    public function index(posts $id){
        // Moi doi Request hanh posts
        // set cookie react
        if (Cookie::get($id->id) === null){
            $this->cookieService->set($id->id,'black');
        }

        // add 1 view to this post
        // should place before $result because cause wrong display
        if (Cookie::get($id->id) === null){
            $this->postService->addView($id->id);
        }

        //get post with comment_count
        $result = $this->postService->getWithId($id->id);

        // get list comment post_id = $id
        $cmt = $this->commentService->get($id->id);

        return view('postDetail',[
            'title' => 'Chi tiết bài đăng',
            'result' => $result,
            'cmts' => $cmt,
        ]);

    }
}
