<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Comment extends Model
{
    public function getAllComment($page = 1, $limit)
    {
        $offset = ($page-1) * $limit;
        $select = ['comment.*','article.title','category.name as categoryName'];

        $where[] = ['article.isDelete','=',0];
        $where[] = ['category.isDelete','=',0];


        $countQuery = $query = DB::table('comment')
            ->leftjoin('article', 'article.id', '=', 'comment.articleId')
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

    public function addComment($param)
    {
        $insertData = [
            'articleId' => $param['id'],
            'email' => $param['email'],
            'content' => $param['content'],
            'name' => $param['name'],
            'createTime' => time()
        ];
        return DB::table('comment')->insert($insertData);
    }

    public function getComment($id)
    {
        $where[] = ['isDelete','=',0];
        $where[] = ['articleId','=',$id];
        return  DB::table('comment')->where($where)->get();
    }
}
