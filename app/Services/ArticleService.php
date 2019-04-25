<?php
namespace App\Services;

use App\Models\Article;
use DB;

class  ArticleService {

    private $article;

    function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getArticleList($page,$keyWord,$categoryId)
    {
        return $this->article->getAllArticle($page,$keyWord,$categoryId);
    }

    public function getArticle($id)
    {
        return $this->article->getArticle($id);
    }

    public function editArticle($param)
    {
        return $this->article->editArticle($param);
    }

    public function deleteArticle($param)
    {
        return $this->article->deleteArticle($param);
    }

    public function addArticle($param)
    {
        return $this->article->addArticle($param);
    }

    public function getHots()
    {
        return $this->article->getHots();
    }
}