<?php
view('back/includes/header');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-4 mt-4 mx-auto bg-white">
            <div class="row">
                <h1>Login</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="<?php echo url('/login/check'); ?>" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php view('back/includes/footer'); ?>