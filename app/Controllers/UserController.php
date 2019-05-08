<?php
namespace App\Controllers;


use App\Models\Booking;
use App\Models\Review;
use App\Models\User;
use System\Core\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $user = current_user('user');

        $bookings = $user->related(Booking::class, 'user_id', 'child')->get();

        $reviews = $user->related(Review::class, 'user_id', 'child')->get();

        view('front/user/index',compact('bookings', 'user', 'reviews'));
    }

    public function login()
    {
        if($this->checkLogin('user')) {
            redirect(url('/user'));
        }
        view('front/user/login');

    }

    public function loginCheck()
    {
        if(!$this->checkLogin('user')) {
            redirect(url('/user'));
        }
        extract($_POST);

        $password = sha1($password);

        $user = new User;
        $login = $user->where('email', $email)
            ->where('password', $password)
            ->single();

        if(!empty($login)) {
            $_SESSION['user'] = $login->id;

            redirect(url('/user'));
        }
        else {
            $_SESSION['message'] = [
                'content' => 'Invalid email or password.',
                'type' => 'danger'
            ];

            redirect(url('/user/login'));


        }

    }

    public function logout()
    {
        if(!$this->checkLogin('user')) {
            redirect(url('/user/login'));
        }
        unset($_SESSION['user']);

        redirect(url());

    }

    public function edit()
    {
        if(!$this->checkLogin('user')) {
            redirect(url('/user/login'));
        }

        $user = current_user('user');

        view('front/user/edit', compact('user'));

    }

    public function update()
    {

        if(!$this->checkLogin('user')) {
            redirect(url('/user/login'));
        }

        extract($_POST);

        $user = new User;
        $user->load($_SESSION['user']);
        $user->name = $name;
        $user->phone = $phone;
        $user->address = $address;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        $_SESSION['message'] = [
            'content' => 'Profile updated.',
            'type' => 'success'
        ];

        redirect(url('/user'));
    }

    public function password()
    {
        if(!$this->checkLogin('user')) {
            redirect(url('/user/login'));
        }


        view('front/user/password');

    }

    public function updatePassword()
    {
        if(!$this->checkLogin('user')) {
            redirect(url('/user/login'));
        }
        extract($_POST);

        $user = current_user('user');
        $old_password = sha1($old_password);
        $password = sha1($password);

        if($old_password != $user->password) {
            $_SESSION['message'] = [
                'content' => 'Old password is incorrect.',
                'type' => 'danger'
            ];

            redirect(url('/user/password'));
            die;
        }

        $user->password = $password;
        $user->save();

        $_SESSION['message'] = [
            'content' => 'Password changed.',
            'type' => 'success'
        ];

        redirect(url('/user'));
    }


}