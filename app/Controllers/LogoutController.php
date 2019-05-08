<?php
namespace App\Controllers;


use System\Core\BaseController;

class LogoutController extends BaseController
{
    public function index()
    {
        unset($_SESSION['admin']);
        redirect(url('/login'));

    }

}