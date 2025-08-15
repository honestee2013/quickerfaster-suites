
<div wire:key="form-render-<?php echo e($modalId); ?>">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('data-tables.data-table-form', ['fieldDefinitions' => $fieldDefinitions,'model' => $model,'moduleName' => $moduleName,'modelName' => $modelName,'multiSelectFormFields' => $multiSelectFormFields,'singleSelectFormFields' => $singleSelectFormFields,'hiddenFields' => $hiddenFields,'columns' => $columns,'modalId' => $modalId,'fieldGroups' => $fieldGroups,'config' => $config]);

$__html = app('livewire')->mount($__name, $__params, $modalId, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Core/Resources/views/data-tables/partials/form-render.blade.php ENDPATH**/ ?>