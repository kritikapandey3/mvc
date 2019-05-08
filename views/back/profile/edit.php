<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
<div class="row">
    <div class="col-12 bg-white">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Edit Profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="<?php echo url('/profile/update');?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value=""<?php echo $user->name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $user->email; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="phone" value="<?php echo $user->phone; ?>">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" rows="2" class="form-control" required><?php echo $user->address;?></textarea>
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