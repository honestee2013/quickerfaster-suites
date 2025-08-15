

<div class="table-responsive p-0">
    
    <?php echo $__env->make('core.views::widgets.spinner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('core.views::data-tables.partials.table-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('core.views::data-tables.partials.table-body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('core.views::data-tables.partials.table-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>



<?php /**PATH /Users/mac/LaravelProjects/quickerfaster-suites/app/Modules/Core/Resources/views/data-tables/data-table.blade.php ENDPATH**/ ?>