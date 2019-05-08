<?php if(!empty($_SESSION['message'])): ?>
    <div class="row bg-white">
        <div class="col-12 mt-3">
            <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>">
                <?php echo $_SESSION['message']['content']; ?>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>