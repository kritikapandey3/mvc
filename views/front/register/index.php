<?php
view('front/includes/header');
view('front/includes/nav');
view('front/includes/messages');
?>

    <div class="row">
    <div class="col-12 py-3 bg-white">
    <div class="row">
        <div class="col-md-5 col-sm-6 mx-auto">
            <div class="row">
                <div class="col-12">
                    <h4>Register</h4>
                </div>
                <div class="col-12">
                    <form action="<?php echo url('/register/store'); ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php view('front/includes/footer'); ?>