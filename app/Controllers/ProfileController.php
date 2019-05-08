<?php

namespace App\Controllers;

use System\Core\BaseController;

class ProfileController extends BaseController
{
    public function __construct()
    {
        if(!$this->checkLogin('admin')) {
            redirect(url('/login'));
        }
    }
    public function index()
    {
        redirect(url('/profile/edit'));

    }

    public function edit()
    {
        $user = current_user('admin');

        view('back/profile/edit', compact('user'));

    }
    public function update()
    {
        extract($_POST);

        $user = current_user('admin');
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->address = $address;
        $user->save();

        $_SESSION['message'] = [
            'content' => 'Profile updated.',
            'type' => 'success'
        ];

        redirect(url('/profile/edit'));
    }

}