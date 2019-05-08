<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>Bookings</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($bookings)): ?>
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Package</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remarks</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = $pagination['offset'] + 1; ?>
                            <?php foreach ($bookings as $booking): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <?php
                                        $user = $booking->related(\App\Models\User::class, 'user_id', 'parent')->single();
                                        echo $user->name;
                                        ?>
                                    </td>
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
                                    <td><?php echo $booking->created_at; ?></td>
                                    <td><?php echo $booking->updated_at; ?></td>
                                    <td>
                                        <a href="<?php echo url('/bookings/edit/'.$booking->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <?php if ($booking->status != 'completed'): ?>
                                            <a href="<?php echo url('/bookings/delete/'.$booking->id) ?>" class="btn btn-danger btn-sm delete">Delete</a>
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
            </div>
            <?php view('back/includes/pagination', ['pagination' => $pagination, 'url' => '/bookings']); ?>
        </div>
    </div>
<?php view('back/includes/footer'); ?>