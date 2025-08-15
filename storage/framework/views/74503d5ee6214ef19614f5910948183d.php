<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                    <?php echo e(str_replace('-', ' ', Request::path())); ?></li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize"><?php echo e(str_replace('-', ' ', Request::path())); ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            
            
            <ul class="navbar-nav  justify-content-end">

                


                <?php if(auth()->guard()->check()): ?>
                    <div class="dropdown ">
                        <a href="#" class=" bg-none dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                            <i class="fa fa-user me-sm-1"></i> <span class="font-weight-bold ">Welcome <?php echo e(auth()->user()?->name); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="navbarDropdownMenuLink2">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="<?php echo e(url('/user/my-profile')); ?>" >
                                    <i class="fa fa-user-edit me-sm-1"></i> My Profile
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="<?php echo e(url('/logout')); ?>" >
                                    <i class="fa fa-sign-out me-sm-1"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>

                
                
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<?php /**PATH /Users/mac/LaravelProjects/quickerfaster-suites/app/Modules/Core/Resources/views/components/layouts/navbars/auth/nav.blade.php ENDPATH**/ ?>