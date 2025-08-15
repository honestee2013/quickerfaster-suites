


<div id="sidebar" class="sidebar border-0 border-radius-xl my-3 fixed-start ms-3 ">

  <ul class="navbar-nav">
    <?php if (isset($component)) { $__componentOriginal8fac00e11530fa9a61a35854928080fa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8fac00e11530fa9a61a35854928080fa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.auth.sidebar-header','data' => ['moduleName' => ''.e($moduleName).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.auth.sidebar-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['moduleName' => ''.e($moduleName).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8fac00e11530fa9a61a35854928080fa)): ?>
<?php $attributes = $__attributesOriginal8fac00e11530fa9a61a35854928080fa; ?>
<?php unset($__attributesOriginal8fac00e11530fa9a61a35854928080fa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8fac00e11530fa9a61a35854928080fa)): ?>
<?php $component = $__componentOriginal8fac00e11530fa9a61a35854928080fa; ?>
<?php unset($__componentOriginal8fac00e11530fa9a61a35854928080fa); ?>
<?php endif; ?>
        <?php echo e($slot); ?>

    <?php if (isset($component)) { $__componentOriginal53066b40ad93ec54c6e6b9fc765bb830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53066b40ad93ec54c6e6b9fc765bb830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.auth.sidebar-footer','data' => ['moduleName' => ''.e($moduleName).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.auth.sidebar-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['moduleName' => ''.e($moduleName).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53066b40ad93ec54c6e6b9fc765bb830)): ?>
<?php $attributes = $__attributesOriginal53066b40ad93ec54c6e6b9fc765bb830; ?>
<?php unset($__attributesOriginal53066b40ad93ec54c6e6b9fc765bb830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53066b40ad93ec54c6e6b9fc765bb830)): ?>
<?php $component = $__componentOriginal53066b40ad93ec54c6e6b9fc765bb830; ?>
<?php unset($__componentOriginal53066b40ad93ec54c6e6b9fc765bb830); ?>
<?php endif; ?>
  </ul>
</div>








<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package2/app/Modules/Core/Resources/views/components/layouts/navbars/auth/sidebar.blade.php ENDPATH**/ ?>