<?php
namespace App\Controllers;


use App\Models\Category;
use App\Models\User;
use System\Core\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
        $data = $this->paginate(new User, 10, 'users');

        view('back/users/index', $data);
    }

    public function edit($id)
    {
        $user = new User;
        $user->load($id);

        view('back/users/edit', compact('user'));
    }

    public function update($id)
    {
        extract($_POST);

        $user = new User;
        $user->load($id);
        $user->name = $name;
        $user->phone = $phone;
        $user->address = $address;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        $_SESSION['message'] = [
            'content' => 'User updated',
            'type' => 'success'
        ];

        redirect(url('/users'));
    }

    public function delete($id)
    {
        $category = new User;
        $category->load($id);
        $category->delete();

        $_SESSION['message'] = [
            'content' => 'User removed.',
            'type' => 'success'
        ];

        redirect(url('/users'));
    }


}