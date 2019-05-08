<?php if(!empty($_SESSION['message'])): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>">
                <?php echo $_SESSION['message']['content']; ?>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>