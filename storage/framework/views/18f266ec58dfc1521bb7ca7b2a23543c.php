

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

    
   

    
    <div class="row g-4 mb-4">
        
        <div class="col-12 col-sm-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.cards.icon-card', ['recordModel' => 'App\Modules\Access\Models\Role','recordName' => 'Total Available Roles','showRecordNameOnly' => 'true','column' => 'id','groupBy' => 'id','aggregationMethod' => 'count','timeDuration' => $timeDuration,'iconCSSClass' => 'fas fa-users text-lg opacity-10']);

$__html = app('livewire')->mount($__name, $__params, 'icon-card-total-users', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
        <div class="col-12 col-sm-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.cards.icon-card', ['recordModel' => 'App\Models\User','recordName' => 'Roles without Permissions','pivotTable' => 'model_has_roles','pivotModelColumn' => 'model_id','pivotModelType' => 'App\\Models\\User','pivotRelatedColumn' => 'role_id','pivotRelatedColumnIn' => App\Modules\Access\Models\Role::doesntHave('permissions')->pluck('id')->toArray(),'column' => 'id','groupBy' => 'id','aggregationMethod' => 'count','showRecordNameOnly' => 'true','iconCSSClass' => 'fas fa-user-lock text-lg opacity-10','timeDuration' => $timeDuration]);

$__html = app('livewire')->mount($__name, $__params, 'icon-card-roles-no-permission', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
        

        <div class="col-12 col-sm-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.cards.icon-card', ['recordModel' => 'App\Modules\Access\Models\Role','recordName' => 'Newly Created Roles','showRecordNameOnly' => 'true','column' => 'id','groupBy' => 'id','aggregationMethod' => 'count','timeDuration' => $timeDuration,'iconCSSClass' => 'fas fa-user-plus text-lg opacity-10']);

$__html = app('livewire')->mount($__name, $__params, 'icon-card-recent-users', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>        

        
    </div>
   


    
    <div class="row g-4 mb-4">


        <div class="col-12">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.charts.chart', ['recordModel' => 'App\Models\User','chartType' => 'bar','recordName' => 'Users','title' => 'Users by Roles','showRecordNameOnly' => 'true','column' => 'name','aggregationMethod' => 'count','timeDuration' => $timeDuration,'canvasHeight' => '125','controls' => ['chartType'],'pivotTable' => 'model_has_roles','pivotModelColumn' => 'model_id','pivotRelatedColumn' => 'role_id','pivotModelType' => 'App\Models\User','groupByTable' => 'roles','groupByTableColumn' => 'name']);

$__html = app('livewire')->mount($__name, $__params, 'chart-user-by-role', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
        
    </div>


    
    <div class="row g-4 mb-4">

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('data-tables.data-table-manager', ['model' => 'App\Modules\Access\Models\Role','pageTitle' => 'User Role Overview','queryFilters' => '[]','hiddenFields' => [
                   
                ]]);

$__html = app('livewire')->mount($__name, $__params, 'lw-287508287-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>






    

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









































<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Access/Resources/views/dashboard-manager.blade.php ENDPATH**/ ?>