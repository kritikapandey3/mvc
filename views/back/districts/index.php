<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col">
                    <h1>Districts</h1>
                </div>
                <div class="col-auto mt-2">
                    <a href="<?php echo url('/districts/create'); ?>" class="btn btn-primary">Add District</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if(!empty($districts)): ?>
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>State</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = $pagination['offset'] + 1; ?>
                            <?php foreach ($districts as $district): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $district->name; ?></td>
                                    <td><?php $state = $district->related(\App\Models\State::class, 'state_id', 'parent')->single(); echo $state->name; ?></td>
                                    <td><?php echo $district->created_at; ?></td>
                                    <td><?php echo $district->updated_at; ?></td>
                                    <td>
                                        <a href="<?php echo url('/districts/edit/'.$district->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo url('/districts/delete/'.$district->id) ?>" class="btn btn-danger btn-sm delete">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h6 class="text-center"><em>No district added.</em></h6>
                    <?php endif; ?>
                </div>
            </div>
            <?php view('back/includes/pagination', ['pagination' => $pagination, 'url' => '/districts']); ?>
        </div>
    </div>
<?php view('back/includes/footer'); ?>