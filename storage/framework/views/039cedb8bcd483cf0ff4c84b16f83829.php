
<?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'admin|super_admin')): ?>

    <li class="nav-item mt-4">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Security</h6>
    </li>



    <?php if (isset($component)) { $__componentOriginal08c1c82965a3da82beb5c038edb4f21f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.sidebar-link-item','data' => ['iconClasses' => 'fas fa-key sidebar-icon','url' => 'access/access-control-management/'.e($moduleName).'','title' => 'Control User Access','target' => '_blank']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.sidebar-link-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['iconClasses' => 'fas fa-key sidebar-icon','url' => 'access/access-control-management/'.e($moduleName).'','title' => 'Control User Access','target' => '_blank']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal08c1c82965a3da82beb5c038edb4f21f)): ?>
<?php $attributes = $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f; ?>
<?php unset($__attributesOriginal08c1c82965a3da82beb5c038edb4f21f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08c1c82965a3da82beb5c038edb4f21f)): ?>
<?php $component = $__componentOriginal08c1c82965a3da82beb5c038edb4f21f; ?>
<?php unset($__componentOriginal08c1c82965a3da82beb5c038edb4f21f); ?>
<?php endif; ?>
<?php endif; ?>



<li class="nav-item mt-4">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Configurations</h6>
</li>

<?php if (isset($component)) { $__componentOriginal08c1c82965a3da82beb5c038edb4f21f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.sidebar-link-item','data' => ['iconClasses' => 'fas fa-tools sidebar-icon','url' => ''.e(strtolower($moduleName)).'/setup','title' => 'Setup']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.sidebar-link-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['iconClasses' => 'fas fa-tools sidebar-icon','url' => ''.e(strtolower($moduleName)).'/setup','title' => 'Setup']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal08c1c82965a3da82beb5c038edb4f21f)): ?>
<?php $attributes = $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f; ?>
<?php unset($__attributesOriginal08c1c82965a3da82beb5c038edb4f21f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08c1c82965a3da82beb5c038edb4f21f)): ?>
<?php $component = $__componentOriginal08c1c82965a3da82beb5c038edb4f21f; ?>
<?php unset($__componentOriginal08c1c82965a3da82beb5c038edb4f21f); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal08c1c82965a3da82beb5c038edb4f21f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.sidebar-link-item','data' => ['iconClasses' => 'fas fa-wrench sidebar-icon','url' => ''.e(strtolower($moduleName)).'/settings','title' => 'Settings']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.sidebar-link-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['iconClasses' => 'fas fa-wrench sidebar-icon','url' => ''.e(strtolower($moduleName)).'/settings','title' => 'Settings']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal08c1c82965a3da82beb5c038edb4f21f)): ?>
<?php $attributes = $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f; ?>
<?php unset($__attributesOriginal08c1c82965a3da82beb5c038edb4f21f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08c1c82965a3da82beb5c038edb4f21f)): ?>
<?php $component = $__componentOriginal08c1c82965a3da82beb5c038edb4f21f; ?>
<?php unset($__componentOriginal08c1c82965a3da82beb5c038edb4f21f); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal08c1c82965a3da82beb5c038edb4f21f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.sidebar-link-item','data' => ['iconClasses' => 'fas fa-gear sidebar-icon','url' => ''.e(strtolower($moduleName)).'/advance','title' => 'Advance']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.sidebar-link-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['iconClasses' => 'fas fa-gear sidebar-icon','url' => ''.e(strtolower($moduleName)).'/advance','title' => 'Advance']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal08c1c82965a3da82beb5c038edb4f21f)): ?>
<?php $attributes = $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f; ?>
<?php unset($__attributesOriginal08c1c82965a3da82beb5c038edb4f21f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08c1c82965a3da82beb5c038edb4f21f)): ?>
<?php $component = $__componentOriginal08c1c82965a3da82beb5c038edb4f21f; ?>
<?php unset($__componentOriginal08c1c82965a3da82beb5c038edb4f21f); ?>
<?php endif; ?>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Core/Resources/views/components/layouts/navbars/auth/sidebar-footer.blade.php ENDPATH**/ ?>