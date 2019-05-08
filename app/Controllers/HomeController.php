<?php


namespace App\Controllers;


use App\Models\Package;
use System\Core\BaseController;

class HomeController extends  BaseController
{
    public function index()
    {
        $package = new Package;
        $packages = $package->order('created_at', 'DESC')->limit(8)->get();

        view('front/home/index', compact('packages'));
    }

}