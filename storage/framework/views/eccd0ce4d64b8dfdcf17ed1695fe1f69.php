<div>
    <!--[if BLOCK]><![endif]--><?php if($isCard): ?>
    <!-- Card Layout -->
    <div class="<?php echo e($hasCorners? 'card': ''); ?>  w-100">
        <div class="card-body ">
            <div class="row align-items-center">

                <div class="col">
                    <?php echo $__env->make('core.views::widgets.buttons.title-icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-auto">
                    <div class="form-check form-switch mt-3" wire:key="button-toggle-<?php echo e($isOn); ?>">
                        <input
                            type="checkbox"
                            class="form-check-input  bg-<?php echo e($isOn ? $onStateColor : $offStateColor); ?> border border-bg-<?php echo e($isOn ? $onStateColor : $offStateColor); ?> "
                            wire:click="toggle"
                            wire:loading.attr="disabled"

                            <?php if($isOn): echo 'checked'; endif; ?>
                            id="toggle-<?php echo e($recordId); ?>"
                        >
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php else: ?>
    <!-- Standalone Layout -->
    <div class="d-flex flex-column align-items-center">
        <!--[if BLOCK]><![endif]--><?php if($labelPosition == 'top'): ?>
            <!--[if BLOCK]><![endif]--><?php if($showLabel): ?>
                <span class="text-<?php echo e($isOn ? $onStateColor : $offStateColor); ?> ">
                    <?php echo e($isOn ? 'On' : 'Off'); ?>

                </span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="d-flex align-items-center <?php echo e($labelPosition == 'left' || $labelPosition == 'right' ? 'justify-content-between w-100' : ''); ?>">
            <!--[if BLOCK]><![endif]--><?php if($labelPosition == 'left'): ?>
                <!--[if BLOCK]><![endif]--><?php if($showLabel): ?>
                    <span class="text-<?php echo e($isOn ? $onStateColor : $offStateColor); ?>  me-2">
                        <?php echo e($isOn ? 'On' : 'Off'); ?>

                    </span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <div class="form-check form-switch">
                <input
                    type="checkbox"
                    class="mt-3 mt-sm-0 form-check-input bg-<?php echo e($isOn ? $onStateColor : $offStateColor); ?> border border-bg-<?php echo e($isOn ? $onStateColor : $offStateColor); ?>"
                    wire:click="toggle"
                    wire:loading.attr="disabled"

                    <?php if($isOn): echo 'checked'; endif; ?>
                    id="toggle-<?php echo e($recordId); ?>"
                >
            </div>

            <!--[if BLOCK]><![endif]--><?php if($labelPosition == 'right'): ?>
                <!--[if BLOCK]><![endif]--><?php if($showLabel): ?>
                    <span class="text-<?php echo e($isOn ? $onStateColor : $offStateColor); ?>  ms-2">
                        <?php echo e($isOn ? 'On' : 'Off'); ?>

                    </span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!--[if BLOCK]><![endif]--><?php if($labelPosition == 'bottom'): ?>
            <!--[if BLOCK]><![endif]--><?php if($showLabel): ?>
                <span class="text-<?php echo e($isOn ? $onStateColor : $offStateColor); ?>  mt-2">
                    <?php echo e($isOn ? 'On' : 'Off'); ?>

                </span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->


</div>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Core/Resources/views/widgets/buttons/toggle-button.blade.php ENDPATH**/ ?>