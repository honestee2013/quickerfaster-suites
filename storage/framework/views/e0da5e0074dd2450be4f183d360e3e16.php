<!DOCTYPE html>

<?php if(\Request::is('rtl')): ?>
    <html dir="rtl" lang="ar">
<?php else: ?>
    <html lang="en">
<?php endif; ?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/img/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.png')); ?>">

    <title>
        Module Name to be here
    </title>

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="<?php echo e(asset('assets/css/nucleo-icons.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/nucleo-svg.css')); ?>" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo e(asset('assets/css/soft-ui-dashboard.css?v=1.0.3')); ?>" rel="stylesheet" />
    <style>
        /* Hiding the checkbox, but allowing it to be focused */
        .badgebox {
            opacity: 0;
        }

        .badgebox+.badge {
            /* Move the check mark away when unchecked */
            text-indent: -999999px;
            /* Makes the badge's width stay the same checked and unchecked */
            width: 27px;
            background: inherit;
        }

        .badgebox:focus+.badge {
            /* Set something to make the badge looks focused */
            /* This really depends on the application, in my case it was: */

            /* Adding a light border */
            box-shadow: inset 0px 0px 5px;
            /* Taking the difference out of the padding */
        }

        .badgebox:checked+.badge {
            /* Move the check mark back when checked */
            text-indent: 0;
        }



        .sidebar-icon {
            height: 2.3em;
            width: 2.3em;
            padding: 0.7em;

            border-radius: 1em;
            text-align: center;

            background-color: rgba(250, 250, 250, 1);
            color: rgba(000, 000, 000, 0.6);

            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;

            box-shadow: 0 0.25rem 0.375rem -0.0625rem rgba(20, 20, 20, 0.12), 0 0.125rem 0.25rem -0.0625rem rgba(20, 20, 20, 0.07) !important;
            margin-right: 0em !important;
        }


        .module-control-input {
            height: 2.6em;
            padding: 0em 1em;
            min-width: 10em;
        }


        .small-control {
            height: 2.2em;
            margin: 0em;
        }

        button.small-control {
            height: 2.4em;
        }

        #sidebarLogo {
            margin-left: 20px;
        }
    </style>












    <style>
        /* Flex container for sidebar and content */
        #wrapper {
            display: flex;
            min-height: 100vh;
            transition: margin 0.3s;
        }

        /* Sidebar base */
        .sidebar {
            box-shadow: 0 0.25rem 0.375rem -0.0625rem rgba(20, 20, 20, 0.12), 0 0.125rem 0.25rem -0.0625rem rgba(20, 20, 20, 0.07) !important;
            color: #67748e;
            font-weight: 500;
            font-family: "Open Sans";
            font-size: 0.9em;
            overflow-x: hidden;
            transition: width 0.3s;
            height: 100vh;
            transition: width 0.3s ease;
        }



        /* Sidebar states */
        .sidebar.full {
            width: 250px;
        }

        .sidebar.icons {
            width: 80px;
        }

        .sidebar.hidden {
            width: 0;
        }

        /* Main content styles */
        .content {
            flex: 1;
            transition: margin 0.3s;
        }

        /* Menu item styling */
        .menu-item {
            padding: 0.5em;
            margin: 0em 0.8em;
        }

        .menu-text {
            margin: 0em 0.5em;
        }

        .menu-item,
        .submenu,
        .submenu-popup {
            cursor: pointer;
            position: relative;
            border-radius: 0.5em;
            /* Adjust the radius value to control the roundness */
            color: #67748e;
            font-weight: 500;
            font-family: "Open Sans";
            font-size: 0.97em;

        }

        .menu-item i {
            margin-right: 10px;
        }

        .menu-item:hover, .menu-item.active {
            background: #fff;
            font-weight: bold;
        }


        .menu-item:hover .sidebar-icon, .menu-item.active .sidebar-icon {
            background: #cb0c9f;
            color: #fff;
        }



        /* Inline submenu for full state */
        .submenu {
            display: none;
            padding: 0em;
        }

        .submenu.active {
            display: block;
        }

        .submenu a, .submenu-popup a {
            display: block;
            padding: 0.5em 0em 0.5em 2.5em;
            margin: 0.5em 0.8em;
            text-decoration: none;
        }

        .submenu a:hover,
        .submenu a.active,
        .submenu-popup a:hover,
        .submenu-popup a.active
        {
            background: rgba(103, 116, 142, 0.1);
            /* Added transparency (alpha value of 0.5) */
            color: #67024f;
            border-radius: 0.5em;
            /* Adjust the radius value to control the roundness */
        }
        
        .menu-item, .submenu {
          margin-top: 0.5em;
          margin-bottom: 0.5em;
        }
        








        /* Popup submenu for icon state */
        .submenu-popup {
            position: absolute;
            left: 80px;
            top: 0;
            background:  rgba(255, 255, 255, 0.9);
            
            box-shadow: 0 0.25rem 0.375rem -0.0625rem rgba(20, 20, 20, 0.12), 0 0.125rem 0.25rem -0.0625rem rgba(20, 20, 20, 0.07) !important;
            border-radius: 0.3em;
            border: solid 0.1em rgba(170, 171, 174, 0.5);
            z-index: 1100;
            min-width: 150px;
        }

        .submenu-popup a {
            display: block;
            padding-left: 1em;
            text-decoration: none;
            font-size: 0.9em;

        }





       

        /* Toggle button is fixed so it’s always visible */
        .toggle-btn {
            position: fixed;
            top: 10px;
            z-index: 1300;
            background-color: #007bff;
            border: none;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: left 0.3s;
        }


        .menu-item-header, .menu-item-footer {
          padding: 1.5em;
          margin: 0em;
          background: #F8F9FA;
          border-radius: 0em;
        }

        .menu-header, .menu-footer {
          position: sticky;
          z-index: 10;
        }

        .menu-header {
          top: 0;
        }
        .menu-footer {
          bottom: 0;
        }

     




        /* Responsive default sidebar widths (for first load) */
        @media (max-width: 576px) {
            .sidebar {
                width: 0;
            }
        }

        @media (min-width: 577px) and (max-width: 992px) {
            .sidebar {
                width: 80px;
            }
        }

        @media (min-width: 993px) {
            .sidebar {
                width: 250px;
            }
        }


        .sidebar.icons .menu-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10px;
        }

        .sidebar.icons .menu-item .menu-text {
            display: block;
            font-size: 12px;
            margin-top: 5px;
        }



        .sidebar .menu-item {
            transition: all 0.3s ease;
        }

        .sidebar .menu-item .menu-text {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }




        .navbar-nav {
            padding: 0.7em;

        }


        .navbar-nav .nav-link {
            padding: 0.5em 1em;
            font-size: 14px;
            color: #344767;
            text-decoration: none;
        }

        .navbar-nav .nav-link:hover {
            background-color: #f8f9fa;
            color: #d94fb9;
        }

        .navbar-nav .nav-link.active {
            background-color: #f8f9fa;
            color: #d94fb9;
        }

        .navbar-nav .nav-link i {
            margin-right: 0.5em;
        }

        .navbar-nav .nav-link span {
            font-size: 14px;
            font-weight: 500;
        }

        #toggleSidebar {
            z-index: 130 !important;
        }
    </style>
