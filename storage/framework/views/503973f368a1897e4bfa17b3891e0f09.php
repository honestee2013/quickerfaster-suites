
<div class="row g-2">
    <!--[if BLOCK]><![endif]--><?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'admin|super_admin')): ?>

        <!-- Scope Selection Dropdown -->
        <div class="input-group col-12 w-100 col-sm-auto w-sm-auto">
            <select id="scopeSelect" wire:model.live.500ms="selectedScopeId"  class="form-select rounded-pill p-1 ps-3 pe-sm-5 px-sm-4 m-0 small-control"  >
                <option value="">Select <?php echo e(strtolower($selectedScopeName)); ?>...</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $scopeNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $scopeName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($id); ?>"><?php echo e($scopeName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
        </div>

        <!-- Module Selection Dropdown (Conditional) -->
        <!--[if BLOCK]><![endif]--><?php if(!$isUrlAccess): ?>
            <div  class="input-group col-12 w-100 col-sm-auto w-sm-auto" >
                <select id="moduleSelect" wire:model.live.500ms="selectedModule" class="form-select rounded-pill p-1 ps-3 pe-sm-5 px-sm-4 m-0 small-control">
                    <option value="">Select module...</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $moduleNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moduleName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(strtolower($moduleName)); ?>"><?php echo e($moduleName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        <!-- Navigation Button -->
        <div x-data class="col-12 w-100 col-sm-auto w-sm-auto" >
            <button
                wire:click="manageAccessControl"
                :class="$wire.selectedScopeId && $wire.selectedModule? 'btn-primary': 'btn-secondary'"
                class="btn rounded-pill py-0 small-control"
                :disabled="!$wire.selectedScopeId || !$wire.selectedModule">
                OK
            </button>
        </div>

    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>



<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Access/Resources/views/access-controls/module-selector.blade.php ENDPATH**/ ?>