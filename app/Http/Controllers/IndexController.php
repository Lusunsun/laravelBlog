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

    public function index()
    {
        $articles = $this->ArticleService->getArticleList();
        return view('index.index',compact('articles'));
    }
}
