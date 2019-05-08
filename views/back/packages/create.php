<?php

view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
    <div class="row">
        <div class="col-12 bg-white">
            <div class="row">
                <div class="col-6 mx-auto">
                    <h1>Add Packages</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mx-auto">
                    <form action="<?php echo url('/packages/store');?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file" accept="image/* " >
                        </div>
                        <div class="form-group">
                            <label for="name">Price</label>
                            <input type="text" name="price" id="price" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for ="district_id">District </label>
                            <select name = "district_id" id="district_id" class="form-control" required>
                                <?php foreach ($districts as $district):?>
                                    <option value="<?php echo $district->id; ?>"><?php echo $district->name; ?>

                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for ="category_id">Category </label>
                            <select name = "category_id" id="category_id" class="form-control" required >
                                <?php foreach ($categories as $category):?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?>

                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <textarea name="address" id="address" rows="5" class="form-control" required></textarea>
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