

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
        <div class="row">
            <div class="input-group  w-90 col-sm-auto w-sm-auto  rounded-pill p-3 p-sm-0 ms-3 ">

                <select wire:model.live.500ms="timeDuration" id="time_duration"
                    class="form-select  rounded-pill p-1 ps-3  px-sm-3 m-1 small-control">
                    <option value="" disabled>Select Duration...</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="this_week">This Week</option>
                    <option value="last_week">Last Week</option>
                    <option value="this_month">This Month</option>
                    <option value="last_month">Last Month</option>
                    <option value="this_year">This Year</option>
                    <option value="last_year">Last Year</option>
                    
                </select>
            </div>

            
        </div>
     <?php $__env->endSlot(); ?>


    
    <?php echo e($body?? ''); ?>



    







    

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









































<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Dashboard/Resources/views/dashboard-manager.blade.php ENDPATH**/ ?>