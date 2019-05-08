<?php

namespace App\Controllers;

use App\Models\State;
use App\Models\Package;
use App\Models\District;
use App\Models\Category;
use System\Core\BaseController;

class PackagesController extends BaseController
{
    public function index()
    {
        $data = $this->paginate(new Package, 10, 'packages');

        view('back/packages/index', $data);
    }

    public function create()
    {

        $district = new District;

        $districts = $district->select('id,name')->get();

//        view('back/packages/create', compact('districts'));


        $category = new Category;

        $categories = $category->select('id,name')->get();

        view('back/packages/create', compact('districts','categories'));


    }

    public function store()
    {
        extract($_POST);

        $package = new Package;
        $package->name = $name;
        $package->description = $description;
        $package->price = $price;
        $package->district_id = $district_id;
        $package->category_id = $category_id;
        $package->address = $address;
        $package->created_at = date('Y-m-d H:i:s');
        $package->updated_at = date('Y-m-d H:i:s');

        if(isset($_FILES['image']) && $_FILES['image']['error']==0) {
            $image = $_FILES['image'];
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $filename = 'img_'.date('smHYid').'_'.rand(1000,9999).'.'.$ext;

            move_uploaded_file($image['tmp_name'],'assets/images/'.$filename);
            $package->image = $filename;

        }

        $package->save();

        $_SESSION['message'] = [
            'content'=> 'Package Added. ',
            'type' =>'success'
        ];

        redirect(url('/packages'));
    }

    public function edit($id)
    {
        $district = new District;
        $districts = $district->select('id,name')->get();

        $category = new Category;
        $categories = $category->select('id,name')->get();

        $package = new Package;
        $package->load($id);

        view('back/packages/edit', compact('districts','categories', 'package'));


    }

    public function update($id)
    {
        extract($_POST);

        $package = new Package;
        $package->load($id);
        $package->name = $name;
        $package->description = $description;
        $package->price = $price;
        $package->district_id = $district_id;
        $package->category_id = $category_id;
        $package->address = $address;
        // $package->created_at = date('Y-m-d H:i:s');
        $package->updated_at = date('Y-m-d H:i:s');

        if(isset($_FILES['image']) && $_FILES['image']['error']==0) {
            $image = $_FILES['image'];
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $filename = 'img_'.date('smHYid').'_'.rand(1000,9999).'.'.$ext;

            move_uploaded_file($image['tmp_name'],'assets/images/'.$filename);


            if(!empty($package->image)){
                @unlink('assets/images/'.$package->image);
            }
            $package->image = $filename;

        }

        $package->save();

        $_SESSION['message'] = [
            'content'=> 'Package updated. ',
            'type' =>'success'
        ];

        redirect(url('/packages'));

    }

    public function delete($id)
    {
        $package = new Package;
        $package->load($id);

        if(!empty($package->image)) {
            @unlink('assets/images/'.$package->image);
        }

        $package->delete();

        $_SESSION['message'] = [
            'content' => 'Package removed.',
            'type' => 'success'
        ];

        redirect(url('/packages'));
    }

}