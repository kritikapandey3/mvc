<?php
view('front/includes/header');
view('front/includes/nav');
view('front/includes/messages');
?>

    <div class="row">
        <div class="col-12 py-3 bg-white">
            <div class="row">
                <div class="col-12">
                    <h3><?php echo $user->name; ?></h3>
                </div>
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="home" aria-selected="true">Booking History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="profile" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active table-responsive" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                            <?php if(!empty($bookings)): ?>
                                <table class="table table-hover table-striped table-sm my-3">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($bookings as $booking): ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>
                                                <?php
                                                $package = $booking->related(\App\Models\Package::class, 'package_id', 'parent')->single();
                                                echo $package->name;
                                                ?>
                                            </td>
                                            <td>Rs. <?php echo number_format($booking->price); ?></td>
                                            <td><?php echo $booking->qty; ?></td>
                                            <td>Rs. <?php echo number_format($booking->total); ?></td>
                                            <td><?php echo $booking->remarks; ?></td>
                                            <td><?php echo $booking->status; ?></td>
                                            <td><?php echo $booking->start_date; ?></td>
                                            <td><?php echo $booking->end_date; ?></td>
                                            <td>
                                                <?php if ($booking->status != 'completed' && $booking->status != 'cancelled'): ?>
                                                    <a href="<?php echo url('/booking/cancel/'.$booking->id) ?>" class="btn btn-danger btn-sm cancel">Cancel Booking</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <h6 class="text-center"><em>No booking added.</em></h6>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade table-responsive" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <?php if(!empty($reviews)): ?>
                                <table class="table table-hover table-striped table-sm my-3">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package</th>
                                        <th>Comment</th>
                                        <th>Rating</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($reviews as $review): ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>
                                                <?php
                                                $package = $review->related(\App\Models\Package::class, 'package_id', 'parent')->single();
                                                echo $package->name;
                                                ?>
                                            </td>
                                            <td><?php echo $review->description; ?></td>
                                            <td><?php echo $review->rating; ?></td>
                                            <td>
                                                <a href="<?php echo url('/review/edit/'.$review->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="<?php echo url('/review/delete/'.$review->id) ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <h6 class="text-center"><em>No review added.</em></h6>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php view('front/includes/footer'); ?>