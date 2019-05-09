<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\CommentService;

class CommentController extends Controller
{
    private $commentService;

    function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function lists(Request $request){
        $page = $request->input('page', 1);
        $limit = 10;
        $data  = $this->commentService->getCommentList($page, $limit);
        return view('admin.comment.lists',['comments'=>$data['data'],'page'=>$page,'count'=>$data['count']]);
    }

    public function add(Request $request)
    {
        $param = $request->only('id','email','content','name');
        $param['time'] = time();
        return view('index.comment',['param'=>$param]);
    }


}
