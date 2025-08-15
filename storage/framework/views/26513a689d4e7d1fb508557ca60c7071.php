
<div class="card" style="width:100%" wire:key="component-<?php echo e($componentId); ?>">

    <div class="card-header pb-0 px-3">
        <div class="row d-flex justify-content-between ps-3 pe-5 px-md-4" id="">
            <a class="col-11" data-bs-toggle="collapse" href="#component-<?php echo e($componentId); ?>" role="button" aria-expanded="false"
                aria-controls="collapseExample">

                <?php echo $__env->make('core.views::widgets.buttons.title-icon', [
                    'title' => $title,
                    'subtitle' => $subtitle,
                    'description' => $description,
                    'icon' => $icon,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </a>
            <div class="col-1 pe-3">
                <div class="form-check form-switch">
                    <div wire:key="parent-toggle-<?php echo e($componentId); ?>-<?php echo e($parentState); ?>">
                        <input
                        type="checkbox"
                        class="my-3 form-check-input checkbox-animated
                        bg-<?php echo e($parentState === 'on' ? $onStateColor : ($parentState === 'off' ? $offStateColor : $mixedStateColor)); ?>

                        border-<?php echo e($parentState === 'on' ? $onStateColor : ($parentState === 'off' ? $offStateColor : $mixedStateColor)); ?>"
                        wire:click="toggleAll"
                        <?php if($parentState === 'on' || $parentState === 'mixed'): echo 'checked'; endif; ?>
                        id="parent-toggle"
                    />
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body pt-4 p-2 p-md-4 pt-md-4 mb-2 ">
        <div class="collapse" id="component-<?php echo e($componentId); ?>" wire:ignore>

            <!-- Child Toggle Buttons -->
            <ul class="list-group pt-1" id="Resource">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $buttons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li
                  class="list-group-item border-0 rounded rounded-3  bg-gray-100  m-2 p-0"
                >
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('widgets.buttons.toggle-button', ['isCard' => true,'title' => $button['title']?? '','subtitle' => $button['subtitle']?? '','icon' => $button['icon']?? '','iconBg' => $button['iconBg']?? '','iconColor' => $button['iconColor']?? '','hasCorners' => false,'wire:loading.attr' => 'disabled','isOn' => $button['state']?? '','componentId' => $button['componentId']?? '','model' => $button['model']?? '','column' => $button['column']?? '','recordId' => $button['recordId']?? '','onStateValue' => $button['onStateValue']?? '','offStateValue' => $button['offStateValue']?? '','stateSyncMethod' => $stateSyncMethod?? $button['stateSyncMethod']?? '' ,'method' => $method?? $button['method']?? '' ,'data' => $data]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4244358205-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>
    </div>


    

</div>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Core/Resources/views/widgets/buttons/toggle-button-group.blade.php ENDPATH**/ ?>