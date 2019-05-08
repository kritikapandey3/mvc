<div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12 mb-3">
        <a class="navbar-brand" href="<?php echo url('/dashboard');?>">Booking System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/admins'); ?>">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/categories'); ?>">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/packages'); ?>">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/states'); ?>">States</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/districts'); ?>">Districts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/users'); ?>">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/reviews'); ?>">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/bookings'); ?>">Bookings</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo current_user('admin')->name; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo url('/profile/edit'); ?>">Edit Profile</a>
                        <a class="dropdown-item" href="<?php echo url('/password/edit'); ?>">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo url('/logout'); ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
