<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GatewayClient\Gateway;
use App\Services\ArticleService;
use App\Services\CommentService;

use Illuminate\Support\Facades\Event;
use App\Events\ViewEvent;

class ArticleController extends Controller
{
    private $ArticleService;
    private $CommentService;

    public function __construct(ArticleService $articleService, CommentService $CommentService)
    {
        $this->ArticleService = $articleService;
        $this->CommentService = $CommentService;
    }

    public function index(Request $request)
    {
        $id = $request->input('id');
        Event::fire(new ViewEvent($id));//触发浏览事件
        $article = $this->ArticleService->getArticle($id);
        $comments = $this->CommentService->getComment($id);
        return view('index.article',compact('article','comments'));
    }

    public function articleList()
    {
        return view('index.articleList');
    }

    public function getHots()
    {
        return $this->ArticleService->getHots();
    }

    public function getHotTags()
    {
        return $this->ArticleService->getHotTags();
    }
}
