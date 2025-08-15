<div class="card z-index-2">
    <div class="card-header pb-0">


        <div class="d-flex justify-content-between">
            <div >
                <!--[if BLOCK]><![endif]--><?php if(!$this->title): ?>
                    <h6><?php echo e(str_contains($this->groupBy, "_id")? '': ucfirst($this->groupBy)); ?> <?php echo e($recordName); ?> <span
                            class="text-primary text-xs fst-italic"><?php echo e($timeDuration !== 'custom' ? ucfirst(str_replace('_', ' ', $timeDuration)) : $fromTime . ' to ' . $toTime); ?></span>
                    </h6>
                <?php else: ?>
                    <h6><?php echo e($this->title); ?> <span
                            class="text-primary text-xs fst-italic"><?php echo e($timeDuration !== 'custom' ? ucfirst(str_replace('_', ' ', $timeDuration)) : $fromTime . ' to ' . $toTime); ?></span>
                    </h6>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <p class="text-sm">
                    <!--[if BLOCK]><![endif]--><?php if($this->valueChange > 0 && $timeDuration != 'custom'): ?>
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold text-success"><?php echo e(abs($valueChangePercent)); ?>% </span><span class="font-weight-bold"> more </span> <?php echo e(str_contains($valueChangeTimeDuration, "today")? 'for': 'in'); ?>  <?php echo e(str_replace("_", " ",$valueChangeTimeDuration)); ?>

                    <?php elseif($this->valueChange < 0 && $timeDuration != 'custom'): ?>
                        <i class="fa fa-arrow-down text-danger"></i>
                        <span class="font-weight-bold text-danger"><?php echo e(abs($valueChangePercent)); ?>% </span><span class="font-weight-bold"> less </span> <?php echo e(str_contains($valueChangeTimeDuration, "today")? 'for': 'in'); ?>  <?php echo e(str_replace("_", " ",$valueChangeTimeDuration)); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </p>
            </div>
            <div >
                <!--[if BLOCK]><![endif]--><?php if(is_array($controls) && !empty($controls)): ?>
                    <div class="row mb-4">
                        <!--[if BLOCK]><![endif]--><?php if(array_search('chartType', $controls) !== false): ?>
                            <div class="input-group col-12 w-100 col-sm-auto w-sm-auto mt-2">
                                <select id="roleSelect" x-on:change="$wire.updateChart()" wire:model.live.500ms="chartType"
                                    class="form-select rounded-pill p-1 ps-3 px-sm-3 m-0 small-control">
                                    <option value="" disabled>Select chart...</option>
                                    <option value="bar">Bar chart</option>
                                    <option value="line">Line chart</option>
                                    <option value="pie">Pie chart</option>
                                    <option value="doughnut">Doughnut chart</option>
                                    <option value="polarArea">Polar Area chart</option>
                                    <option value="radar">Radar chart</option>
                                </select>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if(array_search('groupBy', $controls) !== false): ?>
                            <div class="input-group col-12 w-100 col-sm-auto w-sm-auto">
                                <select id="groupBy" wire:model.live.500ms="groupBy"
                                    class="form-select rounded-pill p-1 ps-3  px-sm-3 m-0 mt-2 small-control">
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if(array_search('timeDuration', $controls) !== false): ?>
                            <!--<div class="input-group col-8  col-sm-auto w-sm-auto border border-light rounded-pill p-1" >-->
                            <div class="input-group  w-90 col-sm-auto w-sm-auto border border-light rounded-pill p-3 p-sm-0 ms-3 mt-2">

                                <select wire:model.live.500ms="timeDuration" id="time_duration"
                                    class="form-select  rounded-pill p-1 pt-0 ps-3  px-sm-3 m-1 small-control">
                                    <option value="today">Today</option>
                                    <option value="yesterday">Yesterday</option>
                                    <option value="this_week">This Week</option>
                                    <option value="last_week">Last Week</option>
                                    <option value="this_month">This Month</option>
                                    <option value="last_month">Last Month</option>
                                    <option value="this_year">This Year</option>
                                    <option value="last_year">Last Year</option>
                                    <option value="custom">Custom Range...</option>
                                </select>

                                <div class="input-group col-12 w-100 col-sm-auto w-sm-auto" x-show="$wire.timeDuration === 'custom'">
                                    <span for="from_time" class=" ms-3 me-1 mt-1 text-sm ">From:</span>
                                    <input type="date" wire:model.live.500ms="fromTime" id="from_time"
                                        class="form-control rounded-pill  ps-3  px-sm-3 m-1 " style="height: 2em;">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['fromTime'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                                    <span for="to_time" class=" ms-3 me-1 mt-1 text-sm">To:</span>
                                    <input type="date" wire:model.live.500ms="toTime" id="to_time"
                                        class="form-control rounded-pill ps-3  px-sm-3 m-1" style="height: 2em;">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['toTime'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>











    </div> <!--- Card Header Ends --->









    <div class="card-body p-3">
        <div class="chart text-bold">
            <!--[if BLOCK]><![endif]--><?php if(isset($chartData['labels']) && !empty($chartData['labels'])): ?>
                <div class="ms-2 mb-3 text-center">

                    <!--[if BLOCK]><![endif]--><?php if($showSum): ?>
                        <span class="ms-3 text-xxs badge bg-gradient-info rounded-pill pt-1" style="height: 1.8em;">Total: <?php echo e($sum); ?></span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($showCount): ?>
                        <span class="ms-3 text-xxs badge bg-gradient-success rounded-pill pt-1" style="height: 1.8em">Count: <?php echo e($count); ?></span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($showAve): ?>
                        <span class="ms-3 text-xxs badge bg-gradient-secondary rounded-pill pt-1" style="height: 1.8em">Ave: <?php echo e($ave); ?></span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($showMax): ?>
                        <span class="ms-3 text-xxs badge bg-gradient-primary rounded-pill pt-1" style="height: 1.8em">Max: <?php echo e($max); ?></span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($showMin): ?>
                        <span class="ms-3 text-xxs badge bg-gradient-danger rounded-pill pt-1" style="height: 1.8em">Min: <?php echo e($min); ?></span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <canvas id="<?php echo e($chartId); ?>" class="chart-canvas" wire:ignore height="<?php echo e($canvasHeight); ?>" width="<?php echo e($canvasWidth); ?>"></canvas>
        </div>
    </div>

</div>











    <?php
        $__scriptKey = '3913683338-0';
        ob_start();
    ?>
    <script>
        document.addEventListener('livewire:initialized', function() {
            const chartId = '<?php echo e($chartId); ?>';
            let chartInstance = null;

            function initializeChart(chartType, chartData, chartOptions) {
                const ctx = document.getElementById(chartId).getContext('2d');


                // Destroy existing chart instance if it exists
                if (chartInstance) {
                    chartInstance.destroy();
                }

                // Create a new chart instance
                chartInstance = new Chart(ctx, {
                    type: chartType,
                    data: chartData,
                    options: chartOptions,
                });
            }

            // Watch for Livewire property updates
            Livewire.on(`update-chart-event-${chartId}`, (event) => {
                const chartType = event[0]["chartType"];
                const chartData = event[0]["chartData"];
                const chartOptions = event[0]["chartOptions"];

                initializeChart(chartType, chartData, chartOptions);
            });

            // Initialize chart on page load
            initializeChart(<?php echo json_encode($chartType, 15, 512) ?>, <?php echo json_encode($chartData, 15, 512) ?>,
                <?php echo json_encode($chartOptions, 15, 512) ?>);
        });
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Dashboard/Resources/views/components/visualisation/widgets/charts/chart.blade.php ENDPATH**/ ?>