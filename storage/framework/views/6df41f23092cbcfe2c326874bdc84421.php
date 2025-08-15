<div >

    
    <form role="form text-left" class="p-4 modal-form row" >

        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $fieldGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $groupTitle = $group['title'] ?? '';
                $groupType = $group['groupType'] ?? '';
                //$display = $group['display'] ?? 'block';
                $fields = $group['fields'] ?? [];

                if ($isEditMode )
                    $isGroupEmpty = empty(array_diff($fields, $hiddenFields['onEditForm']));
                else
                    $isGroupEmpty = empty(array_diff($fields, $hiddenFields['onNewForm']));
            ?>


            
            <!--[if BLOCK]><![endif]--><?php if($groupType == "hr" && !$isGroupEmpty): ?>
                <h6 class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-1"><?php echo e($groupTitle?? ''); ?></h6>
                <hr class="horizontal dark mt-0" />

            
            <?php elseif($groupType == "collapsible" && !$isGroupEmpty): ?>
                    <!-- Card for Optional Fields -->

                    <div class="mt-5 mb-1 bg-gray-100 py-2 cursor-pointer p-1 px-3 d-flex justify-content-between rounded rounded-pill
                        " data-bs-toggle="collapse" data-bs-target="#optionalFields" aria-expanded="false" aria-controls="optionalFields">
                            <span class="text-uppercase text-secondary text-xs font-weight-bolder  mb-1">Advance</span>
                            <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="bg-gray-100 mb-5 rounded  rounded-3">

                        <div class="collapse" id="optionalFields" wire:ignore.self>
                            <div class="card-body p-md-4">
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]--><?php if(($isEditMode && !in_array($field, $hiddenFields['onEditForm'])) ||
                        (!$isEditMode && !in_array($field, $hiddenFields['onNewForm']))): ?>

                        <?php

                            $type = $fieldDefinitions[$field]?? 'text';
                            $options = [];

                            $reactivity = $fieldDefinitions[$field]['reactivity']?? "defer";
                            $autoGenerate = $fieldDefinitions[$field]['autoGenerate']?? false;


                            if (is_array($type) && isset($type['field_type'])) {
                                if (isset($type['options'])) {
                                    if (isset($type['options']['model'], $type['options']['column'])) {
                                        $options = DataTableOption::getOptionList($type['options']);

                                    } else {
                                        $options = $type['options'];
                                    }

                                } // Get option before updating '$type'

                                if (isset($type['selected'])) {
                                    $selected = $type['selected'];
                                } // Get selected before updating '$type'
                                if (isset($type['display'])) {
                                    $display = $type['display'];
                                } // Get display before updating '$type'

                                $type = $type['field_type'];

                                // Handle multi definition fields eg select, chckbox, radio
                            } elseif (is_array($type)) {
                                // Extracting only the 'fieldName' from the array.
                                // THIS MAY NEED MODIFICATION WHEN OTHER ARRAY INFO ARE NEEDED
                                $type = $type['field_type'];
                            }

                        ?>



                        <!----  FORM FIELDS    ---->
                    <div class=" <?php echo e($fieldDefinitions[$field]['wraperCssClasses']?? 'col-12'); ?>">
                        <div class="form-group">
                            
                            <!--[if BLOCK]><![endif]--><?php if(isset($fieldDefinitions[$field]['label'])): ?>
                                <label class="mt-2 mb-1" for="<?php echo e($field); ?>"><?php echo e(ucwords($fieldDefinitions[$field]['label'])); ?></label>
                            <?php else: ?>
                                <label class="mt-2 mb-1" for="<?php echo e($field); ?>"><?php echo e(ucwords(str_replace('_', ' ', $field))); ?></label>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                            <!---- Add  item ---->
                            <!--[if BLOCK]><![endif]--><?php if(isset($fieldDefinitions[$field]['relationship'])
                                    && isset($fieldDefinitions[$field]['relationship']['inlineAdd'])
                                    && $fieldDefinitions[$field]['relationship']['inlineAdd']
                                ): ?>
                                    <!-- Button to open the secondary modal to add new items -->
                                    <span role="button" class="badge rounded-pill bg-primary text-xxs"
                                        onclick="Livewire.dispatch('openAddRelationshipItemModalEvent',
                                            [<?php echo e(json_encode($fieldDefinitions[$field]['relationship']['model'])); ?>

                                            ] )">
                                        Add
                                    </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                            <!--[if BLOCK]><![endif]--><?php if($type === 'textarea'): ?>
                                <textarea wire:model.<?php echo e($reactivity); ?>="fields.<?php echo e($field); ?>" id="<?php echo e($field); ?>" class="form-control"
                                    name = "<?php echo e($field); ?>" value= "<?php echo e($field); ?>" rows="3" <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>><?php echo e($fields[$field] ?? ''); ?></textarea>



                            <?php elseif($type === 'select'): ?>
                                <!--------- Opening the Select Element -------->

                                <!--[if BLOCK]><![endif]--><?php if($field && $multiSelectFormFields && in_array($field, array_keys($multiSelectFormFields))): ?>
                                    <select wire:key="multi-select-<?php echo e($field); ?>" multiple wire:model.<?php echo e($reactivity); ?>="multiSelectFormFields.<?php echo e($field); ?>"
                                        name = "<?php echo e($field); ?>" value= "<?php echo e($field); ?>" id="<?php echo e($field); ?>"
                                        class="form-control"  <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>>

                                <?php elseif($field && $singleSelectFormFields && in_array($field, array_keys($singleSelectFormFields))): ?>
                                    
                                    <select wire:key="single-select-<?php echo e($field); ?>" wire:model.<?php echo e($reactivity); ?>="singleSelectFormFields.<?php echo e($field); ?>"
                                    name = "<?php echo e($field); ?>"  id="<?php echo e($field); ?>"
                                    class="form-control" <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>>

                                <?php else: ?>
                                        <select wire:key="select-<?php echo e($field); ?>" wire:model.<?php echo e($reactivity); ?>="fields.<?php echo e($field); ?>" name = "<?php echo e($field); ?>"
                                            value= "<?php echo e($field); ?>" id="<?php echo e($field); ?>" class="form-control"  <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if(isset($fieldDefinitions[$field]['label'])): ?>
                                    <option style="display:none" value="">Select <?php echo e($fieldDefinitions[$field]['label']); ?>...
                                    </option>
                                <?php else: ?>
                                    <option style="display:none" value="">Select <?php echo e(strtolower(str_replace('_', ' ', $field))); ?>...</option>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                                </select>
                                <!--------- Closing the Select Element -------->

                            <?php elseif($type === 'checkbox'): ?>

                                <!--------- Checkbox on a horizontal line -------->
                                <!--[if BLOCK]><![endif]--><?php if(isset($display) && $display == 'inline'): ?><div><?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check"
                                        <?php if(isset($display) && $display == 'inline'): ?> style="display:inline-flex;" <?php endif; ?>>

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]--><?php if($field && $multiSelectFormFields && in_array($field, array_keys($multiSelectFormFields))): ?>
                                            <input wire:key="multi-check-<?php echo e($key); ?>" class="form-check-input" type="<?php echo e($type); ?>"
                                                id="<?php echo e($key); ?>"
                                                wire:model.<?php echo e($reactivity); ?>="multiSelectFormFields.<?php echo e($field); ?>"
                                                value="<?php echo e($key); ?>"  name="<?php echo e($field); ?>"
                                                <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>
                                                >

                                            <!----- Normal field selection handled manually------>
                                        <?php else: ?>
                                            <input wire:key="check-<?php echo e($key); ?>" class="form-check-input" type="<?php echo e($type); ?>"
                                                id="<?php echo e($key); ?>" wire:model.<?php echo e($reactivity); ?>="fields.<?php echo e($field); ?>"
                                                value="<?php echo e($key); ?>" 
                                                <?php if(in_array($key, $fields[$field] ?? [])): ?> checked <?php endif; ?> name="<?php echo e($field); ?>">
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="<?php echo e($key); ?>"
                                            <?php if(isset($display) && $display == 'inline'): ?> style="margin: 0.25em 2em 1em 0.5em" <?php endif; ?>>
                                            <?php echo e($value); ?>

                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--><?php if(isset($display) && $display == 'inline'): ?></div><?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <!--------- End Checkbox on a horizontal line -------->

                            <?php elseif($type === 'radio'): ?>
                                <!--------- Radio button on a horizontal line -------->
                                <!--[if BLOCK]><![endif]--><?php if(isset($display) && $display == 'inline'): ?><div><?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <!--[if BLOCK]><![endif]--><?php if($field && $singleSelectFormFields && in_array($field, array_keys($singleSelectFormFields))): ?>

                                        <div class="form-check"
                                            <?php if(isset($display) && $display == 'inline'): ?> style="display:inline-flex;" <?php endif; ?>>

                                            <input wire:key="radio-<?php echo e($key); ?>" class="form-check-input" type="<?php echo e($type); ?>"
                                                id="<?php echo e($key); ?>" wire:model.<?php echo e($reactivity); ?>="singleSelectFormFields.<?php echo e($field); ?>"
                                                value="<?php echo e($key); ?>" 
                                                <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>>



                                            <label class="custom-control-label" for="<?php echo e($key); ?>"
                                            <?php if(isset($display) && $display == 'inline'): ?> style="margin: 0.25em 2em 1em 0.5em" <?php endif; ?>>
                                                <?php echo e($value); ?>

                                            </label>
                                        </div>

                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--><?php if(isset($display) && $display == 'inline'): ?></div><?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <!--------- End button on a horizontal line -------->

                            <?php elseif($type === 'file' && in_array($field, DataTableConfig::getSupportedImageColumnNames())): ?>
                                <!----------- IMAGE INPUT ------------->
                                <div class="row border rounded-3 m-1 p-3">

                                    <div class="col-9">
                                        <!--- INPUT Field ---->
                                        <input type="<?php echo e($type); ?>" wire:model.<?php echo e($reactivity); ?>="fields.<?php echo e($field); ?>" accept="image/*"
                                            id="<?php echo e($field); ?>" class="form-control rounded-pill" value="<?php echo e($fields[$field] ?? ''); ?>"
                                            <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>
                                            >

                                        <!--- INPUT Info ---->
                                        <!--[if BLOCK]><![endif]--><?php if(isset($fields[$field]) && is_object($fields[$field]) && $fields[$field]->temporaryUrl()): ?>
                                            <span class="text-xs">This is the <strong>Selected Image</strong></span>
                                        <?php elseif(!empty($fields[$field])): ?>
                                            <span class="text-xs">This is the <strong> Current Image</strong></span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>






                                    <div class="col-2 rounded border border-red p-1 ms-3 image-container" id="image-container-<?php echo e($field); ?>">

                                        <!--- IMAGE PREVIEW THUBMNAIL ---->
                                        <!--[if BLOCK]><![endif]--><?php if(isset($this->fields[$field])): ?>

                                            <!------ Crop Thubnail -------->
                                            <img id="image-preview-<?php echo e($field); ?>" 
                                                <?php if(is_object($this->fields[$field]) && $this->fields[$field]->temporaryUrl()): ?> src="<?php echo e($this->fields[$field]->temporaryUrl()); ?>"

                                                                        
                                                                        <?php elseif(isset($this->fields[$field])): ?>
                                                                            src="<?php echo e(asset('storage/' . $this->fields[$field])); ?>" <?php endif; ?>
                                                alt="Image Preview" style="width: 100%;" />

                                            <!------ Crop Icon-------->
                                            <span
                                                <?php if(is_object($this->fields[$field]) && $this->fields[$field]->temporaryUrl()): ?> wire:click="openCropImageModal( '<?php echo e($field); ?>', '<?php echo e($this->fields[$field]->temporaryUrl()); ?>', '<?php echo e($this->getId()); ?>')"
                                                                        <?php else: ?>
                                                                            wire:click="openCropImageModal('<?php echo e($field); ?>', '<?php echo e(asset('storage/' . $this->fields[$field])); ?>', '<?php echo e($this->getId()); ?>')" <?php endif; ?>
                                                class="mx-2" style="" data-bs-toggle="tooltip" data-bs-original-title="Crop">
                                                <span style="cursor: pointer;">
                                                    <i class="fas fa-edit text-primary"></i>
                                                    <span class="text-xs">Crop</span>
                                                </span>
                                            </span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    </div>
                                </div>

                            <?php elseif(str_contains($type, "date") || str_contains($type, "time")): ?>

                                <!----------- DATE FIELD ------------->
                                <input type="<?php echo e($type); ?>" wire:model.<?php echo e($reactivity); ?>="fields.<?php echo e($field); ?>" id="<?php echo e($field); ?>"
                                    class="form-control rounded-pill <?php echo e($type); ?>"  value="<?php echo e($fields[$field] ?? ''); ?>" name="<?php echo e($field); ?>"
                                        placeholder="Please provide the <?php echo e(strtolower(str_replace('_', ' ', $field))); ?>..."
                                        <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>
                                    >


                            <?php else: ?>
                                <!----------- ANY OTHER INPUT ------------->
                                <div class="input-group">
                                <input type="<?php echo e($type); ?>" wire:model.<?php echo e($reactivity); ?>="fields.<?php echo e($field); ?>" id="<?php echo e($field); ?>"
                                    class="form-control" value="<?php echo e($fields[$field] ?? ''); ?>" name="<?php echo e($field); ?>"
                                        placeholder="Please provide the <?php echo e(strtolower(str_replace('_', ' ', $field))); ?>..."

                                        
                                        <?php if($autoGenerate): ?> wire:focus="generateOrderNumber('<?php echo e(addslashes($model)); ?>', '<?php echo e($modelName); ?>',  '<?php echo e($field); ?>')" <?php endif; ?>
                                        <?php if(in_array($field, $readOnlyFields)): ?> disabled <?php endif; ?>
                                    >

                                    
                                    <!--[if BLOCK]><![endif]--><?php if($autoGenerate): ?>
                                        <button class="btn btn-outline-primary mb-0" type="button" id="button-addon2"
                                            wire:click="generateOrderNumber('<?php echo e(addslashes($model)); ?>', '<?php echo e($modelName); ?>',  '<?php echo e($field); ?>')"
                                        ><i class="fas fa-sync-alt me-1"></i> Auto</button>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <!----------- Validation Error  ------------->
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['fields.' . $field];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <?php $message = str_replace('characters.', '', $message) ?>
                                <?php $message = str_replace('id', ' ', $message) ?>
                                <span class="text-danger text-sm mb-0"> <?php echo e(str_replace('fields.', ' ', $message)); ?> </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['multiSelectFormFields.' . $field];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <?php $message = str_replace('characters.', '', $message) ?>
                                <?php $message = str_replace('id', ' ', $message) ?>
                                <span class="text-danger text-sm mb-0"> <?php echo e(str_replace('multi select form fields.', ' ', $message)); ?> </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['singleSelectFormFields.' . $field];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <?php $message = str_replace('characters.', '', $message) ?>
                                <?php $message = str_replace('id', ' ', $message) ?>
                                <span class="text-danger text-sm mb-0"> <?php echo e(str_replace('single select form fields.', ' ', $message)); ?> </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                <!----  END CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->



            <!--[if BLOCK]><![endif]--><?php if($groupType == "hr"): ?>
                <div class="mt-5 col-12"></div>

            <?php elseif($groupType == "collapsible"): ?>
                            </div> 
                        </div> 
                    </div> 
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->





        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </form>

    <?php echo $__env->make('core.views::data-tables.partials.form-footer', [
        'modalId' => $modalId,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>

<?php /**PATH /Users/mac/LaravelProjects/quickerfaster-suites/app/Modules/Core/Resources/views/data-tables/data-table-form.blade.php ENDPATH**/ ?>