<?php if (isset($component)) { $__componentOriginal08c1c82965a3da82beb5c038edb4f21f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal08c1c82965a3da82beb5c038edb4f21f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.sidebar-link-item','data' => ['iconClasses' => 'fas fa-user','url' => 'user/users','title' => 'User Overview','anchorClasses' => ''.e(($active == 'users')? 'active': '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.sidebar-link-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['iconClasses' => 'fas fa-user','url' => 'user/users','title' => 'User Overview','anchorClasses' => ''.e(($active == 'users')? 'active': '').'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.sidebar-link-item','data' => ['iconClasses' => 'fas fa-address-card','url' => 'user/basic-infos','title' => 'Basic Info','anchorClasses' => ''.e(($active == 'basic-infos')? 'active': '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.sidebar-link-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['iconClasses' => 'fas fa-address-card','url' => 'user/basic-infos','title' => 'Basic Info','anchorClasses' => ''.e(($active == 'basic-infos')? 'active': '').'']); ?>
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

<?php /**PATH /Users/mac/LaravelProjects/suites.quickerfaster.com/app/Modules/User/Resources/views/components/layouts/navbars/auth/users-management-tab-bar-links.blade.php ENDPATH**/ ?>