</head>

<body
    class="g-sidenav-show  bg-gray-100 <?php echo e(\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')); ?> ">



    <?php if(auth()->guard()->check()): ?>
        <div id="wrapper" class="flex-nowrap">




            
            <?php echo e($sidebar ?? ''); ?>


            <div class="content" style="overflow-x: scroll" id="contentArea">
                
                
                <?php if (isset($component)) { $__componentOriginal168c12c5f1c4a185ac20bb861b2587f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal168c12c5f1c4a185ac20bb861b2587f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.navbars.auth.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.navbars.auth.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal168c12c5f1c4a185ac20bb861b2587f4)): ?>
<?php $attributes = $__attributesOriginal168c12c5f1c4a185ac20bb861b2587f4; ?>
<?php unset($__attributesOriginal168c12c5f1c4a185ac20bb861b2587f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal168c12c5f1c4a185ac20bb861b2587f4)): ?>
<?php $component = $__componentOriginal168c12c5f1c4a185ac20bb861b2587f4; ?>
<?php unset($__componentOriginal168c12c5f1c4a185ac20bb861b2587f4); ?>
<?php endif; ?>

                <div class="container-fluid py-4">

                    
                    <?php echo e($pageHeader ?? ''); ?>



                    
                    <?php echo e($slot); ?>



                    
                    <?php echo e($pageFooter ?? ''); ?>


                    <?php if (isset($component)) { $__componentOriginal081e34c3d0ddbb7de933797df04d6629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal081e34c3d0ddbb7de933797df04d6629 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'core.views::components.layouts.footers.auth.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('core.views::layouts.footers.auth.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal081e34c3d0ddbb7de933797df04d6629)): ?>
<?php $attributes = $__attributesOriginal081e34c3d0ddbb7de933797df04d6629; ?>
<?php unset($__attributesOriginal081e34c3d0ddbb7de933797df04d6629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal081e34c3d0ddbb7de933797df04d6629)): ?>
<?php $component = $__componentOriginal081e34c3d0ddbb7de933797df04d6629; ?>
<?php unset($__componentOriginal081e34c3d0ddbb7de933797df04d6629); ?>
<?php endif; ?>
                </div>
            </div>







        </div>
        </div>



        <!-- Toggle button placed outside the sidebar so it stays visible -->
        <button id="toggleSidebar" class="toggle-btn bg-gradient-primary">
            <i id="toggleIcon" class="bi"></i>
        </button>




    <?php endif; ?>


    

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
        < /scrip>










        <
        !-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --ORIGINAL LINKS-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- - >

        <?php if(session()->has('success')): ?>
            <
            div x - data = "{ show: true }"
            x - init = "setTimeout(() => show = false, 4000)"
            x - show = "show"
            class = "position-fixed bg-success rounded right-3 text-sm py-2 px-4" >
            <
            p class = "m-0" > <?php echo e(session('success')); ?> < /p> <
                /div>
        <?php endif; ?>

        <
        !--Core JS Files-- >
        <
        script src = "<?php echo e(asset('assets/js/core/popper.min.js')); ?>" >
    </script>
    
    <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/smooth-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/chartjs.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('rtl'); ?>
    <?php echo $__env->yieldPushContent('dashboard'); ?>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo e(asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3')); ?>"></script>


    <!----------------------------------- Plugins ---------------------------------->
    <!------------- Flat Date Picker JS -------------->
    <script src="<?php echo e(asset('assets/js/plugins/flatpickr.min.js')); ?>"></script>

    <!------------- Flat Date Picker JS ENDS -------------->

    <!------------------- Sweet Alert JS ------------------>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--<script src="<?php echo e(asset('assets/js/plugins/sweetalert.min.js')); ?>"></script>-->

    <!------------ PDF File ------------>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!------------ Crest App code generator supporting code ------------>
    <script src="<?php echo e(asset('assets/js/crest-apps/code-generator-ui.js')); ?>"></script>




</body>

</html>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/app/Modules/Core/Resources/views/components/layouts/app.blade.php ENDPATH**/ ?>