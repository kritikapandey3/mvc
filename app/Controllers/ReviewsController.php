<?php
namespace App\Controllers;


use App\Models\Booking;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use System\Core\BaseController;

class ReviewsController extends BaseController
{
    public function index()
    {
        $data = $this->paginate(new Review, 10, 'reviews');

        view('back/reviews/index', $data);
    }

    public function delete($id)
    {
        $booking = new Review;
        $booking->load($id);
        $booking->delete();

        $_SESSION['message'] = [
            'content' => 'Review removed.',
            'type' => 'success'
        ];

        redirect(url('/reviews'));
    }
}