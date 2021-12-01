<?php

namespace App\Http\Services;

use App\Models\posts;
use App\Models\comments;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostService{
    public function insert($request){
        // dd($request->input());
        try {
            $data = posts::create($request->input());
            // dd($data->id);
            Session::flash('success', 'Đăng bài thành công');
        } catch (\Exception $e) {

            Session::flash('error', 'Lỗi! Vui lòng đăng lại');

            Log::error($e->getMessage());

            return false;
        }

        return $data;
    }
    public function getWithIdArray($ids){
        // dd($ids);
        $posts = posts::withCount('comments')->whereIn('id',$ids)->simplePaginate(12);
        return $posts;
    }
    public function get() {
        // return DB::table('posts')->get();
        $posts = posts::withCount('comments')->orderBy('id', 'desc')->simplePaginate(12);//trich xuat du lieu cung voi dem bao nhiu comment trong function comments cua modal posts
        return $posts;
    }

    public function getWithId($id) {
        // return DB::table('posts')->get();
        $posts = posts::withCount('comments')->where('id',$id)->get();//trich xuat du lieu cung voi dem bao nhiu comment trong function comments cua modal posts
        return $posts;

    }

    public function getWithTitle($title) {
        // return DB::table('posts')->get();
        $posts = posts::withCount('comments')->where('title','like','%'.$title.'%')->simplePaginate(12);//trich xuat du lieu cung voi dem bao nhiu comment trong function comments cua modal posts
        return $posts;

    }

    public function addView($id){
        posts::where('id',$id)->update(['viewNums' => DB::raw('viewNums+1')]);
    }

    public function addHeart($id){
        posts::where('id',$id)->update(['heartNums' => DB::raw('heartNums+1')]);
    }

    public function minusHeart($id){
        posts::where('id',$id)->update(['heartNums' => DB::raw('heartNums-1')]);
    }

    public function getHeartNumber($id){
        $heartNumb = posts::select('heartNums')->where('id',$id)->get();
        return $heartNumb;
    }

    public function getViewNumber($id){
        $viewNumb = posts::select('viewNums')->where('id',$id)->get();
        return $viewNumb;
    }

    public function listOrderbyHeartNumber(){
        $post = posts::withCount('comments')->orderBy('heartNums', 'desc')->simplePaginate(12);
        return $post;
    }

    public function listOrderbyViewNumber(){
        $post = posts::withCount('comments')->orderBy('viewNums', 'desc')->simplePaginate(12);
        return $post;
    }

    public function remove($request){
        $id = $request->input('id');
        // dd(Cookie::forget($id));
        $post = posts::where('id',$id)->first();
        if ($post){
            if ($post->thumb != null){
                $path = str_replace('storage', 'public',$post->thumb);
                Storage::delete($path);
            }
            Cookie::queue(Cookie::forget($id));
            return posts::where('id',$id)->delete();
        }


        return false;

    }

    public function update($request){
        try {
            $temp = posts::find($request->input('id'));
            $temp->fill($request->input());
            $temp->save();
        } catch (\Exception $th) {
            Session::flash('error', 'Chỉnh sửa bài đăng lỗi!');
            Log::error($th->getMessage());
            return false;
        }
        return true;
    }
}
