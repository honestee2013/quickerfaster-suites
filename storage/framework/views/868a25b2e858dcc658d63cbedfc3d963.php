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
     <?php $__env->slot('sidebar', null, []); ?> 
    <?php if (isset($component)) { $__componentOriginal6f6534e70b5310c12a7df215bbbd1f20 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6f6534e70b5310c12a7df215bbbd1f20 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.auth.sidebar','data' => ['moduleName' => 'warehouse']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.auth.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['moduleName' => 'warehouse']); ?>
        <?php if (isset($component)) { $__componentOriginal785d5487ca7b6c1fea433e8d1b5d29cd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal785d5487ca7b6c1fea433e8d1b5d29cd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'warehouse.views::components.layouts.navbars.auth.sidebar-links','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('warehouse.views::layouts.navbars.auth.sidebar-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal785d5487ca7b6c1fea433e8d1b5d29cd)): ?>
<?php $attributes = $__attributesOriginal785d5487ca7b6c1fea433e8d1b5d29cd; ?>
<?php unset($__attributesOriginal785d5487ca7b6c1fea433e8d1b5d29cd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal785d5487ca7b6c1fea433e8d1b5d29cd)): ?>
<?php $component = $__componentOriginal785d5487ca7b6c1fea433e8d1b5d29cd; ?>
<?php unset($__componentOriginal785d5487ca7b6c1fea433e8d1b5d29cd); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6f6534e70b5310c12a7df215bbbd1f20)): ?>
<?php $attributes = $__attributesOriginal6f6534e70b5310c12a7df215bbbd1f20; ?>
<?php unset($__attributesOriginal6f6534e70b5310c12a7df215bbbd1f20); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6f6534e70b5310c12a7df215bbbd1f20)): ?>
<?php $component = $__componentOriginal6f6534e70b5310c12a7df215bbbd1f20; ?>
<?php unset($__componentOriginal6f6534e70b5310c12a7df215bbbd1f20); ?>
<?php endif; ?>
 <?php $__env->endSlot(); ?>

   <?php $__env->slot('pageHeader', null, []); ?> 
    <?php echo $__env->make('core.views::components.layouts.navbars.auth.content-header', [ "pageTitile" => "Warehouses Management"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php $__env->endSlot(); ?>

  <?php if (isset($component)) { $__componentOriginaldb1034ab06f049c74b037010defcfede = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldb1034ab06f049c74b037010defcfede = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.tab-bar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::tab-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginal13e40ae3c978b4035f5ea0becbc64eac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13e40ae3c978b4035f5ea0becbc64eac = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'warehouse.views::components.layouts.navbars.auth.warehouses-management-tab-bar-links','data' => ['active' => 'warehouses']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('warehouse.views::layouts.navbars.auth.warehouses-management-tab-bar-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['active' => 'warehouses']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13e40ae3c978b4035f5ea0becbc64eac)): ?>
<?php $attributes = $__attributesOriginal13e40ae3c978b4035f5ea0becbc64eac; ?>
<?php unset($__attributesOriginal13e40ae3c978b4035f5ea0becbc64eac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13e40ae3c978b4035f5ea0becbc64eac)): ?>
<?php $component = $__componentOriginal13e40ae3c978b4035f5ea0becbc64eac; ?>
<?php unset($__componentOriginal13e40ae3c978b4035f5ea0becbc64eac); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldb1034ab06f049c74b037010defcfede)): ?>
<?php $attributes = $__attributesOriginaldb1034ab06f049c74b037010defcfede; ?>
<?php unset($__attributesOriginaldb1034ab06f049c74b037010defcfede); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb1034ab06f049c74b037010defcfede)): ?>
<?php $component = $__componentOriginaldb1034ab06f049c74b037010defcfede; ?>
<?php unset($__componentOriginaldb1034ab06f049c74b037010defcfede); ?>
<?php endif; ?>


    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('data-tables.data-table-manager', ['model' => 'App\Modules\warehouse\Models\Warehouse','pageTitle' => 'Warehouses Overview','queryFilters' => [
],'hiddenFields' => [
  'onTable' => 
  [
  ],
  'onNewForm' => 
  [
  ],
  'onEditForm' => 
  [
  ],
  'onQuery' => 
  [
  ],
]]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1910401404-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>


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
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/warehouse/Resources/views/warehouses.blade.php ENDPATH**/ ?>