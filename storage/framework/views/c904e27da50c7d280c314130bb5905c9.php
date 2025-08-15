
<?php if (isset($component)) { $__componentOriginal08c1c82965a3da82beb5c038edb4f21f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.sidebar-link-item','data' => ['iconClasses' => 'fas fa-toggle-on','url' => 'user/user-statuses','title' => 'User Statuses','anchorClasses' => ''.e(($active == 'user-statuses')? 'active': '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.sidebar-link-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['iconClasses' => 'fas fa-toggle-on','url' => 'user/user-statuses','title' => 'User Statuses','anchorClasses' => ''.e(($active == 'user-statuses')? 'active': '').'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.sidebar-link-item','data' => ['iconClasses' => 'fas fa-folder','url' => 'user/user-status-categories','title' => 'User Status Categories','anchorClasses' => ''.e(($active == 'user-status-categories')? 'active': '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.sidebar-link-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['iconClasses' => 'fas fa-folder','url' => 'user/user-status-categories','title' => 'User Status Categories','anchorClasses' => ''.e(($active == 'user-status-categories')? 'active': '').'']); ?>
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

<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/User/Resources/views/components/layouts/navbars/auth/user-status-management-tab-bar-links.blade.php ENDPATH**/ ?>