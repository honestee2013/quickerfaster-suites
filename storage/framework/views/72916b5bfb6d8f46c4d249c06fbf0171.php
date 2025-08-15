

<div class="row">
<!--[if BLOCK]><![endif]--><?php if($icon): ?>
    <div class="col-auto my-2">
        <div class="icon icon-shape bg-gradient-<?php echo e($iconBg?? ''); ?> shadow text-center border-radius-md">
            <i class="<?php echo e($icon); ?> text-<?php echo e($iconColor?? 'primary'); ?>" aria-hidden="true"></i>
        </div>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<div class="col my-2">
    <!--[if BLOCK]><![endif]--><?php if($title): ?>
        <h6 class="font-weight-bolder mb-0">
            <?php echo e($title); ?>

        </h6>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><?php if($subtitle): ?>
        <p class="text-sm mb-0  font-weight-bold">
            <?php echo $subtitle; ?>

        </p>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><?php if($description): ?>
            <p class="text-sm mb-0 text-capitalize font-weight-bold text-primary">
                <?php echo $description; ?>

            </p>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
</div>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Core/Resources/views/widgets/buttons/title-icon.blade.php ENDPATH**/ ?>