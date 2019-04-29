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

    public function getArticleList($page, $keyWord, $categoryId, $limit, $tag)
    {
        return $this->article->getAllArticle($page, $keyWord, $categoryId , $limit, $tag);
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

    /**
     * [
     *   'tagName'=>[ArticleIds]
     * ]
     */
    public function getHotTags()
    {
        $tagArr = [];
        $tags = $this->article->getTags();
        foreach ($tags as $key => $tag){
            $tag = strtolower($tag);
            $arr = explode(',', $tag);
            $tagArr = array_merge($tagArr, $arr);
        }
        return array_unique(array_filter($tagArr));
    }
}