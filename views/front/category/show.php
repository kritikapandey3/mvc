<?php
view('front/includes/header');
view('front/includes/nav');

?>

    <div class="row">
        <div class="col-12 py-3 bg-white">
            <div class="row">
                <div class="col-12">
                    <h3><?php echo $category->name; ?></h3>
                </div>
                <div class="col-12">
                    <div class="row">
                        <?php if(!empty($packages)): ?>
                            <?php foreach ($packages as $package): ?>
                                <div class="col-3 mb-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php if(!empty($package->image)): ?>
                                                <div class="product-img border border-secondary" style="background-image: url('<?php echo url('/assets/images/'.$package->image); ?>');"></div>
                                            <?php else: ?>
                                                <div class="product-img border border-secondary" style="background-image: url('<?php echo url('/assets/images/image.png'); ?>');"></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 text-center">
                                            <a href="<?php echo url('/package/'.$package->id); ?>" class="package-name"><?php echo $package->name; ?></a>
                                        </div>
                                        <div class="col-12 mb-2 text-center package-price">
                                            Rs. <?php echo number_format($package->price); ?>
                                        </div>
                                        <div class="col-12 mb-2 text-center">
                                            <?php
                                            $district = $package->related(\App\Models\District::class, 'district_id','parent')->single();
                                            ?>
                                            <a href="<?php echo url('/location/'.$district->id); ?>" class="package-location"><?php echo $district->name; ?></a>
                                        </div>
                                        <div class="col-12 text-center">
                                            <a href="<?php echo url('/package/'.$package->id); ?>" class="btn btn-success">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12 text-center">
                                <h5><em>No packages found in this category.</em></h5>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <footer class="col-12 bg-dark py-4 text-white text-center">
            &copy; Booking System, <?php echo date('Y'); ?>.
        </footer>
    </div>
<?php view('front/includes/footer'); ?>