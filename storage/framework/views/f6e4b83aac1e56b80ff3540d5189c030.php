<?php echo $__env->make('core.views::data-tables.modals.modal-header', [
    'modalId' => 'detail',
    'isEditMode' => $isEditMode,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<form role="form text-left" class="p-4 modal-form">

    <!-- Display more details of the selected item -->
    <!--[if BLOCK]><![endif]--><?php if($selectedItem): ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--[if BLOCK]><![endif]--><?php if(!in_array($column, $hiddenFields['onDetail'])): ?>
                <!--[if BLOCK]><![endif]--><?php if(isset($fieldDefinitions[$column]['label'])): ?>
                    <strong class="pe-3"><?php echo e(ucwords($fieldDefinitions[$column]['label'])); ?></strong>
                <?php else: ?>
                    <strong class="pe-3"><?php echo e(ucwords(str_replace('_', ' ', $column))); ?></strong>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if(in_array($column, DataTableConfig::getSupportedImageColumnNames())): ?>
                    <div class="d-flex justify-content-center">
                        <img class="rounded rounded-3 mb-5" style="width: 10em"
                            src="<?php echo e(asset('storage/' . $selectedItem->$column)); ?>" alt="">
                    </div>
                <?php elseif($column == 'password'): ?>
                    <p class="mb-4">***********************</p>
                <?php elseif(isset($fieldDefinitions[$column]) && isset($fieldDefinitions[$column]['relationship'])): ?>
                    <p class="mb-4">

                        <!---- Has Many Relationship ---->
                        <!--[if BLOCK]><![endif]--><?php if(isset($fieldDefinitions[$column]['relationship']['type']) &&
                                $fieldDefinitions[$column]['relationship']['type'] == 'hasMany'): ?>
                            <?php echo e(implode(
                                ', ',
                                $selectedItem->{$fieldDefinitions[$column]['relationship']['dynamic_property']}->pluck($fieldDefinitions[$column]['relationship']['display_field'])->toArray(),
                            )); ?>

                            <!---- Belongs To Many Relationship ---->
                        <?php elseif(isset($fieldDefinitions[$column]['relationship']['type']) &&
                                $fieldDefinitions[$column]['relationship']['type'] == 'belongsToMany'): ?>
                            <?php echo e(implode(
                                ', ',
                                $selectedItem->{$fieldDefinitions[$column]['relationship']['dynamic_property']}->pluck($fieldDefinitions[$column]['relationship']['display_field'])->toArray(),
                            )); ?>

                        <?php else: ?>
                            <!---- Has One Relationship ---->
                            <?php
                                $dynamic_property = $fieldDefinitions[$column]['relationship']['dynamic_property'];
                                $displayField = $fieldDefinitions[$column]['relationship']['display_field'];
                            ?>
                            <?php echo e(optional($selectedItem->{$dynamic_property})->$displayField); ?>

                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->



                    </p>
                <?php elseif($column && $multiSelectFormFields && in_array($column, array_keys($multiSelectFormFields))): ?>
                    <p class="mb-4">
                        <?php echo e(str_replace(',', ', ', str_replace(['[', ']', '"'], '', $selectedItem->$column))); ?>

                    </p>
                <?php else: ?>
                    <p class="mb-4">
                        <?php echo e($selectedItem->$column); ?>

                    </p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</form>


<?php echo $__env->make('core.views::data-tables.partials.form-footer', [
    'modalId' => 'detail',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Users/mac/LaravelProjects/quickerfaster-suites/app/Modules/Core/Resources/views/data-tables/modals/show-detail-modal.blade.php ENDPATH**/ ?>