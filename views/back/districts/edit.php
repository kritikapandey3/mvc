<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
<div class="row">
    <div class="col-12 bg-white">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Edit Districts</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="<?php echo url('/districts/update/'.$district->id); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $district->name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="state_id">State</label>
                        <select name="state_id" id="state_id" class="form-control" required>
                            <?php foreach ($states as $state): ?>
                                <option value="<?php echo $state->id; ?>" <?php echo $state->id == $district->state_id ? 'selected': ''; ?>><?php echo $state->name; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div
                </form>
            </div>
        </div>
    </div>
</div>