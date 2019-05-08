<?php

namespace App\Controllers;


use App\Models\Booking;
use App\Models\Package;
use System\Core\BaseController;

class BookingController extends BaseController
{
    public function index()
    {
        extract($_POST);

        $total = 0;
        $package = new Package;
        $package->load($package_id);

        if(empty($end_date)) {
            $total = $qty * $package->price;
        }
        else {
            $no_of_days = date_diff(new \DateTime($start_date), new \DateTime($end_date), true);
            $total = $qty * $package->price * $no_of_days->days;
        }

        $booking = new Booking;
        $booking->user_id = $_SESSION['user'];
        $booking->package_id = $package->id;
        $booking->price = $package->price;
        $booking->qty = $qty;
        $booking->total = $total;
        $booking->remarks = $remarks;
        $booking->status = 'processing';
        $booking->start_date = $start_date;
        if(!empty($end_date)) {
            $booking->end_date = $end_date;
        }
        $booking->created_at = date('Y-m-d H:i:s');
        $booking->updated_at = date('Y-m-d H:i:s');
        $booking->save();

        $_SESSION['message'] = [
            'content' => 'Your booking is being processed. You will be contact shortly for confirmation.',
            'type' => 'success'
        ];

        redirect(url('/user'));

    }

    public function cancel($id)
    {
        $booking = new Booking;
        $booking->load($id);

        $booking->status = 'cancelled';
        $booking->updated_at = date('Y-m-d H:i:s');
        $booking->save();

        $_SESSION['message'] = [
            'content' => 'Your booking is cancelled',
            'type' => 'success'
        ];

        redirect(url('/user'));

    }

}