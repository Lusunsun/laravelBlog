<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Article extends Model
{
    protected $table = 'article';

    public function getArticle($id)
    {
        $select = ['article.id','article.title','article.content','article.views','article.comments','article.updateTime','article.isHot','category.name','article.htmlContent','article.tag'];

        $where['article.isDelete'] = 0;
        $where['category.isDelete'] = 0;
        $where['article.id'] = $id;

        $data = DB::table('article')
            ->join('category', 'article.categoryId', '=', 'category.id')
            ->where($where)
            ->select($select)
            ->first();
        return $data;
    }

    public function getAllArticle($page = 1, $keyWord = null, $categoryId = null, $limit, $tag = null)
    {
        $offset = ($page-1) * $limit;
        $select = ['article.id','article.title','article.content','article.views','article.comments','article.updateTime','article.isHot','category.name as categoryName','article.htmlContent'];

        $where[] = ['article.isDelete','=',0];
        $where[] = ['category.isDelete','=',0];

        if (!empty($keyWord)) {
            $where[] = ['article.title', 'like', '%'.$keyWord.'%'];
        }

        if (!empty($categoryId)) {
            $where[] = ['article.categoryId','=',$categoryId];
        }

        if (!empty($tag)) {
            $where[] = ['article.tag','like','%'.$tag.'%'];
        }

        $countQuery = $query = DB::table('article')
            ->leftjoin('category', 'article.categoryId', '=', 'category.id')
            ->where($where)
            ->select($select);
        $count = $countQuery->count();
        $data = $query->offset($offset)
            ->limit($limit)
            ->orderBy('id')
            ->get();
        return compact('data','count');
    }

    public function editArticle($param)
    {
        $where['id'] = $param['id'];
        $updateData = [
            'title' => $param['title'],
            'content' => $param['content'],
            'isHot' => $param['isHot'],
            'categoryId' => $param['categoryId'],
            'comments' => $param['comments'],
            'views' => $param['views'],
            'htmlContent' => $param['htmlContent'],
            'tag' => $param['tag'],
            'updateTime' => time()
        ];
        $result = DB::table('article')->where($where)->update($updateData);
        return ($result == 1) ? true : false;
    }

    public function deleteArticle($param)
    {
        $where['id'] = $param['id'];
        $result = DB::table('article')->where($where)->update(['isDelete'=>1]);
        return ($result == 1) ? true : false;
    }

    public function addArticle($param)
    {
        $insertData = [
            'title' => $param['title'],
            'content' => $param['content'],
            'isHot' => $param['isHot'],
            'categoryId' => $param['categoryId'],
            'views' => $param['categoryId'],
            'comments' => $param['comments'],
            'htmlContent' => $param['htmlContent'],
            'tag' => $param['tag'],
            'updateTime' => time()
        ];
        return DB::table('article')->insert($insertData);
    }

    public function getHots()
    {
        $select = ['updateTime','id','title','tag'];
        $where['isHot'] = 1;
        $where['isDelete'] = 0;
        return DB::table('article')->where($where)->select($select)->take(5)->orderBy('views','desc')->get();
    }

    public function getTags()
    {
        $where['isHot'] = 1;
        $where['isDelete'] = 0;
        return DB::table('article')->where($where)->lists('tag');
    }

}
