<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>Categories</h1>
                </div>
                <div class="col-auto mt-2">
                    <a href="<?php echo url('/categories/create'); ?>" class="btn btn-primary">Add Category</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($categories)): ?>
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = $pagination['offset'] + 1; ?>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $category->name; ?></td>
                                    <td><?php echo $category->created_at; ?></td>
                                    <td><?php echo $category->updated_at; ?></td>
                                    <td>

                                        <a href="<?php echo url('/categories/edit/'.$category->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo url('/categories/delete/'.$category->id) ?>" class="btn btn-danger btn-sm delete">Delete</a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h6 class="text-center"><em>No category added.</em></h6>
                    <?php endif; ?>
                </div>
            </div>
            <?php view('back/includes/pagination', ['pagination' => $pagination, 'url' => '/categories']); ?>
        </div>
    </div>
<?php view('back/includes/footer'); ?>