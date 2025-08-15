<div class="my-3">

    <div class="progress-wrapper" >
        <div class="progress-info">
            <div class="progress-percentage">
                <span class="text-sm font-weight-normal"><?php echo e($elementLabel?? ''); ?></span>
            </div>
        </div>


        <div class="rounded-pill progress" style="height: auto" >
            <div class="rounded-pill my-auto  progress-bar bg-gradient-<?php echo e($this->getProgressColor()); ?>" role="progressbar" style="width: <?php echo e($progress); ?>%; <?php echo e($progressBarCSS); ?>; "
                aria-valuenow="<?php echo e($progress); ?>" aria-valuemin="0" aria-valuemax="100">
                <span  style="<?php echo e($progressLabelCSS); ?>"> <?php echo e($progressLabel?? ''); ?> <?php echo e($showPercentage? $progress.'%': ''); ?></span>
            </div>
        </div>
    </div>


    
</div>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Dashboard/Resources/views/components/visualisation/widgets/progresses/progress-bar.blade.php ENDPATH**/ ?>