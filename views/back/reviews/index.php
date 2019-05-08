<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>Reviews</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($reviews)): ?>
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Package</th>
                                <th>Description</th>
                                <th>Rating</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = $pagination['offset'] + 1; ?>
                            <?php foreach ($reviews as $review): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <?php
                                        $user = $review->related(\App\Models\User::class, 'user_id', 'parent')->single();
                                        echo $user->name;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $package = $review->related(\App\Models\Package::class, 'package_id', 'parent')->single();
                                        echo $package->name;
                                        ?>
                                    </td>
                                    <td><?php echo $review->description; ?></td>
                                    <td><?php echo $review->rating; ?></td>
                                    <td><?php echo $review->created_at; ?></td>
                                    <td><?php echo $review->updated_at; ?></td>
                                    <td>
                                        <a href="<?php echo url('/reviews/delete/'.$review->id); ?>" class="btn btn-danger btn-sm delete">Delete</a>
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
            <?php view('back/includes/pagination', ['pagination' => $pagination, 'url' => '/reviews']); ?>
        </div>
    </div>
<?php view('back/includes/footer'); ?>