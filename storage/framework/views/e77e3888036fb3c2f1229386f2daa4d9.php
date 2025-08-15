<?php

    $config = DataTableConfig::getConfigFileFields($model);

    $modalTitle = isset($recordName) ? $recordName : $modelName;
    $modalTitle = Str::snake($modalTitle); // Convert to snake case
    $modalTitle = ucwords(str_replace('_', ' ', $modalTitle)); // Convert to capitalised words


    $newModalTitle = $config["newModalTitle"]?? null;
    $editModalTitle = $config["editModalTitle"]?? null;
    $detailModalTitle = $config["detailModalTitle"]?? null;


    if (!isset($newModalTitle)) {
        $newModalTitle = 'New '.ucfirst($modalTitle);
    }

    if (!isset($editModalTitle)) {
        $editModalTitle = 'Edit '.ucfirst($modalTitle);
    }

    if (!isset($detailModalTitle)) {
        $detailModalTitle = ucfirst($modalTitle).' Detail';
    }

?>

<div wire:ignore.self id="<?php echo e($modalId); ?>" class="modal-wrapper" wire:key="modal-header-<?php echo e($modalId); ?>">
    <!-- Modal Backdrop -->
    <div class="modal-backdrop" id="modalBackdrop"
        onclick="Livewire.dispatch('close-modal-event', [{'modalId': '<?php echo e($modalId); ?>' }])"></div>

    <!-- Modal Content -->
    <div class="modal-content  pb-0  <?php echo e($modalClass?? 'mainModal'); ?>" id="modalContent">
        <h5 class="card-title text-info text-gradient font-weight-bolder p-4 mx-4 mt-2 mb-2 pb-2">
            <!--[if BLOCK]><![endif]--><?php if($modalId !== "detail"): ?>
                <?php echo e($isEditMode ? $editModalTitle : $newModalTitle); ?>

            <?php else: ?>
                <?php echo e($detailModalTitle); ?>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </h5>
        <div class="mb-4"><hr class="horizontal dark my-0" /></div>
        <div class="modal-body">





<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package2/app/Modules/Core/Resources/views/data-tables/modals/modal-header.blade.php ENDPATH**/ ?>