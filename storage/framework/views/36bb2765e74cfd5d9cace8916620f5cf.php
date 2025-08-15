    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
        $modelTitle = $reportTitle ?? 'Report';
        $headerFields = $config['headerFields'] ?? [];
        $tableFields = $config['tableFields'] ?? [];
        $summaryFields = $config['summaryFields'] ?? [];
        $signatories = $config['signatories'] ?? [];
        $fieldDefinitions = $config['fieldDefinitions'] ?? [];

        $isPdf = request()->routeIs('reports.export');

    ?>





    <div class="<?php echo e($isPdf ? '' : 'container my-4 p-4 bg-white shadow-sm border  rounded-3'); ?>"
        style="<?php echo e($isPdf ? 'font-family: DejaVu Sans; font-size:12px;' : ''); ?>">


        <?php if(!$isPdf): ?>
            <div class="d-flex justify-content-end mb-3">
                <a href="<?php echo e(route('reports.export', ['modelName' => 'PayrollRun', 'id' => $reportHeader->id, 'format' => 'pdf'])); ?>"
                    class="btn btn-sm btn-outline-danger me-2" target="_blank">
                    <i class="bi bi-file-earmark-pdf"></i> Download PDF
                </a>
                <a href="<?php echo e(route('reports.export', ['modelName' => 'PayrollRun', 'id' => $reportHeader->id, 'format' => 'excel'])); ?>"
                    class="btn btn-sm btn-outline-success" target="_blank">
                    <i class="bi bi-file-earmark-excel"></i> Download Excel
                </a>
            </div>
        <?php endif; ?>







        <h2 class="<?php echo e($isPdf ? '' : 'text-center mb-4'); ?>"><?php echo e($modelTitle); ?></h2>

        
        <table class="<?php echo e($isPdf ? '' : 'table table-bordered'); ?>" width="100%"
            style="<?php echo e($isPdf ? 'margin-bottom:20px; margin-bottom:20px;' : ''); ?>">
            <?php $__currentLoopData = $headerFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="<?php echo e($isPdf ? 'width:30%; font-weight:bold;' : ''); ?>">
                        <?php echo e($fieldDefinitions[$field]['label'] ?? ucfirst(str_replace('_', ' ', $field))); ?>

                    </td>
                    <td><?php echo e($reportHeader->$field ?? ''); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <br /><br />

        

        
        <table class="<?php echo e($isPdf ? '' : 'table table-striped table-bordered'); ?>" border="<?php echo e($isPdf ? 1 : 0); ?>"
            width="100%" style="<?php echo e($isPdf ? 'border-collapse:collapse; margin-bottom:20px;' : ''); ?>">
            <thead>
                <tr style="<?php echo e($isPdf ? 'background-color: #f2f2f2;' : ''); ?>">
                    <?php $__currentLoopData = $tableFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($label); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $reportItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $__currentLoopData = $tableFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e($row->$key); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <br /><br />

        
        <?php if(count($summaryFields)): ?>
            <h4>Summary</h4>
            <table class="<?php echo e($isPdf ? '' : 'table table-bordered'); ?>" width="100%">
                <?php $__currentLoopData = $summaryFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="<?php echo e($isPdf ? 'width:30%; font-weight:bold;' : ''); ?>"><?php echo e($label); ?></td>
                        <td><?php echo e(number_format($reportItems->sum($key), 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        <?php endif; ?>

        <br /><br />
        
        <?php if(count($signatories)): ?>
            <h4>Signatories</h4>
            <table width="100%" cellpadding="<?php echo e($isPdf ? '20' : '10'); ?>">
                <tr>
                    <?php $__currentLoopData = $signatories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signatory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="text-center">
                            ___________________________<br>
                            <strong><?php echo e($signatory['label']); ?></strong><br>
                            <?php echo e($reportHeader->{$signatory['field']} ?? ''); ?>

                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </table>
        <?php endif; ?>

    </div>



<?php /**PATH /Users/mac/LaravelProjects/suites.quickerfaster.com/app/Modules/Report/Resources/views/layouts/generic_report.blade.php ENDPATH**/ ?>