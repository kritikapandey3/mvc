<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>Users</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($users)): ?>
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
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $user->name; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->phone; ?></td>
                                    <td><?php echo $user->address; ?></td>
                                    <td><?php echo $user->created_at; ?></td>
                                    <td><?php echo $user->updated_at; ?></td>
                                    <td>
                                        <a href="<?php echo url('/users/edit/'.$user->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo url('/users/delete/'.$user->id) ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h6 class="text-center"><em>No user added.</em></h6>
                    <?php endif; ?>
                </div>
            </div>
            <?php view('back/includes/pagination', ['pagination' => $pagination, 'url' => '/users']); ?>
        </div>
    </div>
<?php view('back/includes/footer'); ?>