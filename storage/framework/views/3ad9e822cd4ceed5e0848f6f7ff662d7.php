<section class="m-0 m-md-4">

    
    <?php echo $__env->make('core.views::data-tables.modals.modal-header', [
        'modalId' => 'addEditModal',
        'isEditMode' => $isEditMode,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card-body">
            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('data-tables.data-table-form', ['pageTitle' => $pageTitle,'queryFilters' => $queryFilters,'configFileName' => $configFileName,'config' => $config,'fieldGroups' => $fieldGroups,'fieldDefinitions' => $fieldDefinitions,'model' => $model,'moduleName' => $moduleName,'modelName' => $modelName,'recordName' => $recordName,'multiSelectFormFields' => $multiSelectFormFields,'singleSelectFormFields' => $singleSelectFormFields,'hiddenFields' => $hiddenFields,'columns' => $columns,'isEditMode' => $isEditMode,'modalId' => 'addEditModal']);

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
        'modalId' => 'addEditModal',
        'isEditMode' => $isEditMode,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    
    <div class="card  p-4">

        
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <?php
                        if (!$pageTitle) // If 'pageTitle' is not available in the DataTableManager check the config file
                            $pageTitle = $config['pageTitle']?? '';

                        if (!$pageTitle) { // If 'pageTitle' is not available in the config file, generate it from the modelName
                            $pageTitle = Str::snake($modelName); // Convert to snake case
                            $pageTitle = ucwords(str_replace('_', ' ', $pageTitle)); // Convert to capitalised words
                            $pageTitle = Str::plural(ucfirst($pageTitle))." Record";
                        }
                    ?>

                    <h5 class="mb-4"><?php echo e($pageTitle); ?> </h5>

                </div>
                <!--[if BLOCK]><![endif]--><?php if(is_array($controls) && in_array('addButton', $controls)): ?>
                    <button wire:click="$dispatch('openAddModalEvent')"
                        class="btn bg-gradient-primary btn-icon-only rounded-circle" type="button">
                        <i class="fa-solid fa-plus   text-white"></i>
                    </button>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>



        




        
        <div class="container ms-0 mt-4 mb-0">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('data-tables.data-table-control', ['controls' => $controls,'columns' => $columns,'hiddenFields' => $hiddenFields,'visibleColumns' => $visibleColumns,'model' => $model,'fieldDefinitions' => $fieldDefinitions,'multiSelectFormFields' => $multiSelectFormFields,'sortField' => $sortField,'sortDirection' => $sortDirection,'perPage' => $perPage,'moduleName' => $moduleName,'modelName' => $modelName,'recordName' => $recordName]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2713504456-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>


        
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('data-tables.data-table', ['fieldDefinitions' => $fieldDefinitions,'hiddenFields' => $hiddenFields,'multiSelectFormFields' => $multiSelectFormFields,'queryFilters' => $queryFilters,'columns' => $columns,'model' => $model,'simpleActions' => $simpleActions,'controls' => $controls,'visibleColumns' => $visibleColumns,'sortField' => $sortField,'sortDirection' => $sortDirection,'perPage' => $perPage,'moduleName' => $moduleName,'modelName' => $modelName,'recordName' => $recordName,'moreActions' => $moreActions]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2713504456-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>


        
        <?php echo $__env->make('core.views::data-tables.modals.show-detail-modal', ['selectedItem' => $selectedItem], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    </div>


</section>

<?php echo $__env->make('core.assets::data-tables.assets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('core.assets::data-tables.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package2/app/Modules/Core/Resources/views/data-tables/data-table-manager.blade.php ENDPATH**/ ?>