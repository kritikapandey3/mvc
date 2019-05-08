<?php
view('front/includes/header');
view('front/includes/nav');
view('front/includes/messages');
?>

    <div class="row">
    <div class="col-12 py-3 bg-white">
        <div class="row">
            <div class="col-md-5 col-sm-6  mx-auto">
                <div class="row">
                    <div class="col-12">
                        <h4>Change Password</h4>
                    </div>
                    <div class="col-12">
                        <form action="<?php echo url('/user/updatePassword'); ?>" method="post">
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" name="old_password" id="old_password" class="form-control" required>
                                <div class="form-group">
                                    <label for="password">Password</label>
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
    </div>

<?php view('front/includes/footer'); ?>