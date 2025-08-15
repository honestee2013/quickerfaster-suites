
<table id="dataTable" class="table align-items-center mb-0" >
    <thead>
        <tr>
            <!--- Bulk Action - Select ALL Checkbox ---->
            <!--[if BLOCK]><![endif]--><?php if(isset($controls['bulkActions'])): ?>
                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 no-print">
                    <div class="form-check">
                        <input class="form-check-input" style="width: 1.6em; height:1.6em"
                            type="checkbox" wire:model.live.500ms="selectAll">
                    </div>
                </th>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!--- Table Header ACS-DESC Sorting ---->
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--[if BLOCK]><![endif]--><?php if(in_array($column, $visibleColumns)): ?>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2 round-top "
                        wire:click="sortColumn('<?php echo e($column); ?>')" style="height: 0.5em; "
                        aria-sort="<?php echo e($sortField === $column ? ($sortDirection === 'asc' ? 'ascending' : 'descending') : 'none'); ?>">
                        <div
                            class="d-flex justify-content-between p-2 px-3
                        <?php echo e($sortField === $column ? 'rounded-pill bg-gray-100' : ''); ?>">

                            <!--[if BLOCK]><![endif]--><?php if(isset($fieldDefinitions[$column]['label'])): ?>
                                <span><?php echo e(ucwords($fieldDefinitions[$column]['label'])); ?></span>
                            <?php else: ?>
                                <span><?php echo e(ucwords(str_replace('_', ' ', $column))); ?></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if($sortField === $column): ?>
                                <!--[if BLOCK]><![endif]--><?php if($sortDirection === 'asc'): ?>
                                    <span class="btn-inner--icon"><i
                                            class="fa-solid fa-sort-up"></i></span>
                                <?php else: ?>
                                    <span class="btn-inner--icon"><i
                                            class="fa-solid fa-sort-down"></i></span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </th>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><?php if($simpleActions): ?>
                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 no-print">
                    Actions
                </th>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </tr>
    </thead>
    <tbody>


        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <!--- Bulk Action - Single Row Selection Checkbox ---->
                <!--[if BLOCK]><![endif]--><?php if(isset($controls['bulkActions'])): ?>
                    <td
                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 no-print">
                        <div class="form-check">
                            <input class="form-check-input" style="width: 1.6em; height:1.6em"
                                x-on:click="$wire.toggleRowSelected()"
                                type="checkbox" wire:model="selectedRows" value="<?php echo e($row->id); ?>"
                                <?php if(in_array($row->id, $selectedRows)): ?> selected <?php endif; ?> />
                        </div>
                    </td>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!---- Displaying Record That Has A RELATIONSHIP  ---->
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if(in_array($column, $visibleColumns)): ?>
                        <td  style=" white-space: normal; word-wrap: break-word; ">
                            <p class="text-xs font-weight-bold mb-0 ">
                                <!--[if BLOCK]><![endif]--><?php if(isset($fieldDefinitions[$column]) && isset($fieldDefinitions[$column]['relationship'])): ?>
                                    <!---- Has Many Relationship ---->
                                    <!--[if BLOCK]><![endif]--><?php if(isset($fieldDefinitions[$column]['relationship']['type']) && $fieldDefinitions[$column]['relationship']['type'] == 'hasMany'): ?>
                                        <?php
                                            $dynamicProperty = $row->{$fieldDefinitions[$column]['relationship']['dynamic_property']}
                                                ?->pluck($fieldDefinitions[$column]['relationship']['display_field'])->toArray();
                                                $dynamicProperty = $dynamicProperty?? [];
                                        ?>

                                        <?php echo $this->formartTableCellData($row, $column,
                                                implode(', ', $dynamicProperty)
                                            ); ?>

                                    <!---- Belongs To Many Relationship ---->
                                    <?php elseif(isset($fieldDefinitions[$column]['relationship']['type']) && $fieldDefinitions[$column]['relationship']['type'] == 'belongsToMany'): ?>
                                        <?php echo $this->formartTableCellData($row, $column,
                                                implode(', ',
                                                    $row->{$fieldDefinitions[$column]['relationship']['dynamic_property']}
                                                    ?->pluck($fieldDefinitions[$column]['relationship']['display_field'])->toArray()
                                                )
                                            ); ?>

                                    <?php else: ?> <!---- Belongs To Relationship ---->
                                        <?php
                                            $dynamic_property = $fieldDefinitions[$column]['relationship']['dynamic_property'];
                                            $displayField = $fieldDefinitions[$column]['relationship']['display_field'];

                                            $displayField = explode(".", $displayField); // Handling a nested display field eg. user.name
                                            $displayField = count($displayField) > 1? $displayField[1]: $displayField[0]; // name should be replace with expected default display field
                                        ?>
                                        <?php echo $this->formartTableCellData($row, $column,
                                                optional($row->{$dynamic_property})->$displayField
                                            ); ?>

                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <?php elseif($column && $multiSelectFormFields && in_array($column, array_keys($multiSelectFormFields))): ?>
                                    <?php echo $this->formartTableCellData($row, $column,
                                            str_replace(',', ', ', str_replace(['[', ']', '"'], '', $row->$column))
                                        ); ?>

                                <?php elseif(in_array($column, DataTableConfig::getSupportedImageColumnNames())): ?>
                                    <!--[if BLOCK]><![endif]--><?php if($row->$column): ?>
                                        <img class="rounded-circle m-0"
                                            style="width: 4em; height: 4em;"
                                            src="<?php echo e(asset('storage/' . $row->$column)); ?>"
                                            alt="">
                                    <?php else: ?>
                                        <i class="fas fa-file-image  m-0 ms-2"
                                            style="font-size: 4em; color:lightgray;"></i>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <?php else: ?>
                                    <?php echo $this->formartTableCellData($row, $column,
                                            $row->$column
                                        ); ?>

                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </p>
                        </td>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                <td class="no-print">
                    <!--[if BLOCK]><![endif]--><?php if($simpleActions): ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $simpleActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!--[if BLOCK]><![endif]--><?php if(strtolower($action) == 'edit'): ?>

                                <span wire:click="editRecord( <?php echo e($row->id); ?>, '<?php echo e(addslashes($model)); ?>' )"
                                    class="mx-2"
                                    style="cursor: pointer"
                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                    <i class="fas fa-edit text-primary"></i>
                                </span>
                            <?php elseif(strtolower($action) == 'show'): ?>
                                <span wire:click="$dispatch('openDetailModalEvent', [<?php echo e($row->id); ?>, '<?php echo e(addslashes($model)); ?>'] )"
                                    style="cursor: pointer" class="mx-2"
                                    data-bs-toggle="tooltip"  data-bs-original-title="Detail"
                                    >
                                    <i class="fas fa-eye text-info"></i>
                                </span>
                            <?php elseif(strtolower($action) == 'delete'): ?>
                                <span wire:click="deleteRecord(<?php echo e($row->id); ?> )"
                                    class="mx-2"
                                    style="cursor: pointer"
                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                    <i class="fas fa-trash text-danger"></i>
                                </span>
                            <?php else: ?>
                                <!------- Default eg. route('users.user.edit', ['user' => 1]) --------->
                                <a href="<?php echo e(route(strtolower(Str::plural($modelName)) . '.' . strtolower(Str::singular($modelName)) . '.' . strtolower(Str::singular($action)), [strtolower($modelName) => $row->id])); ?>"
                                    class="mx-2" data-bs-toggle="tooltip"
                                    style="cursor: pointer"
                                    data-bs-original-title="<?php echo e(ucfirst($action)); ?>">
                                    <span
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <?php echo e(ucfirst($action)); ?>

                                    </span>
                                </a>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    
                    <!--[if BLOCK]><![endif]--><?php if($moreActions): ?>
                        <span class="btn-group dropdown" data-bs-toggle="tooltip" data-bs-original-title="More">
                            <span class="px-2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical text-secondary" style="cursor: pointer"></i>
                            </span>
                            <ul class="dropdown-menu dropdown-menu-end me-sm-n4 px-2 py-3" aria-labelledby="dropdownMenuButton">

                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $moreActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $isGrouped = is_string($key) && is_array($value);
                                        $actions = $isGrouped ? $value : [$value];
                                    ?>

                                    <!--[if BLOCK]><![endif]--><?php if($isGrouped): ?>
                                        <span class="m-2 text-uppercase text-xs fw-bolder"><?php echo e(ucfirst($key)); ?></span>
                                        <hr class="m-2 p-0 bg-gray-500" />
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="mb-2">
                                            <!--[if BLOCK]><![endif]--><?php if(isset($action['route'])): ?>
                                               <a class="dropdown-item border-radius-md" wire:click="openLink('<?php echo e($action['route']); ?>', <?php echo e(json_encode(array_merge($action['params']?? [], ['id' => $row->id]))); ?>)">
                                            <?php elseif(isset($action['updateModelField']) && isset($action['fieldName']) && isset($action['fieldValue']) && isset($action['actionName'])): ?>
                                                <a class="dropdown-item border-radius-md" onclick="Livewire.dispatch('updateModelFieldEvent',['<?php echo e($row->id); ?>', '<?php echo e($action['fieldName']); ?>', '<?php echo e($action['fieldValue']); ?>', '<?php echo e($action['actionName']); ?>', '<?php echo e($action['handleByEventHandlerOnly']); ?>'])">
                                            <?php else: ?>
                                                <a class="dropdown-item border-radius-md" href="javascript:void(0)">
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                <!--[if BLOCK]><![endif]--><?php if(isset($action['icon'])): ?>
                                                    <i class="<?php echo e($action['icon']); ?>" style="margin-right: 1em"></i>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <span class="btn-inner--text"><?php echo e($action['title'] ?? ''); ?></span>
                                                </a>
                                        </li>

                                        <!--[if BLOCK]><![endif]--><?php if(isset($action['hr'])): ?>
                                            <hr class="m-2 p-0 bg-gray-500" />
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                            </ul>
                        </span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="<?php echo e(count($columns)); ?>" class="text-center py-4">No records found.</td>
            </tr>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </tbody>
</table>
<?php /**PATH /Users/mac/LaravelProjects/suites.quickerfaster.com/app/Modules/Core/Resources/views/data-tables/partials/table-body.blade.php ENDPATH**/ ?>