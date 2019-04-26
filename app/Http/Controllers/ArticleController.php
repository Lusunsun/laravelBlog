<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    private $ArticleService;
    public function __construct(ArticleService $articleService)
    {
        $this->ArticleService = $articleService;
    }

    public function index(Request $request)
    {
        $id = $request->input('id');
        $article = $this->ArticleService->getArticle($id);
        return view('index.article',compact('article'));
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
