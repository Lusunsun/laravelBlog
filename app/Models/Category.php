<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{

    public function getAllCategory($select = ['*'])
    {
        $where['isDelete'] = 0;
        $data = Db::table('category')->where($where)->select($select)->get();
        return $data;
    }

    public function getCategory($id,$select = ['*'])
    {
        $where['isDelete'] = 0;
        $data = Db::table('category')->where($where)->select($select)->find($id);
        return $data;
    }

    public function editCategory($param)
    {
        $where['id'] = $param['id'];
        $updateData = [
            'name' => $param['name'],
            'isHot' => $param['isHot'],
            'updateTime' => time(),
            'views' => $param['views'],
            'comments' => $param['comments'],
        ];
        $result = Db::table('category')->where($where)->update($updateData);
        return ($result == 1) ? true : false;
    }

    public function deleteCategory($id)
    {
        $where['id'] = $id;
        $result = Db::table('category')->where($where)->update(['isDelete'=>1]);
        return ($result == 1) ? true : false;
    }

    public function addCategory($param)
    {
        $insertData = [
            'name' => $param['name'],
            'isHot' => $param['isHot'],
            'updateTime' => time()
        ];
        return DB::table('category')->insert($insertData);
    }
}
