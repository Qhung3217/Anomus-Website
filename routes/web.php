<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CommentController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\PostDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [PostController::class, 'index'])->name('posts');
Route::get('/postForm', function () {
    return view('postForm',['title' => 'Đăng bài']);
});
Route::get('/postdetail/{id}', [PostDetailController::class, 'index'])->name('postDetail');
Route::get('/mostheart', [PostController::class, 'mostHeart']);
Route::get('/mostview', [PostController::class, 'mostView']);
Route::get('/search', [PostController::class, 'search']);
Route::get('/test/{id}/value/{value}', [CookieController::class, 'setcookie']);
Route::get('/getcookievalue', [CookieController::class, 'getCookie']);
Route::get('/loadpostdetail/{id}', [AjaxController::class, 'loadPostDetail']);

Route::post('/postForm', [PostController::class, 'store']);


Route::post('/upload', [UploadController::class, 'store']);
Route::prefix('postdetail')->group(function(){
    Route::post('/comment', [CommentController::class, 'store']);
    Route::post('/loadcomment',[CommentController::class, 'indexAjax']);
    Route::post('/getcommentcount', [AjaxController::class, 'getCommentCount']);
    Route::post('/reactheart',[AjaxController::class, 'reactHeart']);
    Route::post('/setcookie',[CookieController::class, 'setCookie'])->name('setcookie');
});

Route::get('/manageposted', [PostController::class, 'posted'])->name('manageposted');
Route::prefix('manageposted')->group(function(){
    Route::delete('/remove', [PostController::class, 'remove']);
    Route::get('/edit/{post}', [PostController::class, 'show']);
    Route::post('/edit', [PostController::class, 'update']);
});


Route::get('nav',function(){
    return view('test');
});
Route::prefix('admin')->group(function(){

    Route::get('/login',function(){
        return view('admin/login');
    })->name('login');

    Route::post('/auth', [AdminController::class, 'login']);

    Route::middleware(['isAdmin'])->group(function(){
        Route::get('/manage',[AdminController::class, 'manage']);
        Route::get('/logout', [AdminController::class, 'logout']);
        Route::get('/mostheart', [AdminController::class, 'mostHeart']);
        Route::get('/mostview', [AdminController::class, 'mostView']);
        Route::get('/search', [AdminController::class, 'search']);
        Route::get('/postdetail/{id}', [AdminController::class, 'index'])->name('postDetail');
        Route::post('/loadcomment',[AdminController::class, 'indexAjax']);
        Route::DELETE('/manage/postdetail/removeCMT', [AdminController::class, 'removeCMT']);
        Route::get('/changePwd', function(){
            return view('admin.changePwd',[
                'title' => 'Đổi mật khẩu'
            ]);
        });

        Route::post('/changePwd', [AdminController::class, 'changePwd']);
    });

});

