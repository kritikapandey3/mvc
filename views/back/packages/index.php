<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
<div class="row">
    <div class="col-12 bg-white">
        <div class="row">
            <div class="col">
                <h1>Packages</h1>
            </div>
            <div class="col-auto mt-2">
                <a href="<?php echo url('/packages/create'); ?>" class="btn btn-primary">Add Packages</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if(!empty($packages)): ?>
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Category</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php $i = $pagination['offset'] +1; ?>
                        <?php foreach($packages as $package): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $package->name;?></td>
                                <td>
                                    <?php if(!empty($package->image)): ?>
                                        <img src="<?php echo url('/assets/images/'.$package->image) ?>" class="img-fluid small">
                                    <?php endif; ?>
                                </td>
                                <td>Rs. <?php echo number_format($package->price);?></td>
                                <td>
                                    <?php
                                    $district = $package->related(\App\Models\District::class, 'district_id', 'parent')->single();
                                    echo $district->name;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $state = $district->related(\App\Models\State::class, 'state_id', 'parent')->single();
                                    echo $state->name;
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    $category = $package->related(\App\Models\Category::class, 'category_id', 'parent')->single();
                                    echo $category->name;
                                    ?>
                                </td>
                                <td><?php echo $package->address;?></td>
                                <td><?php echo $package->created_at;?></td>
                                <td><?php echo $package->updated_at;?></td>
                                <td>
                                    <a href="<?php echo url('/packages/edit/'.$package->id) ?>" class = "btn btn-primary btn-sm">Edit</a>
                                    <a href="<?php echo url('/packages/delete/'.$package->id) ?>" class = "btn btn-danger btn-sm delete">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h6 class="text-center"><em>No packages added.</em></h6>
                <?php endif; ?>
            </div>
        </div>
        <?php view('back/includes/pagination',['pagination' => $pagination, 'url'=>'/packages']); ?>
    </div>
</div>
<?php view('back/includes/footer'); ?>




