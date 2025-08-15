<div class="card w-100">
    <div class="card-body p-3">
      <div class="row">
        <div class="col-8">
          <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                <!--[if BLOCK]><![endif]--><?php if(!$showRecordNameOnly): ?>
                    <?php echo e(str_replace("_", " ", ucfirst($this->timeDuration))); ?>'s
                    <?php echo e($aggregationMethodTitle?? ucfirst($aggregationMethod)); ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php echo e($recordName); ?>

            </p>

            <h5 class="font-weight-bolder mb-0">
                
                <?php if($aggregationMethod == "average"): ?>
                    <?php echo e($prefix); ?><?php echo e($ave); ?><?php echo e($suffix); ?>

                <?php elseif($aggregationMethod == "max"): ?>
                    <?php echo e($prefix); ?><?php echo e($max); ?><?php echo e($suffix); ?>

                <?php elseif($aggregationMethod == "min"): ?>
                    <?php echo e($prefix); ?><?php echo e($min); ?><?php echo e($suffix); ?>

                <?php elseif($aggregationMethod == "count"): ?>
                    <?php echo e($prefix); ?><?php echo e($count); ?><?php echo e($suffix); ?>

                <?php else: ?> 
                    <?php echo e($prefix); ?><?php echo e($sum); ?><?php echo e($suffix); ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                
                <?php if(str_contains($timeDuration, "this")): ?>
                    <!--[if BLOCK]><![endif]--><?php if($valueChange > 0 && $timeDuration != 'custom'): ?>
                        
                        <span class="text-success text-sm font-weight-bolder">+<?php echo e(abs($valueChangePercent)); ?>%</span>
                    <?php elseif($valueChange < 0 && $timeDuration != 'custom'): ?>
                        
                        <span class="text-danger text-sm font-weight-bolder">-<?php echo e(abs($valueChangePercent)); ?>%</span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </h5>

          </div>
        </div>

        <div class="col-4 text-end">
          <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
            <i class="<?php echo e($iconCSSClass); ?>" aria-hidden="true"></i>
          </div>
        </div>

      </div>
    </div>
  </div>


<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Dashboard/Resources/views/components/visualisation/widgets/cards/icon-card.blade.php ENDPATH**/ ?>