<?php
namespace App\Controllers;


use System\Core\BaseController;
use System\Core\View;


class DashboardController extends BaseController
{
    public function __construct()
    {
        if(!$this->checkLogin('admin')) {
            redirect(url('/login'));
        }
    }

    public function index()

    {
        new View('back/dashboard/index');

    }
}