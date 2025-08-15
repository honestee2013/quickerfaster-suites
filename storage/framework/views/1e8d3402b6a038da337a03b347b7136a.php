<div class="mt-3 ms-3 me-4 d-flex justify-content-between align-items-center">
    <div>
        <p class="text-sm text-secondary">
            Showing <?php echo e($data->firstItem()); ?> to <?php echo e($data->lastItem()); ?> of <?php echo e($data->total()); ?>

            results
        </p>
    </div>
    <div>
        <?php echo $data->links('pagination'); ?>


    </div>
</div>


<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Core/Resources/views/data-tables/partials/table-footer.blade.php ENDPATH**/ ?>