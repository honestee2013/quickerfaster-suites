
<?php
    //$userRoles = implode($user->roles->toArray());
    $userJobTitle = $user->profile()?->jobTitle->title;

?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">

        <div class="container-fluid">
          <div class="page-header min-height-150 border-radius-xl mt-0" style="background-image: url('../assets/img/curved-images/curved0.jpg'); ">
            <span class="mask bg-gradient-primary opacity-6"></span>
          </div>
          <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">

              <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                  <img src="<?php echo e($user?->basicInfo?->profile_picture ? asset('storage/'.$user->basicInfo->profile_picture) : asset('assets/img/default_profile_picture.jpg')); ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">                </div>
              </div>

              <div class="col-10 my-auto">
                <div class="h-100">
                  <h5 class="mb-1">
                    <?php echo e(ucfirst($user->name)); ?>

                  </h5>
                  <p class="mb-0 font-weight-bold text-sm">
                    <?php echo e(ucfirst($user->email)); ?>

                    <br /> <?php echo e(ucfirst($user->user_type)); ?> / <?php echo e(ucfirst($userJobTitle)); ?>

                  </p>
                 
                </div>
              </div>
              <div class="col-auto my-auto">
                <span wire:click="editRecord( <?php echo e($user->id); ?>, 'App\\Models\\User', 'User')" style="cursor: pointer" >
                  <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                </span>
              </div>

              

            </div>
          </div>
        </div>
        <div class="container-fluid py-4">
          <div class="row">

            <div class="col-12 col-xl-5 mb-5">
              <div class="card h-100 p-3">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Basic Information</h6>
                    </div>
                    <div class="col-md-4 text-end">

                      <!--[if BLOCK]><![endif]--><?php if($user->basicInfo): ?>
                        <span wire:click="editRecord( <?php echo e($user?->basicInfo?->id); ?>, 'App\\Modules\\User\\Models\\BasicInfo', 'BasicInfo')" style="cursor: pointer" >
                          <i class="fas fa-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Basic Info"></i>
                        </span>
                      <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <!--[if BLOCK]><![endif]--><?php if($user->basicInfo): ?>
                    <p class="text-sm">
                    <?php echo e($user->basicInfo?->about_me); ?>

                    </p>
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; <?php echo e($user->name); ?></li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; <?php echo e($user->basicInfo?->gender); ?></li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date of Birth:</strong> &nbsp; <?php echo e($user->basicInfo?->date_of_birth); ?></li>

                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; <?php echo e($user->basicInfo?->phone_number); ?></li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo e($user->basicInfo?->email); ?></li>


                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address Line 1:</strong> &nbsp; <?php echo e($user->basicInfo?->address_line_1); ?></li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address Line 2:</strong> &nbsp; <?php echo e($user->basicInfo?->address_line_2); ?></li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Postal Code:</strong> &nbsp; <?php echo e($user->basicInfo?->postal_code); ?></li>

                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">City:</strong> &nbsp; <?php echo e($user->basicInfo?->city); ?></li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">State:</strong> &nbsp; <?php echo e($user->basicInfo?->state); ?></li>
                      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Country:</strong> &nbsp; <?php echo e($user->basicInfo?->country); ?></li>



                      
                    </ul>
                  <?php else: ?> 
                    <p class="text-sm text-danger font-weight-bold">
                      Basic Information is not added yet by the admin! 
                    </p>
                  <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
              </div>
            </div>

            <div class="col-12 col-xl-7 mb-5">
                <div class="card h-100 p-3">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0"> Employee Profile Information</h6>
                      </div>
                      <div class="col-md-4 text-end">

                        

                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <!--[if BLOCK]><![endif]--><?php if($user->profile()): ?>
                      <hr class="horizontal gray-light my-4">
                      <ul class="list-group">

                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Employee ID:</strong> &nbsp; <?php echo e($user->profile()?->employee_id); ?></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Job Title:</strong> &nbsp; <?php echo e($user->profile()?->jobTitle->title); ?></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Employment Type:</strong> &nbsp; <?php echo e($user->profile()?->jobTitle->employment_type); ?></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Primary Role:</strong> &nbsp; <?php echo e($user->profile()?->role->name); ?></li>

                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Department:</strong> &nbsp; <?php echo e($user->profile()?->department); ?></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Designation:</strong> &nbsp; <?php echo e($user->profile()?->designation); ?></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Meporting Manager:</strong> &nbsp; <?php echo e($user->profile()?->reportingManager?->name); ?></li>

                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Joining Date:</strong> &nbsp; <?php echo e($user->profile()?->joining_date); ?></li>
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Work Location:</strong> &nbsp; <?php echo e($user->profile()?->jobTitle->work_location); ?></li>


                        
                      </ul>
                      <?php else: ?> 
                      <p class="text-sm text-danger font-weight-bold">
                        Profile Information is not added yet by the admin! 
                      </p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                  </div>
                </div>
            </div>


          </div>

        </div>






    

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.form-manager', ['model' => 'App\\Models\\User','modalId' => 'User','hiddenFields' => [
      'onEditForm' => ['roles'], 'onQuery' => ['roles'],
    ]]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4274199248-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.form-manager', ['model' => 'App\\Modules\\User\\Models\\BasicInfo','modalId' => 'BasicInfo','readOnlyFields' => ['user_id']]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4274199248-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.form-manager', ['model' => 'App\\Modules\\Hr\\Models\\EmployeeProfile','modalId' => 'EmployeeProfile','readOnlyFields' => ['user_id']]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4274199248-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>


    </div>











<?php /**PATH /home/quickerf/public_html/suites.quickerfaster.com/app/Modules/User/Resources/views/profile.blade.php ENDPATH**/ ?>