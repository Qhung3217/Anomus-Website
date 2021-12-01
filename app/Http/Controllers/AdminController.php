<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ChangePwdRequest;
use App\Http\Services\AdminService;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CommentService;
use App\Http\Services\CookieService;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    protected $postService;
    protected $adminService;
    protected $commentService;
    protected $cookieService;

    public function __construct(
        PostService $postService,
        AdminService $adminService,
        CommentService $commentService,
        CookieService $cookieService
        ){

        $this->postService = $postService;
        $this->adminService = $adminService;
        $this->commentService = $commentService;
        $this->cookieService = $cookieService;

    }

    public function login(AdminRequest $request){
        $data = ['name' => $request->input('usr'), 'password' => $request->input("pwd")];
        if (Auth::guard('admin')->attempt($data)){
            return redirect('/admin/manage');
        }
        else{
            Session::flash('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
            return redirect()->back();
        }
    }
    public function manage(){
        return view('admin/manage',[
            'title' => 'Trang quản trị',
            'posts' => $this->postService->get(),
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    public function mostHeart(){
        return view('/admin/manage', [
            'title' => 'Lượt tim nhiều nhất',
            'posts' => $this->postService->listOrderbyHeartNumber(),
        ]);

    }

    public function mostView(){
        return view('/admin/manage', [
            'title' => 'Lượt xem nhiều nhất',
            'posts' => $this->postService->listOrderbyViewNumber(),
        ]);
    }
    public function search(Request $request){
        return view('admin/manage', [
            'title' => 'Trang Quản trị',
            'posts' => $this->postService->getWithTitle($request->input('search')),
        ]);
    }
    public function indexAjax(Request $request){
        // dd($request);
        $cmts = $this->adminService->getAjax($request->input('id'));
        // dd($cmts);
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

        return view('admin.postDetail',[
            'title' => 'Chi tiết bài đăng',
            'result' => $result,
            'cmts' => $cmt,
        ]);
    }

    public function removeCMT(Request $request){
        // dd($request);
        $result = $this->commentService->remove($request);
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

    public function changePwd(ChangePwdRequest $request){
        // dd($request->input());
        $data = ['name' => 'admin', 'password' => $request->input('pwd')];
        if (Auth::guard('admin')->attempt($data)){
            if ($request->input('newpwd') === $request->input('newpwd2')){
                $this->adminService->changePassword('admin', $request->input('newpwd'));
            }
            else {
                Session::flash('error', 'Mật khẩu mới không giống');
                return redirect()->back();
            }
        }
        else{
            Session::flash('error', 'Mật khẩu cũ không chính xác');
            return redirect()->back();
        }

        return $this->manage();
    }
}
