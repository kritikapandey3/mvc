<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
<div class="row">
    <div class="col-12 bg-white">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Edit States</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="<?php echo url('/states/update/'.$state->id); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $state->name; ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php view('back/includes/footer'); ?>