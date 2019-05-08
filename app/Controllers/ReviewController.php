<?php

namespace App\Controllers;


use App\Models\Booking;
use App\Models\Package;
use App\Models\Review;
use System\Core\BaseController;

class ReviewController extends BaseController
{
    public function index()
    {
        extract($_POST);

        $review = new Review;
        $review->user_id = $_SESSION['user'];
        $review->package_id = $package_id;
        $review->description = $description;
        $review->rating = $rating;
        $review->created_at = date('Y-m-d H:i:s');
        $review->updated_at = date('Y-m-d H:i:s');
        $review->save();

        $_SESSION['message'] = [
            'content' => 'Your rating has been added.',
            'type' => 'success'
        ];

        redirect(url('/user'));

    }

    public function edit($id)
    {
        $review = new Review;
        $review->load($id);

        view('front/review/edit', compact( 'review'));
    }

    public function update($id)
    {
        extract($_POST);

        $review = new Review;
        $review->load($id);
        $review->description = $description;
        $review->rating = $rating;
        $review->updated_at = date('Y-m-d H:i:s');
        $review->save();

        $_SESSION['message'] = [
            'content' => 'Your review has been updated.',
            'type' => 'success'
        ];

        redirect(url('/user'));
    }

    public function delete($id)
    {
        $review = new Review;
        $review->load($id);
        $review->delete();

        $_SESSION['message'] = [
            'content' => 'Your review has been removed.',
            'type' => 'success'
        ];

        redirect(url('/user'));
    }



}