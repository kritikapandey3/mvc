<?php
namespace App\Controllers;


use App\Models\Package;
use App\Models\Review;
use System\Core\BaseController;
use System\DB\Database;

class PackageController extends BaseController
{
    public function __call($name, $arguments)
    {
        $this->show($name);
    }

    public function index()
    {
        header('HTTP/1.1 404 Not Found');
    }

    public function show($id)
    {
        $package = new Package;
        $package->load($id);

        $reviews = $package->related(Review::class, 'package_id', 'child')->get();

        $db = new Database;
        $result = $db->query("SELECT AVG(rating) as average FROM reviews WHERE package_id = '{$package->id}'");

        $rating = $db->fetch_assoc($result)[0]['average'];


        view('front/package/show', compact('package', 'reviews', 'rating'));
    }

}