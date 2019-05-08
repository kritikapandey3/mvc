<?php

namespace App\Controllers;

use System\Core\BaseController;

class PasswordController extends BaseController
{
    public function __construct()
    {
        if(!$this->checkLogin('admin')) {
            redirect(url('/login'));
        }
    }
    public function index()
    {
        redirect(url('/password/edit'));

    }

    public function edit()
    {
        view('back/password/edit');

    }
    public function update()
    {
        extract($_POST);

        $user = current_user('admin');
        $old_password = sha1($old_password);
        $password = sha1($password);

        if($old_password != $user->password) {
            $_SESSION['message'] = [
                'content' => 'Old password is incorrect.',
                'type' => 'danger'
            ];

            redirect(url('/password/edit'));
            die;
        }

        $user->password = $password;
        $user->save();

        $_SESSION['message'] = [
            'content' => 'Password changed.',
            'type' => 'success'
        ];

        redirect(url('/password/edit'));
    }

}