<?php
    $modelTitle = $reportTitle ?? 'Report';
    $headerFields = $config['headerFields'] ?? [];
    $tableFields = $config['tableFields'] ?? [];
    $summaryFields = $config['summaryFields'] ?? [];
    $signatories = $config['signatories'] ?? [];
    $fieldDefinitions = $config['fieldDefinitions'] ?? [];
?>

<div class="container my-4 p-4 bg-white shadow-sm border rounded">

    <!-- Title and Export Buttons -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold"><?php echo e($modelTitle); ?></h2>
        <div>
            <a href="<?php echo e(route('reports.export', ['modelName' => 'PayrollRun', 'id' => $reportHeader->id, 'format' => 'pdf'])); ?>"
               class="btn btn-outline-danger btn-sm me-2" target="_blank">Download PDF</a>

            <a href="<?php echo e(route('reports.export', ['modelName' => 'PayrollRun', 'id' => $reportHeader->id, 'format' => 'excel'])); ?>"
               class="btn btn-outline-success btn-sm" target="_blank">Download Excel</a>
        </div>
    </div>

    <!-- Header Details -->
    <div class="mb-4">
        <h5 class="border-bottom pb-2 mb-3">Details</h5>
        <div class="row">
            <?php $__currentLoopData = $headerFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 mb-2">
                    <strong><?php echo e($fieldDefinitions[$field]['label'] ?? ucfirst(str_replace('_', ' ', $field))); ?>:</strong>
                    <span class="ms-1"><?php echo e($reportHeader->$field ?? '-'); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive mb-4">
        <h5 class="border-bottom pb-2 mb-3">Records</h5>
        <table class="table table-bordered table-striped table-sm">
            <thead class="table-light">
                <tr>
                    <?php $__currentLoopData = $tableFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    </div>

    <!-- Summary Section -->
    <?php if(count($summaryFields)): ?>
    <div class="mb-4">
        <h5 class="border-bottom pb-2 mb-3">Summary</h5>
        <table class="table table-sm table-borderless">
            <?php $__currentLoopData = $summaryFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><strong><?php echo e($label); ?></strong></td>
                    <td class="text-end"><?php echo e(number_format($reportItems->sum($key), 2)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <?php endif; ?>

    <!-- Signatories -->
    <?php if(count($signatories)): ?>
    <div>
        <h5 class="border-bottom pb-2 mb-3">Signatories</h5>
        <div class="row">
            <?php $__currentLoopData = $signatories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signatory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 text-center mt-4">
                    <div class="border-top pt-3">
                        <strong><?php echo e($signatory['label']); ?></strong><br>
                        <?php echo e($reportHeader->{$signatory['field']} ?? ''); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php /**PATH /Users/mac/LaravelProjects/suites.quickerfaster.com/app/Modules/Core/Resources/views/reports/generic_report.blade.php ENDPATH**/ ?>