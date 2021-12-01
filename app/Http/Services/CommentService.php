<?php

namespace App\Http\Services;

use App\Models\comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CommentService{

    public function get($id){
        $cmt = comments::where('id',$id)->get();
        return $cmt;
    }

    public function getAjax($id){
        $cmts = comments::where('id',$id)->orderBy('Cmt_id', 'desc')->get();
        $html="";

        foreach ($cmts as $cmt){
            $html .="
            <div class='comment-content'>

            <div class='show-comment-content'>

                <span>".$cmt->content."</span>

            </div>

            <div class='show-comment-sign'>

                <span>--".$cmt->sign."</span>

            </div>

            </div>";
        };

        echo $html;
    }

    public function insert($request){
        // return $request;
        // dd($request);
        try{
            comments::create([
                'content' => $request->input('comment_field'),
                'sign' => $request->input('sign'),
                'id' => $request->input('id'),
            ]);

        }catch(\Exception $e){

            Session::flash('errors', 'Bình luận lỗi!');

            Log::error($e->getMessage());

            return false;
        }

        return true;
    }

    public function getCommentCount($id){
        $cmtNumb = comments::where('id',$id)->groupBy('id')->count();
        return $cmtNumb;
    }
    public function remove($request){
        $id = $request->input('Cmt_id');
        // dd($request->input());
        $comment = comments::where('Cmt_id',$id)->first();
        if ($comment){

            return comments::where('Cmt_id',$id)->delete();
        }


        return false;
    }
}
