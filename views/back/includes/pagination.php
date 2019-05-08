<?php extract($pagination); ?>
<?php if($pages > 1): ?>
    <div class="row">
        <div class="col-12">

            <nav>
                <ul class="pagination">
                    <?php if($pageno == 1): ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo url($url.'?page='.($pageno - 1)); ?>">Previous</a>
                        </li>
                    <?php endif; ?>

                    <?php for($i = 1; $i <= $pages; $i++): ?>
                        <?php if($i == $pageno): ?>
                            <li class="page-item active"> <a class="page-link" href="#"><?php echo $i; ?></a>
                            </li>
                        <?php else: ?>
                            <li class="page-item"> <a class="page-link" href="<?php echo url($url.'?page='.$i); ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($pageno == $pages): ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo url($url.'?page='.($pageno + 1)); ?>">Next</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
<?php endif; ?>