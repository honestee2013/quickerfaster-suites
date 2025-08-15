<?php

    $employees =  App\Modules\Hr\Models\PayrollEmployee::all(); // This should be filtered to only the [Active Users] $payrollRun->payroll_employees;

    $payrollRunConfig = DataTableConfig::getConfigFileFields("App\\Modules\\Hr\\Data\\payroll_run");
    $payrollEmployeeConfig = DataTableConfig::getConfigFileFields("App\\Modules\\Hr\\Data\\payroll_employee");

    $headerFields = $payrollRunConfig['report']['headerFields'] ?? [];
    $tableFields = $payrollEmployeeConfig['report']['tableFields'] ?? [];

    $summaryFields = $payrollRunConfig['report']['summaryFields'] ?? [];
    $signatories = $payrollRunConfig['report']['signatories'] ?? [];
?>

<div class="report-container">

    
    <div class="report-header">
        <h2>Payroll Report</h2>
        <table>
            <?php if($headerFields && $payrollRun): ?>
                <?php $__currentLoopData = $headerFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><strong><?php echo e($payrollEmployeeConfig['fieldDefinitions'][$field]['label'] ?? ucfirst(str_replace('_', ' ', $field))); ?></strong></td>
                        <td><?php echo e($payrollRun->$field); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </table>
    </div>

    <hr>

    
    <div class="report-table mt-3">
        <table border="1" width="100%" cellpadding="4" cellspacing="0">
            <thead>
                <tr>
                    <?php $__currentLoopData = $tableFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo e($label); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody>
                <?php if($employees): ?>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php $__currentLoopData = $tableFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e($employee->$key); ?></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <div class="report-summary mt-4">
        <h4>Summary</h4>
        <table>
            <?php if($summaryFields && $employees): ?>
                <?php $__currentLoopData = $summaryFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><strong><?php echo e($label); ?></strong></td>
                        <td>
                            <?php echo e(number_format($employees->sum($key), 2)); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </table>
    </div>

    
    <div class="report-signatories mt-5">
        <h4>Signatories</h4>
        <table width="100%">
            <tr>
                <?php if($signatories): ?>
                    <?php $__currentLoopData = $signatories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signatory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <strong><?php echo e($signatory['label']); ?></strong><br><br>
                            ___________________________<br>
                            <?php echo e($payrollRun->{$signatory['field']} ?? ''); ?>

                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tr>
        </table>
    </div>

</div>
<?php /**PATH /Users/mac/LaravelProjects/suites.quickerfaster.com/app/Modules/Hr/Resources/views/reports/payroll_report.blade.php ENDPATH**/ ?>