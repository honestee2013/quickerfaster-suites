

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

    <?php
        $statusCompletedId = App\Modules\Core\Models\Status::where("name", "completed")->first()?->id ?? 0;
        $statusInProgressId = App\Modules\Core\Models\Status::where("name", "in_progress")->first()?->id ?? 0;
        $selectedProcessId = $selectedProcessId ?? 0;
        $timeDurationLabel = ucfirst(str_replace('_', ' ', $timeDuration));
    ?>



     <?php $__env->slot('mainTitle', null, []); ?> 
        <strong class="text-info text-gradient"><?php echo e($selectedProcessName?? ''); ?> </strong> Overview
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('subtitle', null, []); ?> 
        <span class="text-primary text-xs fst-italic"><?php echo e($timeDuration !== 'custom' ? ucfirst(str_replace('_', ' ', $timeDuration)) : $fromTime . ' to ' . $toTime); ?></span>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('controls', null, []); ?> 
        <?php echo $__env->make('dashboard.views::components.layouts.dashboards.dashboard-control', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php $__env->endSlot(); ?>

    




    






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









































<?php /**PATH /Users/mac/LaravelProjects/suites.quickerfaster.com/app/Modules/Hr/Resources/views/dashboard-manager.blade.php ENDPATH**/ ?>