<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session;
use App\Http\Services\PostService;
use App\Http\Services\CookieService;
use App\Http\Services\CommentService;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    protected $postService;
    protected $cookieService;
    protected $commentService;

    public function __construct(PostService $postService, CommentService $commentService, CookieService $cookieService){
        $this->postService = $postService;
        $this->commentService = $commentService;
        $this->cookieService = $cookieService;
    }

    public function index(){
        return view('posts', [
            'title' => 'Trang chủ',
            'posts' => $this->postService->get(),
        ]);
    }

    public function store(PostFormRequest $request){
        // dd($request->cookie('posted'));
        $result = $this->postService->insert($request);
        if ($request->cookie('posted') === null)
            $this->cookieService->set('posted',$result->id);
        else{
            $value = $request->cookie('posted');
            // dd($result);
            $value .= '-'.$result->id;
            $this->cookieService->set('posted',$value);
        }
        return redirect()->route('posts');
    }

    public function getCommentCount(posts $id){
        // dd($id);
        $this->commentService->getCommentCount($id);
    }

    public function mostHeart(){
        return view('posts', [
            'title' => 'Lượt tim nhiều nhất',
            'posts' => $this->postService->listOrderbyHeartNumber(),
        ]);

    }

    public function mostView(){
        return view('posts', [
            'title' => 'Lượt xem nhiều nhất',
            'posts' => $this->postService->listOrderbyViewNumber(),
        ]);
    }

    public function search(Request $request){
        return view('posts', [
            'title' => 'Trang chủ',
            'posts' => $this->postService->getWithTitle($request->input('search')),
        ]);
    }

    public function posted(Request $request){

        $posted = $request->cookie('posted');
        // chuyen tu string sang array
        $posted = explode('-',$posted);

        $posts = $this->postService->getWithIdArray($posted);
        return view('managePosted',[
            'title' => 'Quản lý bài viết đã đăng',
            'posts' => $posts,
        ]);
    }

    public function remove(Request $request){
        $result = $this->postService->remove($request);
        if ($result){
            return response([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response([
            'error' => true
        ]);
    }

    public function show(posts $post){
        // dd($post->title);
        return view('editPost',[
            'title' => "Chỉnh sửa bài đăng",
            'post' => $post
        ]);
    }

    public function update(Request $request){
        // dd($request);
        $update = $this->postService->update($request);
        if ($update){
            return redirect()->route('manageposted');
        }
        return redirect()->back();
    }
}
