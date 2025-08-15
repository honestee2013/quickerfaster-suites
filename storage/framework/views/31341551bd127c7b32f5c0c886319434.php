    <div class="row">
        <div>
            <hr class="horizontal dark my-0" />
        </div>
        <div class=" d-flex justify-content-end align-items-center flex-wrap gap-2 p-3">
            <button type="button" class="btn bg-gradient-secondary rounded-pill"
                onclick="Livewire.dispatch('closeModalEvent', [{'modalId': '<?php echo e($modalId); ?>' }])">Close</button>

            <!--[if BLOCK]><![endif]--><?php if($modalId !== "detail"): ?>
                <button type="button" class="btn bg-gradient-primary rounded-pill"
                    wire:click="saveRecord('<?php echo e($modalId); ?>')">
                    <?php echo e($isEditMode ? 'Save Changes' : 'Add Record'); ?>

                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>


<?php /**PATH /home/quickerf/public_html/suites.quickerfaster.com/app/Modules/Core/Resources/views/data-tables/partials/form-footer.blade.php ENDPATH**/ ?>