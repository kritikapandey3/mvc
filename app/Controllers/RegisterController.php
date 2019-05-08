<?php
namespace App\Controllers;


use App\Models\User;
use System\Core\BaseController;

class RegisterController extends BaseController
{
    public function index()
    {
        view('front/register/index');
    }

    public function store()
    {
        extract($_POST);

        $password = sha1($password);

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->phone = $phone;
        $user->address = $address;
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        $_SESSION['message'] = [
            'content' => 'Registration successfull. Please log in to access your account.',
            'type' => 'success'
        ];

        redirect(url('/user/login'));
    }
}