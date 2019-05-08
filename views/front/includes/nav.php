<div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12">
        <a class="navbar-brand" href="<?php echo url()?>">Booking System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                $category = new \App\Models\Category;
                $categories = $category->select('id, name')->get();
                ?>
                <?php foreach ($categories as $category): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo  url('/category/'.$category->id); ?>"> <?php echo $category->name; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul class="navbar-nav">
                <?php if(login_check('user')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo current_user('user')->name; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo url('/user'); ?>">View Profile</a>
                            <a class="dropdown-item" href="<?php echo url('/user/edit'); ?>">Edit Profile</a>
                            <a class="dropdown-item" href="<?php echo url('/user/password'); ?>">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo url('/user/logout'); ?>">Logout</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="<?php echo url('/register')?>" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo url('/user/login'); ?>" class="nav-link">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>