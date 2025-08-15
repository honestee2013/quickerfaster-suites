

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
        
        <div class="col-12 col-sm-3">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.cards.icon-card', ['recordModel' => 'App\Models\User','recordName' => 'Total Users','showRecordNameOnly' => 'true','column' => 'id','groupBy' => 'id','aggregationMethod' => 'count','timeDuration' => $timeDuration,'iconCSSClass' => 'fas fa-users text-lg opacity-10']);

$__html = app('livewire')->mount($__name, $__params, 'icon-card-total-users', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
        <div class="col-12 col-sm-3">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.cards.icon-card', ['recordModel' => 'App\Models\User','recordName' => 'Active Users','filters' => [
                    ['user_status_id', '=', App\Modules\User\Models\UserStatus::getIdByName('active')]
                ],'showRecordNameOnly' => 'true','column' => 'id','groupBy' => 'id','aggregationMethod' => 'count','timeDuration' => $timeDuration,'iconCSSClass' => 'fas fa-user-check text-lg opacity-10']);

$__html = app('livewire')->mount($__name, $__params, 'icon-card-active-users', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <div class="col-12 col-sm-3">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.cards.icon-card', ['recordModel' => 'App\Models\User','recordName' => 'New Registered','showRecordNameOnly' => 'true','column' => 'id','groupBy' => 'id','aggregationMethod' => 'count','timeDuration' => $timeDuration,'iconCSSClass' => 'fas fa-user-plus text-lg opacity-10']);

$__html = app('livewire')->mount($__name, $__params, 'icon-card-recent-users', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <div class="col-12 col-sm-3">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.cards.icon-card', ['recordModel' => 'App\Models\User','recordName' => 'Incomplete Profiles','filters' => [
                    ['user_status_id', '=', App\Modules\User\Models\UserStatus::getIdByName('awaiting_profile_completion')]
                ],'showRecordNameOnly' => 'true','column' => 'id','groupBy' => 'id','aggregationMethod' => 'count','timeDuration' => $timeDuration,'iconCSSClass' => 'fas fa-user-edit text-lg opacity-10']);

$__html = app('livewire')->mount($__name, $__params, 'icon-card-incomplete', $__slots ?? [], get_defined_vars());

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

        <div class="col-12 col-sm-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.visualisation.widgets.charts.chart', ['recordModel' => 'App\Modules\user\Models\BasicInfo','chartType' => 'pie','recordName' => 'Users','title' => 'Users by Gender','showRecordNameOnly' => 'true','column' => 'id','groupBy' => 'gender','aggregationMethod' => 'count','timeDuration' => $timeDuration,'canvasHeight' => '100','showSum' => false,'showCount' => false,'showAve' => false,'showMax' => false,'showMin' => false]);

$__html = app('livewire')->mount($__name, $__params, 'chart-user-by-gender', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <div class="col-12 col-sm-8">
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
[$__name, $__params] = $__split('data-tables.data-table-manager', ['model' => 'App\Models\User','pageTitle' => 'Users Overview','queryFilters' => [
                ],'hiddenFields' => [
                    'onTable' => 
                    [
                        0 => 'password',
                        1 => 'remember_token',
                        2 => 'email_verified_at',
                        3 => 'password_confirmation',
                    ],
                    'onNewForm' => 
                    [
                        0 => 'email_verified_at',
                        1 => 'remember_token',
                    ],
                    'onEditForm' => 
                    [
                        0 => 'email_verified_at',
                        1 => 'remember_token',
                    ],
                    'onQuery' => 
                    [
                        1 => 'remember_token',
                        2 => 'password_confirmation',
                    ],
                    ]]);

$__html = app('livewire')->mount($__name, $__params, 'lw-421556311-0', $__slots ?? [], get_defined_vars());

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









































<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/User/Resources/views/dashboard-manager.blade.php ENDPATH**/ ?>