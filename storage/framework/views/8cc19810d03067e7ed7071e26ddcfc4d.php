


<div id="sidebar" class="sidebar col-1 border-0 border-radius-xl my-3 fixed-start ms-3 ">
  <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('menus.menu-initializer', ['moduleName' => ''.e($moduleName).'']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1982300485-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

  <ul class="navbar-nav">
    
        <?php echo e($slot); ?>

    
  </ul>
</div>








<?php /**PATH /Users/mac/LaravelProjects/quickerfaster-suites/app/Modules/Core/Resources/views/components/layouts/navbars/auth/sidebar.blade.php ENDPATH**/ ?>