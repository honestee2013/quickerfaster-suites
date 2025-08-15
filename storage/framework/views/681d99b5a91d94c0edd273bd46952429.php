<div>
    <hr class="horizontal dark my-0" />
</div>
<div class="d-flex justify-content-end m-4">
    <button type="button" class="btn bg-gradient-secondary rounded-pill me-2"
    
    onclick="Livewire.dispatch('closeModalEvent', [{'modalId': '<?php echo e($modalId); ?>' }])">Close</button>
    <!--[if BLOCK]><![endif]--><?php if($modalId !== "detail"): ?> 
        <button type="button" class="btn bg-gradient-primary rounded-pill"
            wire:click="saveRecord('<?php echo e($modalId); ?>')">
            <?php echo e($isEditMode ? 'Save Changes' : 'Add Record'); ?>

        </button>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>

<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package2/app/Modules/Core/Resources/views/data-tables/partials/form-footer.blade.php ENDPATH**/ ?>