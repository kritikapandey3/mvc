
<?php
view('front/includes/header');
view('front/includes/nav');
view('front/includes/messages');
?>

<div class="row">
    <div class="col-12 py-3 bg-white">
        <div class="row">
            <divv class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h3><?php echo $package->name; ?></h3>
                    </div>
                    <?php if(!empty($package->image)): ?>
                        <div class="col-12 text-center">
                            <img src="<?php echo url('/assets/images/'.$package->image); ?>" class="img-fluid border border-secondary">
                        </div>
                    <?php endif; ?>
                    <div class="col-12 my-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="home" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                            <li class="nav-item">
                                <a class="nav-link" id="booking-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="booking" aria-selected="false">Booking</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <ul>
                                    <li><strong>Name:</strong> <?php echo $package->name; ?></li>
                                    <li><strong>Price: </strong>Rs. <?php echo number_format($package->price); ?></li>

                                    <?php $category = $package->related(\App\Models\Category::class, 'category_id','parent')->single(); ?>
                                    <li><strong>Category: </strong><?php echo $category->name; ?></li>

                                    <li><strong>Address:</strong> <?php echo $package->address; ?></li>

                                    <?php $district = $package->related(\App\Models\District::class, 'district_id','parent')->single(); ?>
                                    <li><strong>District: </strong><?php echo $district->name; ?></li>

                                    <?php $state = $district->related(\App\Models\State::class, 'state_id','parent')->single(); ?>
                                    <li><strong>State: </strong><?php echo $state->name; ?></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab"><?php echo nl2br($package->description); ?></div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>Add Review</h4>
                                                </div>
                                                <div class="col-12">
                                                    <?php if(login_check('user')): ?>
                                                        <form action="<?php echo url('/review');?>" method="post">
                                                            <input type="hidden" name="package_id" value="<?php echo $package->id; ?>">
                                                            <div class="form-group">
                                                                <label for="description">Review</label>
                                                                <textarea name="description" id="description" rows="5" class="form-control" required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="rating">Rating</label>
                                                                <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1" checked /><label for="star1" title="1 star"></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success">Rate Now</button>
                                                            </div>
                                                        </form>
                                                    <?php else: ?>
                                                        <h5 class="text-center">Please login to rate this package.</h5>
                                                        <div class="col-12 text-center">
                                                            <a href="<?php echo url('/user/login'); ?>" class="btn btn-success btn-lg">Login</a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>Rating</h4>
                                                </div>
                                                <div class="col-12">
                                                    <span class="rating"><?php echo number_format($rating, '1');?></span>
                                                    <br>
                                                    <small>of <?php echo count($reviews);?> reviews.</small>
                                                </div>
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <?php if(!empty($reviews)): ?>
                                                        <?php foreach ($reviews as $review): ?>
                                                            <div class="col-12 mb-3 py-3 text-white bg-secondary">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php echo $review->description; ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <?php
                                                                    $user = $review->related(\App\Models\User::class, 'user_id', 'parent')->single();
                                                                    ?>
                                                                    <small>
                                                                        By: <strong><?php echo $user->name; ?></strong> <strong>Posted on: </strong><?php echo $review->created_at; ?> <strong>Rating: </strong><?php echo $review->rating; ?>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="booking" role="tabpanel" aria-labelledby="booking-tab">

                                <div class="col-md-5 col-sm-6 mx-auto my-3">
                                    <?php if(login_check('user')): ?>
                                        <form action="<?php echo url('/booking/'); ?>" method="post">
                                            <input type="hidden" name="package_id" value="<?php echo $package->id; ?>">
                                            <div class="form-group">
                                                <label for="qty">Quantity</label>
                                                <input type="number" name="qty" id="qty" class="form-control" min="1" value="1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="start_date">Start Date/Time</label>
                                                <input type="text" name="start_date" id="start_date" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#start_date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date">End Date/Time</label>
                                                <input type="text" name="end_date" id="end_date" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#end_date" >
                                                <small>Leave this field for single day packages.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="remarks">Remarks (if any)</label>
                                                <textarea name="remarks" id="remarks" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Book Now</button>
                                            </div>
                                        </form>
                                    <?php else: ?>
                                        <h5 class="text-center">Please login to book this package.</h5>
                                        <div class="col-12 text-center">
                                            <a href="<?php echo url('/user/login'); ?>" class="btn btn-success btn-lg">Login</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<?php view('front/includes/footer'); ?>

