<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getSelect()
    {
        return $this->categoryService->getSelect();
    }

    public function lists()
    {
        $categoryLists = $this->categoryService->getCategoryLists();
        $trColor = trColor();
        return view('admin.category.lists',compact('categoryLists','trColor'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $categoryData = $this->categoryService->getCategory($id);
        return view('admin.category.update',compact('categoryData'));
    }

    public function edit(Request $request)
    {
        $param = $request->only(['id','name','isHot','views','comments']);
        return $this->categoryService->editCategory($param) ? 'success' : 'error';
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function add(Request $request)
    {
        $param = $request->only(['name','isHot']);
        return $this->categoryService->addCategory($param) ? 'success' : 'error';
    }

    public function delete(Request $request)
    {
        $param = $request->only(['id']);
        return $this->categoryService->deleteCategory($param) ? 'success' : 'error';
    }
}
