<?php
namespace App\Controllers;


use App\Models\Category;
use System\Core\BaseController;

class CategoriesController extends BaseController
{
    public function index()
    {
        $data = $this->paginate(new Category, 10, 'categories');

        view('back/categories/index', $data);
    }

    public function create() {
        view('back/categories/create');
    }

    public function store()
    {
        extract($_POST);

        $category = new Category;
        $category->name = $name;
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $_SESSION['message'] = [
            'content' => 'Category added',
            'type' => 'success'
        ];

        redirect(url('/categories'));
    }

    public function edit($id)
    {
        $category = new Category;
        $category->load($id);

        view('back/categories/edit', compact('category'));
    }

    public function update($id)
    {
        extract($_POST);

        $category = new Category;
        $category->load($id);
        $category->name = $name;
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();

        $_SESSION['message'] = [
            'content' => 'Category added',
            'type' => 'success'
        ];

        redirect(url('/categories'));
    }

    public function delete($id)
    {
        $category = new Category;
        $category->load($id);
        $category->delete();

        $_SESSION['message'] = [
            'content' => 'Category removed.',
            'type' => 'success'
        ];

        redirect(url('/categories'));
    }


}