<?php
namespace App\Services;

use App\Models\Tag;

class  TagService {

    private $Tag;

    function __construct(Tag $Tag)
    {
        $this->Tag = $Tag;
    }

    public function getAll($page)
    {
        return $this->Tag->getAll($page);
    }

    public function showAll()
    {
        $tags = $this->Tag->showAll();
        $tagStr = '';
        foreach ($tags as $key =>$value){
            $tagStr .=$value->name.' ';
        }
        return trim($tagStr);
    }

    public function addTag($param)
    {
        return $this->Tag->addTag($param);
    }

    public function deleteTag($id)
    {
        return $this->Tag->deleteTag($id);
    }

    public function getTag($id)
    {
        return $this->Tag->getTag($id);
    }

    public function editTag($param)
    {
        return $this->Tag->editTag($param);
    }

}