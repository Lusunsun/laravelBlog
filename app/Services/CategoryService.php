<?php
namespace App\Services;

use App\Models\Category;
use DB;

class  CategoryService {

    private $category;

    function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getSelect()
    {
        return $this->category->getSelect();
    }

    public function getCategoryLists($page)
    {
        return $this->category->getAllCategory($page);
    }

    public function getCategory($id)
    {
        return $this->category->getCategory($id);
    }

    public function editCategory($param)
    {
        return $this->category->editCategory($param);
    }

    public function addCategory($param)
    {
        return $this->category->addCategory($param);
    }

    public function deleteCategory($id)
    {
        return $this->category->deleteCategory($id);
    }

}