<?php

namespace App\Controllers;


use App\Models\Category;
use App\Models\District;
use App\Models\Package;
use System\Core\BaseController;

class LocationController extends BaseController
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
        $district = new District;
        $district->load($id);

        $packages = $district->related(Package::class, 'district_id','child')->get();

        view('front/location/show', compact('district','packages'));
    }

}