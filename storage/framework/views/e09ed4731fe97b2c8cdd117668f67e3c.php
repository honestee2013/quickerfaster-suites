

<div class="bg-gray-100 rounded rounded-3 px-4 pb-4 pt-3">
    <div class="d-flex justify-content-between p-3">
        <div>
            <h6 class="mb-0"><?php echo e($mainTitle ?? ''); ?></h6>
            <span class="text-primary text-xs fst-italic mt-0">
                <?php echo e($subtitle ?? ''); ?>

            </span>
        </div>
        <div>
            <?php echo e($controls ?? ''); ?>

        </div>
    </div>

    <hr class=" mb-4" style="height: 0.01em" />

    <?php echo e($slot); ?>



    <?php echo $__env->make('core.views::widgets.spinner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Dashboard/Resources/views/components/layouts/dashboards/default-dashboard.blade.php ENDPATH**/ ?>