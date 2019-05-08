<?php

namespace App\Controllers;


use App\Models\Category;
use App\Models\Package;
use System\Core\BaseController;

class CategoryController extends BaseController
{
    /**
     * Dynamically handle function that has not been created
     * known as magic method
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        $this->show($name);
    }

    public function index()
    {
        header('HTTP/1.1 404 not Found');
    }

    public function show($id)
    {
        $category = new Category;
        $category->load($id);

        $packages = $category->related(Package::class, 'category_id','child')->order('created_at', 'DESC')->get();

        view('front/category/show', compact('category','packages'));
    }

}