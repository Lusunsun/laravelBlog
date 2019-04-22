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

    public function getArticleList()
    {
        return $this->article->getAllArticle();
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
}