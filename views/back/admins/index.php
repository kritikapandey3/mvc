<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>Admins</h1>
                </div>
                <div class="col-auto mt-2">
                    <a href="<?php echo url('/admins/create'); ?>" class="btn btn-primary">Add Admin</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($admins)): ?>
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = $pagination['offset'] + 1; ?>
                            <?php foreach ($admins as $admin): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $admin->name; ?></td>
                                    <td><?php echo $admin->email; ?></td>
                                    <td><?php echo $admin->phone; ?></td>
                                    <td><?php echo $admin->address; ?></td>
                                    <td><?php echo $admin->created_at; ?></td>
                                    <td><?php echo $admin->updated_at; ?></td>
                                    <td>
                                        <?php if($_SESSION['admin'] != $admin->id) : ?>
                                            <a href="<?php echo url('/admins/edit/'.$admin->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?php echo url('/admins/delete/'.$admin->id) ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h6 class="text-center"><em>No admin added.</em></h6>
                    <?php endif; ?>
                </div>
            </div>
            <?php view('back/includes/pagination', ['pagination' => $pagination, 'url' => '/admins']); ?>
        </div>
    </div>
<?php view('back/includes/footer'); ?>