<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Http\Services\CommentService;
use App\Models\comments;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService){
        $this->commentService = $commentService;
    }

    public function indexAjax(Request $request){
        // dd($request->input('id'));
        $cmts = $this->commentService->getAjax($request->input('id'));
        // dd($cmts);
    }

    public function store(Request $request){
        // return $this->commentService->insert($request);
        // bat loi
        if ($request->input('comment_field') === null)
            return response()->json([
                'error' => false]);

        $result = $this->commentService->insert($request);;

        if ($result === false){
            return response()->json([
                'error' => false]);
        }

        return response()->json([
                'error' => true
        ]);
    }
}
