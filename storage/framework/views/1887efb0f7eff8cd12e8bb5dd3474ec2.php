    <?php if (isset($component)) { $__componentOriginal40a9b96c49748db8b9b9b0764d890f6c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40a9b96c49748db8b9b9b0764d890f6c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'dashboard.views::components.layouts.dashboards.default-dashboard','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.views::layouts.dashboards.default-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <!--[if BLOCK]><![endif]--><?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'admin|super_admin')): ?>
         <?php $__env->slot('mainTitle', null, []); ?>  <strong class="text-info text-gradient"><?php echo e($selectedScope?->name); ?></strong> Access Control <?php $__env->endSlot(); ?>
             <?php $__env->slot('subtitle', null, []); ?>  <?php echo e($selectedModuleName? ucfirst($selectedModuleName. " Module"): ''); ?> <?php $__env->endSlot(); ?>
             <?php $__env->slot('controls', null, []); ?> 
                <?php echo $__env->make("access.views::access-controls.module-selector", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php $__env->endSlot(); ?>

            <!--[if BLOCK]><![endif]--><?php if($showResourceControlButtonGroup): ?>
                <div class="row g-5">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->resourceNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $resourceName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $preparedResourceName = str_replace('_', ' ',Str::snake($resourceName));
                            $title = ucwords($preparedResourceName) . " Management";
                            $subtitle = "<div class='text-xs mt-2'> What <strong class='text-dark'>".$selectedScope?->name."</strong> can do on <strong class='text-dark'>". ucfirst($preparedResourceName) . " records?</strong></div>";
                        ?>


                        <div class="col-12 col-sm-6">
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('widgets.buttons.toggle-button-group', ['title' => $title,'subtitle' => $subtitle,'componentId' => $resourceName.'-'.$key,'buttons' => $resourceControlButtonGroup[$resourceName]?? [],'groupId' => $resourceName,'stateSyncMethod' => 'method','data' => [
                                    'selectedScope' => $this->selectedScope,
                                    'selectedScopeId' => $this->selectedScopeId,
                                    'resourceName' => $resourceName,
                                    'controlsCSSClasses' => $controlsCSSClasses,
                                ]]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2036181511-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
         <?php endif; ?><!--[if ENDBLOCK]><![endif]--> 
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40a9b96c49748db8b9b9b0764d890f6c)): ?>
<?php $attributes = $__attributesOriginal40a9b96c49748db8b9b9b0764d890f6c; ?>
<?php unset($__attributesOriginal40a9b96c49748db8b9b9b0764d890f6c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40a9b96c49748db8b9b9b0764d890f6c)): ?>
<?php $component = $__componentOriginal40a9b96c49748db8b9b9b0764d890f6c; ?>
<?php unset($__componentOriginal40a9b96c49748db8b9b9b0764d890f6c); ?>
<?php endif; ?>
<?php /**PATH /Users/mac/LaravelProjects/suites.quickerfaster.com/app/Modules/Access/Resources/views/access-controls/access-control-manager.blade.php ENDPATH**/ ?>