<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>States</h1>
                </div>
                <div class="col-auto mt-2">
                    <a href="<?php echo url('/states/create'); ?>" class="btn btn-primary">Add State</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($states)): ?>
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
                            <?php foreach ($states as $state): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $state->name; ?></td>
                                    <td><?php echo $state->created_at; ?></td>
                                    <td><?php echo $state->updated_at; ?></td>
                                    <td>
                                        <a href="<?php echo url('/states/edit/'.$state->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo url('/states/delete/'.$state->id) ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h6 class="text-center"><em>No state added.</em></h6>
                    <?php endif; ?>
                </div>
            </div>
            <?php view('back/includes/pagination', ['pagination' => $pagination, 'url' => '/states']); ?>
        </div>
    </div>
<?php view('back/includes/footer'); ?>