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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.auth.sidebar','data' => ['moduleName' => 'hr']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.auth.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['moduleName' => 'hr']); ?>
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
    <?php echo $__env->make('core.views::components.layouts.navbars.auth.content-header', [ "pageTitile" => "Employees Management"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <?php if (isset($component)) { $__componentOriginal47e488f55d850181e4846a60506858fe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47e488f55d850181e4846a60506858fe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'hr.views::components.layouts.navbars.auth.employees-management-tab-bar-links','data' => ['active' => 'employee-documents']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('hr.views::layouts.navbars.auth.employees-management-tab-bar-links'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['active' => 'employee-documents']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47e488f55d850181e4846a60506858fe)): ?>
<?php $attributes = $__attributesOriginal47e488f55d850181e4846a60506858fe; ?>
<?php unset($__attributesOriginal47e488f55d850181e4846a60506858fe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47e488f55d850181e4846a60506858fe)): ?>
<?php $component = $__componentOriginal47e488f55d850181e4846a60506858fe; ?>
<?php unset($__componentOriginal47e488f55d850181e4846a60506858fe); ?>
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
[$__name, $__params] = $__split('data-tables.data-table-manager', ['model' => 'App\Modules\hr\Models\EmployeeDocument','pageTitle' => 'Employee Documents','queryFilters' => [
],'hiddenFields' => [
  'onTable' => 
  [
    0 => 'file_path',
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

$__html = app('livewire')->mount($__name, $__params, 'lw-143173273-0', $__slots ?? [], get_defined_vars());

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
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Hr/Resources/views/employee-documents.blade.php ENDPATH**/ ?>