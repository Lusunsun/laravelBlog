<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\ArticleService;

class IndexController extends Controller
{
    private $ArticleService;
    public function __construct(ArticleService $articleService)
    {
        $this->ArticleService = $articleService;
    }

    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $keyWord = $request->input('keyWord');
        $categoryId = $request->input('categoryId');
        $tag = $request->input('tag' ,null);
        $limit = 5;
        $result = $this->ArticleService->getArticleList($page, $keyWord, $categoryId, $limit, $tag);
        $articles = $result['data'];
        $count = ceil($result['count']/$limit);
        return view('index.index',compact('articles','page','count'));
    }
}
