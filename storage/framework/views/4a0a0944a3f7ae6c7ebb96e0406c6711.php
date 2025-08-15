<section class="m-0 m-md-4">

    
    <?php echo $__env->make('core.views::data-tables.modals.modal-header', [
        'modalId' => $modalId,
        'isEditMode' => true,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card-body">
            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('data-tables.data-table-form', ['pageTitle' => $pageTitle,'queryFilters' => $queryFilters,'configFileName' => $configFileName,'config' => $config,'fieldGroups' => $fieldGroups,'fieldDefinitions' => $fieldDefinitions,'model' => $model,'moduleName' => $moduleName,'modelName' => $modelName,'recordName' => $recordName,'multiSelectFormFields' => $multiSelectFormFields,'singleSelectFormFields' => $singleSelectFormFields,'hiddenFields' => $hiddenFields,'readOnlyFields' => $readOnlyFields,'columns' => $columns,'isEditMode' => $isEditMode,'modalId' => $modalId]);

$__html = app('livewire')->mount($__name, $__params, 'addEditModal', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    <?php echo $__env->make('core.views::data-tables.modals.modal-footer', [
        'modalId' => $modalId,
        'isEditMode' => true,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





</section>

<?php echo $__env->make('core.assets::data-tables.assets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('core.assets::data-tables.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Core/Resources/views/forms/form-manager.blade.php ENDPATH**/ ?>