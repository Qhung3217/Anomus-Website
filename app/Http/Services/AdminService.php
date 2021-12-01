<?php

namespace App\Http\Services;

use App\Models\admin;
use App\Models\comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AdminService{

    public function getAjax($id){
        $cmts = comments::where('id',$id)->orderBy('Cmt_id', 'desc')->get();
        $html="";

        foreach ($cmts as $cmt){
            $html .="
            <div class='comment-content' style='position:relative;'>

            <div class='show-comment-content'>

                <span>".$cmt->content."</span>

            </div>

            <div class='show-comment-sign'>

                <span>--".$cmt->sign."</span>

            </div>

            <div class='action'>
            <div class='delete button' id='delete' onclick='remove(".$cmt->Cmt_id.")'>
                <ion-icon name='close-outline'style='color:white'></ion-icon>
            </div>
            </div>

            </div>";
        };

        echo $html;
    }

    public function changePassword($username, $password){
        $pwd = bcrypt($password);
        admin::where('name', $username)->update(['password' => $pwd]);
    }

}
