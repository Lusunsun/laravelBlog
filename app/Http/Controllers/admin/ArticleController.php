<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\ArticleService;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    private $articleService;

    function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function lists()
    {
        $articleListData = $this->articleService->getArticleList();
        $trColor = trColor();
        return view('admin.article.lists',compact('articleListData','trColor'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $articleData = $this->articleService->getArticle($id);
        return view('admin.article.update',compact('articleData'));
    }

    public function edit(Request $request)
    {
        $param = $request->only(['id','title','categoryId','isHot','views','comments','content','htmlContent']);
        return $this->articleService->editArticle($param) ? 'success' : 'error';
    }

    public function delete(Request $request)
    {
        $param = $request->only(['id']);
        return $this->articleService->deleteArticle($param) ? 'success' : 'error';
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function add(Request $request)
    {
        $param = $request->only(['categoryId','comments','title','content','isHot']);
        return $this->articleService->addArticle($param) ? 'success' : 'error';
    }

}
