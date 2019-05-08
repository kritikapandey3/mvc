<?php
view('back/includes/header');
view('back/includes/nav');
view('back/includes/messages');
?>
<div class="row">
    <div class="col-12 bg-white">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Edit Booking</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="<?php echo url('/bookings/update/'.$booking->id); ?>" method="post">
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" name="qty" id="qty" class="form-control" value="<?php echo $booking->qty; ?>" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="text" name="start_date" id="start_date" class="form-control" value="<?php echo $booking->start_date; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="text" name="end_date" id="end_date" class="form-control" value="<?php echo $booking->end_date; ?>">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" class="form-control" rows="2"><?php echo $booking->remarks; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="processing" <?php echo $booking->status == 'processing' ? 'selected' : ''; ?>>Processing</option>
                            <option value="confirmed" <?php echo $booking->status == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="completed" <?php echo $booking->status == 'completed' ? 'selected' : ''; ?>>Completed</option>
                            <option value="cancelled" <?php echo $booking->status == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
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

