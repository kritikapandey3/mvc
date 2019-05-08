<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
<div class="row">
    <div class="col-12 bg-white">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Change Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="<?php echo url('/password/update'); ?>" method="post">
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" name="old_password" id="old_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
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