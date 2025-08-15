<!--[if BLOCK]><![endif]--><?php if($paginator->hasPages()): ?>
<nav class="d-flex justify-content-center">
    <ul class="pagination">
        
        <!--[if BLOCK]><![endif]--><?php if($paginator->onFirstPage()): ?>
            <li class="page-item disabled">
                <a href="#" class="page-link"><i class="fa-solid fa-angle-left"></i></a>
            </li>
        <?php else: ?>
            <li class="page-item">
                <a class="page-link" wire:click.prevent="previousPage" wire:loading.attr="disabled" href="#"><i class="fa-solid fa-angle-left"></i></a>
            </li>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <!--[if BLOCK]><![endif]--><?php if(is_string($element)): ?>
                <li class="page-item disabled"><span><?php echo e($element); ?></span></li>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]--><?php if(is_array($element)): ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if($page == $paginator->currentPage()): ?>
                        <li class="page-item active">
                            <a class="page-link" href="#" wire:click.prevent="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link" href="#" wire:click.prevent="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></a>
                        </li>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        
        <!--[if BLOCK]><![endif]--><?php if($paginator->hasMorePages()): ?>
            <li class="page-item">
                <a class="page-link" wire:click.prevent="nextPage" wire:loading.attr="disabled" href="#"><i class="fa-solid fa-angle-right"></i></a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <a href="#" class="page-link"><i class="fa-solid fa-angle-right"></i></a>
            </li>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </ul>
</nav>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH /Users/mac/LaravelProjects/quickerfaster-suites/resources/views/pagination.blade.php ENDPATH**/ ?>