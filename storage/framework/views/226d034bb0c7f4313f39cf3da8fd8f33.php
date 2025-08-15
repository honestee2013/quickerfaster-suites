

<div style="max-width: 70em; margin: auto;">
<?php if (isset($component)) { $__componentOriginal9fa874803dff5031ac9f1f28abcbb039 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9fa874803dff5031ac9f1f28abcbb039 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
     <?php $__env->slot('pageHeader', null, []); ?> 
        <?php echo $__env->make('core.views::components.layouts.navbars.auth.content-header', [ "pageTitile" => "System Modules"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php $__env->endSlot(); ?>

    <div class="row g-5 p-5 ">
        <?php echo $__env->make('core.views::module-menu-icon', [
            'icon' => 'fas fa-users',
            'title' => 'Human Resource',
            'url' => '/hr/dashboard',
            ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <?php echo $__env->make('core.views::module-menu-icon', [
            'icon' => 'fas fa-key',
            'title' => 'Access Control',
            'url' => '/access/dashboard',
            ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <?php echo $__env->make('core.views::module-menu-icon', [
            'icon' => 'fas fa-user-cog',
            'title' => 'User Management',
            'url' => '/user/dashboard',
            ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




        <?php echo $__env->make('core.views::module-menu-icon', [
            'icon' => 'fas fa-city',
            'title' => 'Enterprise Info',
            'url' => '/enterprise/dashboard',
            ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <?php echo $__env->make('core.views::module-menu-icon', [
            'icon' => 'fas fa-history',
            'title' => 'Activity Logs',
            'url' => '/log/dashboard',
            ]
        , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





    </div>

     <?php $__env->slot('pageFooter', null, []); ?> 
        <?php echo $__env->make('core.views::components.layouts.navbars.auth.content-footer', [ ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9fa874803dff5031ac9f1f28abcbb039)): ?>
<?php $attributes = $__attributesOriginal9fa874803dff5031ac9f1f28abcbb039; ?>
<?php unset($__attributesOriginal9fa874803dff5031ac9f1f28abcbb039); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9fa874803dff5031ac9f1f28abcbb039)): ?>
<?php $component = $__componentOriginal9fa874803dff5031ac9f1f28abcbb039; ?>
<?php unset($__componentOriginal9fa874803dff5031ac9f1f28abcbb039); ?>
<?php endif; ?>

</div>





<?php /**PATH /Users/mac/LaravelProjects/suites.quickerfaster.com/app/Modules/Core/Resources/views/modules.blade.php ENDPATH**/ ?>