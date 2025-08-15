<!DOCTYPE html>

<!--[if BLOCK]><![endif]-->    <html lang="en">
<!--[if ENDBLOCK]><![endif]-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="VFGDMpuBQi5AW5F8iMd5C1Hg2KwnlOHvisXOzE5c">

    <link rel="apple-touch-icon" sizes="76x76" href="http://localhost:8000/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="http://localhost:8000/assets/img/favicon.png">

    <title>
        Module Name to be here
    </title>

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="http://localhost:8000/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="http://localhost:8000/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- CSS Files -->
    <link id="pagestyle" href="http://localhost:8000/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
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
            margin-right:0.5em;
            border-radius: 1em;
            text-align: center;

            background-color: rgba(250, 250, 250, 1);
            color:  rgba(000, 000, 000, 0.6);
            box-shadow: 0.1em 0.1em 0.5em  rgba(000, 000, 000, 0.1);

            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;

            box-shadow: 0 0.25rem 0.375rem -0.0625rem rgba(20, 20, 20, 0.12), 0 0.125rem 0.25rem -0.0625rem rgba(20, 20, 20, 0.07) !important;

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
      color: #67024f;
      overflow-x: hidden;
      transition: width 0.3s;
      height: 100vh;
      transition: width 0.3s ease;
    

    }
    /* Sidebar states */
    .sidebar.full   { width: 250px; }
    .sidebar.icons  { width: 80px; }
    .sidebar.hidden { width: 0; }
    
    /* Main content styles */
    .content {
      flex: 1;
      transition: margin 0.3s;
    }
    
    /* Menu item styling */
    .menu-item {
      padding: 15px;
      cursor: pointer;
      position: relative;
    }
    .menu-item i { margin-right: 10px; }
    .menu-item:hover { background: #67024f; color: #fff; }
    
    /* Inline submenu for full state */
    .submenu {
      display: none;
      background: #8a026b;
      padding-left: 20px;
    }
    .submenu.active { display: block; }
    .submenu a {
      display: block;
      padding: 10px 15px;
      color: #fff;
      text-decoration: none;
    }
    .submenu a:hover { background: #6c757d; }
    
    /* Popup submenu for icon state */
    .submenu-popup {
      position: absolute;
      left: 80px;
      top: 0;
      background: #495057;
      border: 1px solid #6c757d;
      z-index: 1100;
      min-width: 150px;
    }
    .submenu-popup a {
      padding: 10px;
      display: block;
      color: #fff;
      text-decoration: none;
    }
    .submenu-popup a:hover { background: #6c757d; }
    
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
    
    /* Responsive default sidebar widths (for first load) */
    @media (max-width: 576px)  { .sidebar { width: 0; } }
    @media (min-width: 577px) and (max-width: 992px)  { .sidebar { width: 80px; } }
    @media (min-width: 993px) { .sidebar { width: 250px; } }


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
<body class="g-sidenav-show  bg-gray-100  ">


    
    <!--[if BLOCK]><![endif]-->  <div id="wrapper" class="flex-nowrap">

      

       
        
        <div id="sidebar" class="sidebar col-1 border-0 border-radius-xl my-3 fixed-start ms-3 ">

  <ul class="navbar-nav">
    <div class="sidenav-header">
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap text-primary text-gradient" href="/core/modules">
       
        <i id="sidebarLogo" class="fas fa-th-large fs-5"></i>
        <span id = "sidebarLogoText" class="ms-3 font-weight-bold"> System Modules</span>
    </a>


</div>

<hr class="horizontal dark mt-0" />


<li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/dashboard"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-tachometer-alt sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Dashboard</span>
    </a>
</li>


        <hr class = 'horizontal dark' /> 

<!--[if BLOCK]><![endif]-->    <li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/users"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-users sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Manage Users</span>
    </a>
</li>
<!--[if ENDBLOCK]><![endif]-->


    <li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/job-titles"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-briefcase sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Job Titles</span>
    </a>
</li>
<!--[if ENDBLOCK]><![endif]-->


    <li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/employee-profiles"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-id-card-alt sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Employee Profiles</span>
    </a>
</li>
<!--[if ENDBLOCK]><![endif]-->


    <li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/user-statuses"  target="">
        <span width="12px" height="12px">
            <i  class="fas fas fa-user-tie sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Manage User Statuses</span>
    </a>
</li>
<!--[if ENDBLOCK]><![endif]-->


    <li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/user-status-categories"  target="">
        <span width="12px" height="12px">
            <i  class="fas fas fa-user-friends sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">User Status  Categories</span>
    </a>
</li>
<!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]-->
    <li class="nav-item mt-4">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Security</h6>
    </li>



    <li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/access/access-control-management/user"  target="_blank">
        <span width="12px" height="12px">
            <i  class="fas fa-key sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Control User Access</span>
    </a>
</li>
<!--[if ENDBLOCK]><![endif]-->



<li class="nav-item mt-4">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Configurations</h6>
</li>

<li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/setup"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-tools sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Setup</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/settings"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-wrench sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Settings</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/advance"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-gear sidebar-icon"></i>
        </span>
      <span class="nav-link-text ms-1">Advance</span>
    </a>
</li>
  </ul>
</div>

        <div class="content" style="overflow-x: scroll" id="contentArea">
            
            
            <!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                    user/users</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">user/users</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            
            
            <ul class="navbar-nav  justify-content-end">

                


                <!--[if BLOCK]><![endif]-->                    <div class="dropdown ">
                        <a href="#" class=" bg-none dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                            <i class="fa fa-user me-sm-1"></i> <span class="font-weight-bold ">Welcome Super Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="navbarDropdownMenuLink2">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="http://localhost:8000/user/my-profile" >
                                    <i class="fa fa-user-edit me-sm-1"></i> My Profile
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="http://localhost:8000/logout" >
                                    <i class="fa fa-sign-out me-sm-1"></i> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                <!--[if ENDBLOCK]><![endif]-->

                
                
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

            <div class="container-fluid py-4">

                
                <div class="card m-0 p-0">
    <!--[if BLOCK]><![endif]-->        <div class="card-header">
            <h4 class="mb-4 mt-3 ms-md-3">Users Management</h4>
        </div>
    <!--[if ENDBLOCK]><![endif]-->



    <div class="card-body m-0 p-0">


                
                <div class="mb-2 mx-md-4">
    <ul class="nav nav-tabs">
        


            <li class="nav-item">
    <a class="nav-link active" href="http://localhost:8000/user/users"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-user"></i>
        </span>
      <span class="nav-link-text ms-1">Manage Users</span>
    </a>
</li>

    <li class="nav-item">
    <a class="nav-link " href="http://localhost:8000/user/basic-infos"  target="">
        <span width="12px" height="12px">
            <i  class="fas fa-address-card"></i>
        </span>
      <span class="nav-link-text ms-1">Basic Info</span>
    </a>
</li>

    </ul>
 </div>


    <section wire:snapshot="{&quot;data&quot;:{&quot;configFileName&quot;:null,&quot;config&quot;:[{&quot;model&quot;:&quot;App\\Models\\User&quot;,&quot;fieldDefinitions&quot;:[{&quot;name&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;validation&quot;:&quot;required&quot;,&quot;label&quot;:&quot;Name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;email&quot;,&quot;validation&quot;:&quot;required|email|unique:users,email&quot;,&quot;label&quot;:&quot;Email&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_status_id&quot;:[{&quot;field_type&quot;:&quot;select&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;column&quot;:&quot;display_name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;type&quot;:&quot;hasOne&quot;,&quot;display_field&quot;:&quot;display_name&quot;,&quot;dynamic_property&quot;:&quot;userStatus&quot;,&quot;foreign_key&quot;:&quot;user_status_id&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Status&quot;,&quot;display&quot;:&quot;block&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email_verified_at&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;datetime&quot;,&quot;label&quot;:&quot;Email Verified At&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;validation&quot;:&quot;required|min:8|confirmed&quot;,&quot;label&quot;:&quot;Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password_confirmation&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;label&quot;:&quot;Confirm Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;remember_token&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;label&quot;:&quot;Remember Token&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_type&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;select&quot;,&quot;validation&quot;:&quot;required|string:max:255&quot;,&quot;options&quot;:[{&quot;Employee&quot;:&quot;Employee&quot;,&quot;Customer&quot;:&quot;Customer&quot;,&quot;Supplier&quot;:&quot;Supplier&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Type&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;roles&quot;:[{&quot;field_type&quot;:&quot;checkbox&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;column&quot;:&quot;name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;type&quot;:&quot;belongsToMany&quot;,&quot;display_field&quot;:&quot;name&quot;,&quot;dynamic_property&quot;:&quot;roles&quot;,&quot;multiSelect&quot;:true,&quot;foreign_key&quot;:&quot;role_id&quot;,&quot;inlineAdd&quot;:true},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Roles&quot;,&quot;display&quot;:&quot;inline&quot;,&quot;multiSelect&quot;:true,&quot;validation&quot;:&quot;required&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;hiddenFields&quot;:[{&quot;onTable&quot;:[[&quot;password&quot;,&quot;remember_token&quot;,&quot;email_verified_at&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onNewForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onDetail&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onEditForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onQuery&quot;:[{&quot;1&quot;:&quot;remember_token&quot;,&quot;2&quot;:&quot;password_confirmation&quot;,&quot;3&quot;:&quot;remember_token&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;simpleActions&quot;:[[&quot;show&quot;,&quot;edit&quot;,&quot;delete&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;isTransaction&quot;:false,&quot;dispatchEvents&quot;:false,&quot;controls&quot;:&quot;all&quot;,&quot;fieldGroups&quot;:[[[{&quot;title&quot;:&quot;Basic Information&quot;,&quot;groupType&quot;:&quot;hr&quot;,&quot;fields&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_type&quot;,&quot;user_status_id&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],[{&quot;title&quot;:&quot;Password&quot;,&quot;groupType&quot;:&quot;hr&quot;,&quot;fields&quot;:[[&quot;password&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],[{&quot;fields&quot;:[{&quot;3&quot;:&quot;email_verified_at&quot;,&quot;6&quot;:&quot;remember_token&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}]],{&quot;s&quot;:&quot;arr&quot;}],&quot;moreActions&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;columns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;email_verified_at&quot;,&quot;password&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;visibleColumns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;email_verified_at&quot;,&quot;password&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;multiSelectFormFields&quot;:[{&quot;roles&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;singleSelectFormFields&quot;:[{&quot;user_type&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;modelName&quot;:&quot;User&quot;,&quot;recordName&quot;:&quot;User&quot;,&quot;moduleName&quot;:&quot;User&quot;,&quot;model&quot;:&quot;App\\Models\\User&quot;,&quot;controls&quot;:[{&quot;0&quot;:&quot;addButton&quot;,&quot;files&quot;:[{&quot;export&quot;:[[&quot;xls&quot;,&quot;csv&quot;,&quot;pdf&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;import&quot;:[[&quot;xls&quot;,&quot;csv&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;0&quot;:&quot;print&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;bulkActions&quot;:[{&quot;export&quot;:[[&quot;xls&quot;,&quot;csv&quot;,&quot;pdf&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;0&quot;:&quot;delete&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;perPage&quot;:[[5,10,25,50,100,200,500],{&quot;s&quot;:&quot;arr&quot;}],&quot;1&quot;:&quot;search&quot;,&quot;2&quot;:&quot;showHideColumns&quot;,&quot;3&quot;:&quot;filterColumns&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;columns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;email_verified_at&quot;,&quot;password&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;visibleColumns&quot;:[{&quot;0&quot;:&quot;name&quot;,&quot;1&quot;:&quot;email&quot;,&quot;2&quot;:&quot;user_status_id&quot;,&quot;7&quot;:&quot;user_type&quot;,&quot;8&quot;:&quot;roles&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;fieldDefinitions&quot;:[{&quot;name&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;validation&quot;:&quot;required&quot;,&quot;label&quot;:&quot;Name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;email&quot;,&quot;validation&quot;:&quot;required|email|unique:users,email&quot;,&quot;label&quot;:&quot;Email&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_status_id&quot;:[{&quot;field_type&quot;:&quot;select&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;column&quot;:&quot;display_name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;type&quot;:&quot;hasOne&quot;,&quot;display_field&quot;:&quot;display_name&quot;,&quot;dynamic_property&quot;:&quot;userStatus&quot;,&quot;foreign_key&quot;:&quot;user_status_id&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Status&quot;,&quot;display&quot;:&quot;block&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email_verified_at&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;datetime&quot;,&quot;label&quot;:&quot;Email Verified At&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;validation&quot;:&quot;required|min:8|confirmed&quot;,&quot;label&quot;:&quot;Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password_confirmation&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;label&quot;:&quot;Confirm Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;remember_token&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;label&quot;:&quot;Remember Token&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_type&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;select&quot;,&quot;validation&quot;:&quot;required|string:max:255&quot;,&quot;options&quot;:[{&quot;Employee&quot;:&quot;Employee&quot;,&quot;Customer&quot;:&quot;Customer&quot;,&quot;Supplier&quot;:&quot;Supplier&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Type&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;roles&quot;:[{&quot;field_type&quot;:&quot;checkbox&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;column&quot;:&quot;name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;type&quot;:&quot;belongsToMany&quot;,&quot;display_field&quot;:&quot;name&quot;,&quot;dynamic_property&quot;:&quot;roles&quot;,&quot;multiSelect&quot;:true,&quot;foreign_key&quot;:&quot;role_id&quot;,&quot;inlineAdd&quot;:true},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Roles&quot;,&quot;display&quot;:&quot;inline&quot;,&quot;multiSelect&quot;:true,&quot;validation&quot;:&quot;required&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;fieldGroups&quot;:[[[{&quot;title&quot;:&quot;Basic Information&quot;,&quot;groupType&quot;:&quot;hr&quot;,&quot;fields&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_type&quot;,&quot;user_status_id&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],[{&quot;title&quot;:&quot;Password&quot;,&quot;groupType&quot;:&quot;hr&quot;,&quot;fields&quot;:[[&quot;password&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],[{&quot;fields&quot;:[{&quot;3&quot;:&quot;email_verified_at&quot;,&quot;6&quot;:&quot;remember_token&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}]],{&quot;s&quot;:&quot;arr&quot;}],&quot;multiSelectFormFields&quot;:[{&quot;roles&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;singleSelectFormFields&quot;:[{&quot;user_type&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;simpleActions&quot;:[[&quot;show&quot;,&quot;edit&quot;,&quot;delete&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;moreActions&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;hiddenFields&quot;:[{&quot;onTable&quot;:[[&quot;password&quot;,&quot;remember_token&quot;,&quot;email_verified_at&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onNewForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onEditForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onQuery&quot;:[[&quot;remember_token&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onDetail&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;readOnlyFields&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;isEditMode&quot;:null,&quot;selectedItem&quot;:null,&quot;sortField&quot;:&quot;id&quot;,&quot;sortDirection&quot;:&quot;asc&quot;,&quot;perPage&quot;:10,&quot;modalCount&quot;:0,&quot;refreshModalCount&quot;:20,&quot;modalStack&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;modalCache&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;feedbackMessages&quot;:&quot;&quot;,&quot;pageTitle&quot;:&quot;Users Overview&quot;,&quot;queryFilters&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;modalId&quot;:&quot;addEditModal&quot;},&quot;memo&quot;:{&quot;id&quot;:&quot;UyVUQ0khscruMaq66sT4&quot;,&quot;name&quot;:&quot;data-tables.data-table-manager&quot;,&quot;path&quot;:&quot;user\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:{&quot;addEditModal&quot;:[&quot;div&quot;,&quot;E6MhN61T6T2GgXK60nzd&quot;],&quot;lw-2899835366-0&quot;:[&quot;div&quot;,&quot;V1hSZwdOLncA2S9Ad4Fl&quot;],&quot;lw-2899835366-1&quot;:[&quot;div&quot;,&quot;KhtQ0MPinlzhMqB83q1z&quot;]},&quot;scripts&quot;:[&quot;917102693-0&quot;],&quot;assets&quot;:[&quot;2068970412-0&quot;],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;d6ed1c97c3333bcf1fff969eec0fd3e4dac1930e386d0805c45f14d98012e851&quot;}" wire:effects="{&quot;scripts&quot;:{&quot;917102693-0&quot;:&quot;    &lt;script&gt;\n        document.addEventListener(&#039;livewire:initialized&#039;, function() {\n\n\n\n                \/\/\/************ PRINT EVENT  *************\/\/\/\n                Livewire.on(&#039;print-table-event&#039;, (event) =&gt; {\n                    printTable();\n                });\n\n\n\n\n            \/\/\/************ MODALS FOR ADD-EDIT   *************\/\/\/\n            Livewire.on(&#039;open-modal-event&#039;, function(event) {\n                let modalId = event[0].modalId;\n\n                let modalWrapper = null;\n                modalWrapper = document.getElementById(modalId);\n                modalWrapper.style.zIndex = 1040 + (parseInt(modalId)); \/\/ Adjust starting value if needed\n                modalWrapper.classList.add(&#039;is-open&#039;);\n                modalWrapper.style.visibility = \&quot;visible !important\&quot;;\n            });\n\n            Livewire.on(&#039;close-modal-event&#039;, function(event) {\n                componentIds = event[0].componentIds;\n                const modalWrapper = document.getElementById(event[0].modalId);\n\n                if (!modalWrapper) return;\n\n                modalWrapper.classList.remove(&#039;is-open&#039;); \/\/ Start closing animation\n                \/\/ Wait for animation to finish before removing the modal\n                \/*setTimeout(() =&gt; {\n                    if (event[0].modalId != \&quot;addEditModal\&quot;) \/\/ Dont remove the parent modal [addEditModal]\n                        modalWrapper.remove();\n                }, 800); \/\/ Adjust timing to match your CSS transition duration*\/\n            });\n\n\n\n\n\n            \/\/\/************ CHILD MODAL HANDLING   *************\/\/\/\n            \/\/ Function to set the child modal content dynamically\n            function setChildModalContent(modalHtml) {\n                let container = document.createElement(&#039;div&#039;);\n                document.body.insertBefore(container, document.body.firstChild);\n\n                let temp = container.innerHTML;\n                container.innerHTML = \&quot; \&quot;;\n                container.innerHTML = modalHtml + temp;\n\n                \/\/ Use outerHTML to properly add wire:ignore\n                \/\/container.outerHTML = container.outerHTML.replace(&#039;&lt;div&#039;, &#039;&lt;div wire:ignore.self&#039;);\n            }\n\n\n            \/\/\/************ CHILD MODAL OPEN EVENT  *************\/\/\/\n            Livewire.on(&#039;open-child-modal-event&#039;, (event) =&gt; {\n                \/\/ Set the child modal content\n                const modalHtml = event[0].modalHtml; \/\/ Or event[0].modalHtml if it&#039;s an array\n                const modalId = event[0].modalId; \/\/ Or event[0].modalId if it&#039;s an array\n\n                setChildModalContent(modalHtml);\n\n                Livewire.dispatch(&#039;open-modal-event&#039;, [{\n                    \&quot;modalId\&quot;: modalId\n                }]); \/\/ To show modal\n            });\n\n\n\n            \/\/\/************ SHOW IMAGE CROP MODAL EVENT  *************\/\/\/\n            if (!window.__cropModalListenerRegistered) {\n                window.__cropModalListenerRegistered = true;\n\n                let cropper;\n                Livewire.on(&#039;show-crop-image-modal-event&#039;, (event) =&gt; {\n\n                    \/\/ Data from the Backend\n                    const field = event[0].field;\n                    const imgSrc = event[0].imgUrl;\n                    const modalHtml = event[0].modalHtml;\n                    const modalId = event[0].modalId;\n                    const componentId = event[0].id;\n\n                    \/\/ Get the reference of the LIVEWIRE COMPONENT THAT TRIGER THIS EVENT\n                    const component = Livewire.find(componentId);\n\n                    \/\/ Set the child modal content\n                    setChildModalContent(modalHtml);\n\n                    \/\/ Get the modal element by ID\n                    const modalElement = document.getElementById(modalId);\n\n                    \/\/ Create a new Bootstrap Modal instance\n                    const myModal = new bootstrap.Modal(modalElement, {\n                        keyboard: false \/\/ Optional: Disable closing the modal with keyboard\n                    });\n\n                    \/\/ Show the modal\n                    myModal.show();\n\n                    \/\/ Set up the Cropper.js instance once the modal is fully shown\n                    modalElement.addEventListener(&#039;shown.bs.modal&#039;, function() {\n                        const cropperContainer = document.getElementById(&#039;cropper-image-container&#039; +\n                            modalId);\n\n                        \/\/ Ensure the container has 100% width and appropriate height\n                        cropperContainer.style.width = &#039;100%&#039;;\n                        cropperContainer.style.height = &#039;70vh&#039;; \/\/ Adjust height as needed\n\n                        \/\/ Get the image element (img with empty src must exist for the JCroper.js to work)\n                        const image = document.getElementById(&#039;image-to-crop&#039; +\n                            modalId); \/\/ Ensure you have an image element with this ID\n\n                        if (image) {\n                            image.src = imgSrc;\n                            \/\/ Destroy the old cropper instance if it exists\n                            if (cropper) {\n                                cropper.destroy();\n                            }\n\n                            \/\/ Create the JCripper instance and display the image\n                            cropper = new Cropper(image, {\n                                aspectRatio: 0, \/\/ Set aspect ratio if needed\n                                viewMode: 2, \/\/ Adjust the view mode as needed\n                                autoCropArea: 1, \/\/ Optional: Set the initial crop area to cover the entire image\n                                responsive: true \/\/ Optional: Enable responsive mode\n                            });\n\n                            \/\/ Track button click for saving the croped image\n                            document.getElementById(&#039;save-croped-image&#039; + modalId).addEventListener(\n                                &#039;click&#039;,\n                                function() {\n                                    \/\/ Get the cropped image data URL\n                                    const croppedImage = cropper.getCroppedCanvas().toDataURL(\n                                        &#039;image\/jpeg&#039;);\n\n                                    \/\/ Emit the event to Livewire with the Base64 image data\n                                    if (component) {\n                                        \/\/ Call the method on the correct component instance\n                                        component.call(&#039;saveCroppedImage&#039;, field, croppedImage,\n                                            component.id);\n                                    }\n\n                                    \/\/ Close the modal\n                                    myModal.hide();\n                                });\n                        }\n                    });\n\n                })\n\n            }\n\n            \/\/\/****************** SWEET ALEART DIALOGS  *******************\/\/\/\n\n            Livewire.on(&#039;confirm-delete&#039;, (event) =&gt; {\n\n                \/\/ Use the theme&#039;s showSwal function for &#039;warning-message-and-confirmation&#039;\n                \/\/soft.showSwal(&#039;warning-message-and-confirmation&#039;); \/\/ Adjust if needed based on your theme configuration\n\n                \/\/\/************ CONFIRM DELETE  *************\/\/\/\n                Swal.fire({\n                    title: &#039;Are you sure?&#039;,\n                    text: \&quot;You won&#039;t be able to revert this operation!\&quot;,\n                    icon: &#039;warning&#039;,\n                    showCancelButton: true,\n                    confirmButtonText: &#039;Yes, delete it!&#039;,\n                    cancelButtonText: &#039;No, cancel!&#039;,\n                    customClass: {\n                        confirmButton: &#039;btn bg-gradient-success me-3&#039;,\n                        cancelButton: &#039;btn bg-gradient-danger&#039;\n                    },\n                    buttonsStyling: false\n                }).then((result) =&gt; {\n                    if (result.isConfirmed) {\n                        \/\/form.submit();\n                        Livewire.dispatch(&#039;deleteSelectedEvent&#039;);\n                    }\n                });\n\n            });\n\n\n            Livewire.on(&#039;confirm-page-refresh&#039;, (event) =&gt; {\n                \/\/\/************ CONFIRM PAGE REFRESH  *************\/\/\/\n                Swal.fire({\n                    title: &#039;Refreshing!&#039;,\n                    text: \&quot;To improve the performance, the page will be refreshed.\&quot;,\n                    icon: &#039;warning&#039;,\n                    showCancelButton: true,\n                    confirmButtonText: &#039;Refresh&#039;,\n                    cancelButtonText: &#039;Cancel&#039;,\n                    customClass: {\n                        confirmButton: &#039;btn bg-gradient-success me-3&#039;,\n                        cancelButton: &#039;btn bg-gradient-danger&#039;\n                    },\n                    buttonsStyling: false\n                }).then((result) =&gt; {\n                    if (result.isConfirmed) {\n                        location.reload(); \/\/ Refresh web browser page\n                    }\n                });\n\n            });\n\n\n\n\n            \/\/\/************ SUCCESS DIALOG *************\/\/\/\n            window.addEventListener(&#039;swal:success&#039;, function(event) {\n                Swal.fire({\n                    title: event.detail[0].title,\n                    text: event.detail[0].text,\n                    icon: event.detail[0].icon,\n                    showConfirmButton: false,\n                    timer: 2000\n                });\n            });\n\n            \/\/\/************ ERROR DIALOG  *************\/\/\/\n            window.addEventListener(&#039;swal:error&#039;, function(event) {\n\n                Swal.fire({\n                    title: event.detail[0].title,\n                    text: event.detail[0].text,\n                    icon: &#039;error&#039;, \/\/ Use &#039;error&#039; icon\n                    showConfirmButton: true, \/\/ Show the OK button\n                    confirmButtonText: &#039;OK&#039;, \/\/ Text for the OK button\n                    customClass: {\n                        confirmButton: &#039;btn bg-gradient-success me-3&#039;,\n                        cancelButton: &#039;btn bg-gradient-danger&#039;\n                    },\n                });\n            });\n\n\n        });\n    &lt;\/script&gt;\n    &quot;},&quot;listeners&quot;:[&quot;setFeedbackMessageEvent&quot;,&quot;changeFormModeEvent&quot;,&quot;changeSelectedItemEvent&quot;,&quot;openAddRelationshipItemModalEvent&quot;,&quot;checkPageRefreshTimeEvent&quot;,&quot;addModalFormComponentStackEvent&quot;,&quot;closeModalEvent&quot;]}" wire:id="UyVUQ0khscruMaq66sT4" class="m-0 my-md-4">

    
    <div wire:ignore.self id="addEditModal" class="modal-wrapper" wire:key="modal-header-addEditModal">
    <!-- Modal Backdrop -->
    <div class="modal-backdrop" id="modalBackdrop"
        onclick="Livewire.dispatch('close-modal-event', [{'modalId': 'addEditModal' }])"></div>

    <!-- Modal Content -->
    <div class="modal-content  pb-0  mainModal" id="modalContent">
        <h5 class="card-title text-info text-gradient font-weight-bolder p-4 mx-4 mt-2 mb-2 pb-2">
            <!--[if BLOCK]><![endif]-->                New User
            <!--[if ENDBLOCK]><![endif]-->
        </h5>
        <div class="mb-4"><hr class="horizontal dark my-0" /></div>
        <div class="modal-body">





        <div class="card-body">
            
            <div wire:snapshot="{&quot;data&quot;:{&quot;multiSelectFormFields&quot;:[{&quot;roles&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;singleSelectFormFields&quot;:[{&quot;user_type&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;fieldDefinitions&quot;:[{&quot;name&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;validation&quot;:&quot;required&quot;,&quot;label&quot;:&quot;Name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;email&quot;,&quot;validation&quot;:&quot;required|email|unique:users,email&quot;,&quot;label&quot;:&quot;Email&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_status_id&quot;:[{&quot;field_type&quot;:&quot;select&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;column&quot;:&quot;display_name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;type&quot;:&quot;hasOne&quot;,&quot;display_field&quot;:&quot;display_name&quot;,&quot;dynamic_property&quot;:&quot;userStatus&quot;,&quot;foreign_key&quot;:&quot;user_status_id&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Status&quot;,&quot;display&quot;:&quot;block&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email_verified_at&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;datetime&quot;,&quot;label&quot;:&quot;Email Verified At&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;validation&quot;:&quot;required|min:8|confirmed&quot;,&quot;label&quot;:&quot;Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password_confirmation&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;label&quot;:&quot;Confirm Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;remember_token&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;label&quot;:&quot;Remember Token&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_type&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;select&quot;,&quot;validation&quot;:&quot;required|string:max:255&quot;,&quot;options&quot;:[{&quot;Employee&quot;:&quot;Employee&quot;,&quot;Customer&quot;:&quot;Customer&quot;,&quot;Supplier&quot;:&quot;Supplier&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Type&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;roles&quot;:[{&quot;field_type&quot;:&quot;checkbox&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;column&quot;:&quot;name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;type&quot;:&quot;belongsToMany&quot;,&quot;display_field&quot;:&quot;name&quot;,&quot;dynamic_property&quot;:&quot;roles&quot;,&quot;multiSelect&quot;:true,&quot;foreign_key&quot;:&quot;role_id&quot;,&quot;inlineAdd&quot;:true},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Roles&quot;,&quot;display&quot;:&quot;inline&quot;,&quot;multiSelect&quot;:true,&quot;validation&quot;:&quot;required&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;fieldGroups&quot;:[[[{&quot;title&quot;:&quot;Basic Information&quot;,&quot;groupType&quot;:&quot;hr&quot;,&quot;fields&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_type&quot;,&quot;user_status_id&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],[{&quot;title&quot;:&quot;Password&quot;,&quot;groupType&quot;:&quot;hr&quot;,&quot;fields&quot;:[[&quot;password&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],[{&quot;fields&quot;:[{&quot;3&quot;:&quot;email_verified_at&quot;,&quot;6&quot;:&quot;remember_token&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}]],{&quot;s&quot;:&quot;arr&quot;}],&quot;hiddenFields&quot;:[{&quot;onTable&quot;:[[&quot;password&quot;,&quot;remember_token&quot;,&quot;email_verified_at&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onNewForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onEditForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onQuery&quot;:[[&quot;remember_token&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onDetail&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;readOnlyFields&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;columns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;email_verified_at&quot;,&quot;password&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;fields&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;model&quot;:&quot;App\\Models\\User&quot;,&quot;moduleName&quot;:&quot;User&quot;,&quot;modelName&quot;:&quot;User&quot;,&quot;configFileName&quot;:null,&quot;config&quot;:[{&quot;model&quot;:&quot;App\\Models\\User&quot;,&quot;fieldDefinitions&quot;:[{&quot;name&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;validation&quot;:&quot;required&quot;,&quot;label&quot;:&quot;Name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;email&quot;,&quot;validation&quot;:&quot;required|email|unique:users,email&quot;,&quot;label&quot;:&quot;Email&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_status_id&quot;:[{&quot;field_type&quot;:&quot;select&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;column&quot;:&quot;display_name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;type&quot;:&quot;hasOne&quot;,&quot;display_field&quot;:&quot;display_name&quot;,&quot;dynamic_property&quot;:&quot;userStatus&quot;,&quot;foreign_key&quot;:&quot;user_status_id&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Status&quot;,&quot;display&quot;:&quot;block&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email_verified_at&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;datetime&quot;,&quot;label&quot;:&quot;Email Verified At&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;validation&quot;:&quot;required|min:8|confirmed&quot;,&quot;label&quot;:&quot;Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password_confirmation&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;label&quot;:&quot;Confirm Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;remember_token&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;label&quot;:&quot;Remember Token&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_type&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;select&quot;,&quot;validation&quot;:&quot;required|string:max:255&quot;,&quot;options&quot;:[{&quot;Employee&quot;:&quot;Employee&quot;,&quot;Customer&quot;:&quot;Customer&quot;,&quot;Supplier&quot;:&quot;Supplier&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Type&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;roles&quot;:[{&quot;field_type&quot;:&quot;checkbox&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;column&quot;:&quot;name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;type&quot;:&quot;belongsToMany&quot;,&quot;display_field&quot;:&quot;name&quot;,&quot;dynamic_property&quot;:&quot;roles&quot;,&quot;multiSelect&quot;:true,&quot;foreign_key&quot;:&quot;role_id&quot;,&quot;inlineAdd&quot;:true},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Roles&quot;,&quot;display&quot;:&quot;inline&quot;,&quot;multiSelect&quot;:true,&quot;validation&quot;:&quot;required&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;hiddenFields&quot;:[{&quot;onTable&quot;:[[&quot;password&quot;,&quot;remember_token&quot;,&quot;email_verified_at&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onNewForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onDetail&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onEditForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onQuery&quot;:[{&quot;1&quot;:&quot;remember_token&quot;,&quot;2&quot;:&quot;password_confirmation&quot;,&quot;3&quot;:&quot;remember_token&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;simpleActions&quot;:[[&quot;show&quot;,&quot;edit&quot;,&quot;delete&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;isTransaction&quot;:false,&quot;dispatchEvents&quot;:false,&quot;controls&quot;:&quot;all&quot;,&quot;fieldGroups&quot;:[[[{&quot;title&quot;:&quot;Basic Information&quot;,&quot;groupType&quot;:&quot;hr&quot;,&quot;fields&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_type&quot;,&quot;user_status_id&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],[{&quot;title&quot;:&quot;Password&quot;,&quot;groupType&quot;:&quot;hr&quot;,&quot;fields&quot;:[[&quot;password&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],[{&quot;fields&quot;:[{&quot;3&quot;:&quot;email_verified_at&quot;,&quot;6&quot;:&quot;remember_token&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}]],{&quot;s&quot;:&quot;arr&quot;}],&quot;moreActions&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;columns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;email_verified_at&quot;,&quot;password&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;visibleColumns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;email_verified_at&quot;,&quot;password&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;multiSelectFormFields&quot;:[{&quot;roles&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;singleSelectFormFields&quot;:[{&quot;user_type&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;modalId&quot;:&quot;addEditModal&quot;,&quot;selectedItem&quot;:null,&quot;isEditMode&quot;:null,&quot;messages&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;selectedItemId&quot;:null,&quot;selectedRows&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;pageTitle&quot;:&quot;Users Overview&quot;,&quot;queryFilters&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;uploads&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},&quot;memo&quot;:{&quot;id&quot;:&quot;E6MhN61T6T2GgXK60nzd&quot;,&quot;name&quot;:&quot;data-tables.data-table-form&quot;,&quot;path&quot;:&quot;user\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;5252a375628b9e7adbb55934e897c326b145cf59411b3cbff68618fc75a40926&quot;}" wire:effects="{&quot;listeners&quot;:[&quot;openEditModalEvent&quot;,&quot;openAddModalEvent&quot;,&quot;openDetailModalEvent&quot;,&quot;openCropImageModalEvent&quot;,&quot;saveCroppedImageEvent&quot;,&quot;deleteSelectedEvent&quot;,&quot;confirmDeleteEvent&quot;,&quot;resetFormFieldsEvent&quot;,&quot;submitDatatableFormEvent&quot;,&quot;refreshFieldsEvent&quot;,&quot;updateModelFieldEvent&quot;],&quot;dispatches&quot;:[{&quot;name&quot;:&quot;addModalFormComponentStackEvent&quot;,&quot;params&quot;:[{&quot;modalId&quot;:&quot;addEditModal&quot;,&quot;componentId&quot;:&quot;E6MhN61T6T2GgXK60nzd&quot;}]}]}" wire:id="E6MhN61T6T2GgXK60nzd" >

    
    <form role="form text-left" class="p-4 modal-form row" >

        <!--[if BLOCK]><![endif]-->            

            
            <!--[if BLOCK]><![endif]-->                <h6 class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-1">Basic Information</h6>
                <hr class="horizontal dark mt-0" />

            
            <!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]-->
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]-->
                        


                        <!----  FORM FIELDS    ---->
                    <div class=" col-12">
                        <div class="form-group">
                            
                            <!--[if BLOCK]><![endif]-->                                <label class="mt-2 mb-1" for="name">Name</label>
                            <!--[if ENDBLOCK]><![endif]-->


                            <!---- Add  item ---->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->


                            <!--[if BLOCK]><![endif]-->                                <!----------- ANY OTHER INPUT ------------->
                                <div class="input-group">
                                <input type="string" wire:model.defer="fields.name" id="name"
                                    class="form-control" value="" name="name"
                                        placeholder="Please provide the name..."

                                        
                                                                                                                    >

                                    
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            <!--[if ENDBLOCK]><![endif]-->

                            <!----------- Validation Error  ------------->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                <!----  END CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if ENDBLOCK]><![endif]-->
            
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]-->
                        


                        <!----  FORM FIELDS    ---->
                    <div class=" col-12">
                        <div class="form-group">
                            
                            <!--[if BLOCK]><![endif]-->                                <label class="mt-2 mb-1" for="email">Email</label>
                            <!--[if ENDBLOCK]><![endif]-->


                            <!---- Add  item ---->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->


                            <!--[if BLOCK]><![endif]-->                                <!----------- ANY OTHER INPUT ------------->
                                <div class="input-group">
                                <input type="email" wire:model.defer="fields.email" id="email"
                                    class="form-control" value="" name="email"
                                        placeholder="Please provide the email..."

                                        
                                                                                                                    >

                                    
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            <!--[if ENDBLOCK]><![endif]-->

                            <!----------- Validation Error  ------------->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                <!----  END CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if ENDBLOCK]><![endif]-->
            
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]-->
                        


                        <!----  FORM FIELDS    ---->
                    <div class=" col-12">
                        <div class="form-group">
                            
                            <!--[if BLOCK]><![endif]-->                                <label class="mt-2 mb-1" for="user_type">User Type</label>
                            <!--[if ENDBLOCK]><![endif]-->


                            <!---- Add  item ---->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->


                            <!--[if BLOCK]><![endif]-->                                <!--------- Opening the Select Element -------->

                                <!--[if BLOCK]><![endif]-->                                    
                                    <select wire:key="single-select-user_type" wire:model.defer="singleSelectFormFields.user_type"
                                    name = "user_type"  id="user_type"
                                    class="form-control" >

                                <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]-->                                    <option style="display:none" value="">Select User Type...
                                    </option>
                                <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]-->                                    <option value="Employee">Employee</option>
                                                                    <option value="Customer">Customer</option>
                                                                    <option value="Supplier">Supplier</option>
                                <!--[if ENDBLOCK]><![endif]-->

                                </select>
                                <!--------- Closing the Select Element -------->

                            <!--[if ENDBLOCK]><![endif]-->

                            <!----------- Validation Error  ------------->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                <!----  END CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if ENDBLOCK]><![endif]-->
            
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]-->
                        


                        <!----  FORM FIELDS    ---->
                    <div class=" col-12">
                        <div class="form-group">
                            
                            <!--[if BLOCK]><![endif]-->                                <label class="mt-2 mb-1" for="user_status_id">User Status</label>
                            <!--[if ENDBLOCK]><![endif]-->


                            <!---- Add  item ---->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->


                            <!--[if BLOCK]><![endif]-->                                <!--------- Opening the Select Element -------->

                                <!--[if BLOCK]><![endif]-->                                        <select wire:key="select-user_status_id" wire:model.defer="fields.user_status_id" name = "user_status_id"
                                            value= "user_status_id" id="user_status_id" class="form-control"  >
                                <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]-->                                    <option style="display:none" value="">Select User Status...
                                    </option>
                                <!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]-->                                    <option value="1">New Registration</option>
                                                                    <option value="2">Invited</option>
                                                                    <option value="3">Pending First Login</option>
                                                                    <option value="4">Awaiting Profile Completion</option>
                                                                    <option value="5">Profile Setup Incomplete (Critical)</option>
                                                                    <option value="6">Onboarding Pending</option>
                                                                    <option value="7">Onboarding Complete</option>
                                                                    <option value="8">Email Unverified</option>
                                                                    <option value="9">Email Verification Sent</option>
                                                                    <option value="10">Email Verified</option>
                                                                    <option value="11">Pending Email Change Verification</option>
                                                                    <option value="12">Phone Unverified</option>
                                                                    <option value="13">Phone Verification Pending</option>
                                                                    <option value="14">Phone Verified</option>
                                                                    <option value="15">Pending Phone Change Verification</option>
                                                                    <option value="16">Identity Docs Pending Submission</option>
                                                                    <option value="17">Identity Docs Submitted</option>
                                                                    <option value="18">Identity Verification In Review</option>
                                                                    <option value="19">Identity Verified</option>
                                                                    <option value="20">Identity Verification Rejected</option>
                                                                    <option value="21">Identity Resubmission Required</option>
                                                                    <option value="22">Partially Verified</option>
                                                                    <option value="23">Fully Verified</option>
                                                                    <option value="24">Pending Admin Activation</option>
                                                                    <option value="25">Active</option>
                                                                    <option value="26">Inactive (By User)</option>
                                                                    <option value="27">Inactive (System)</option>
                                                                    <option value="28">Dormant</option>
                                                                    <option value="29">Grace Period</option>
                                                                    <option value="30">Password Reset Initiated</option>
                                                                    <option value="31">Password Expired</option>
                                                                    <option value="32">Force Password Change</option>
                                                                    <option value="33">2FA Pending Setup</option>
                                                                    <option value="34">2FA Enabled</option>
                                                                    <option value="35">Locked (Failed Logins)</option>
                                                                    <option value="36">Locked (By Admin)</option>
                                                                    <option value="37">Suspicious Activity Detected</option>
                                                                    <option value="38">Under Admin Review</option>
                                                                    <option value="39">Deactivated (By Admin)</option>
                                                                    <option value="40">Suspended</option>
                                                                    <option value="41">Banned</option>
                                                                    <option value="42">Shadow Banned</option>
                                                                    <option value="43">Limited Access</option>
                                                                    <option value="44">Appeal Pending</option>
                                                                    <option value="45">Pending Deletion (User Request)</option>
                                                                    <option value="46">Pending Deletion (Admin Request)</option>
                                                                    <option value="47">Soft Deleted</option>
                                                                    <option value="48">Permanently Deleted</option>
                                                                    <option value="49">Archived</option>
                                                                    <option value="50">Merged</option>
                                                                    <option value="51">Test Account</option>
                                                                    <option value="52">Guest Account</option>
                                                                    <option value="53">Being Impersonated</option>
                                                                    <option value="54">Migrated</option>
                                                                    <option value="55">Terms Pending Acceptance</option>
                                                                    <option value="56">Terms Accepted</option>
                                                                    <option value="57">Privacy Consent Pending</option>
                                                                    <option value="58">Privacy Consent Given</option>
                                                                    <option value="59">Privacy Consent Revoked</option>
                                <!--[if ENDBLOCK]><![endif]-->

                                </select>
                                <!--------- Closing the Select Element -------->

                            <!--[if ENDBLOCK]><![endif]-->

                            <!----------- Validation Error  ------------->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                <!----  END CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if ENDBLOCK]><![endif]-->
            
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]-->
                        


                        <!----  FORM FIELDS    ---->
                    <div class=" col-12">
                        <div class="form-group">
                            
                            <!--[if BLOCK]><![endif]-->                                <label class="mt-2 mb-1" for="roles">User Roles</label>
                            <!--[if ENDBLOCK]><![endif]-->


                            <!---- Add  item ---->
                            <!--[if BLOCK]><![endif]-->                                    <!-- Button to open the secondary modal to add new items -->
                                    <span role="button" class="badge rounded-pill bg-primary text-xxs"
                                        onclick="Livewire.dispatch('openAddRelationshipItemModalEvent',
                                            [&quot;App\\Modules\\Access\\Models\\Role&quot;
                                            ] )">
                                        Add
                                    </span>
                            <!--[if ENDBLOCK]><![endif]-->


                            <!--[if BLOCK]><![endif]-->
                                <!--------- Checkbox on a horizontal line -------->
                                <!--[if BLOCK]><![endif]--><div><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]-->                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-10" class="form-check-input" type="checkbox"
                                                id="10"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="10"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="10"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            accountant
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-2" class="form-check-input" type="checkbox"
                                                id="2"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="2"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="2"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            admin
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-5" class="form-check-input" type="checkbox"
                                                id="5"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="5"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="5"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            assistant
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-38" class="form-check-input" type="checkbox"
                                                id="38"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="38"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="38"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            auditor
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-36" class="form-check-input" type="checkbox"
                                                id="36"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="36"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="36"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            client_account_manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-37" class="form-check-input" type="checkbox"
                                                id="37"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="37"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="37"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            compliance_officer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-40" class="form-check-input" type="checkbox"
                                                id="40"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="40"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="40"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            consultant
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-23" class="form-check-input" type="checkbox"
                                                id="23"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="23"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="23"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            content_creator
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-35" class="form-check-input" type="checkbox"
                                                id="35"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="35"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="35"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            customer_support
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-28" class="form-check-input" type="checkbox"
                                                id="28"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="28"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="28"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            data_analyst
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-26" class="form-check-input" type="checkbox"
                                                id="26"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="26"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="26"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            developer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-29" class="form-check-input" type="checkbox"
                                                id="29"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="29"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="29"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            doctor
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-9" class="form-check-input" type="checkbox"
                                                id="9"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="9"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="9"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            finance_manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-41" class="form-check-input" type="checkbox"
                                                id="41"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="41"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="41"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            freelancer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-7" class="form-check-input" type="checkbox"
                                                id="7"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="7"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="7"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            hr_assistant
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-6" class="form-check-input" type="checkbox"
                                                id="6"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="6"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="6"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            hr_manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-39" class="form-check-input" type="checkbox"
                                                id="39"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="39"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="39"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            intern
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-15" class="form-check-input" type="checkbox"
                                                id="15"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="15"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="15"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            inventory_officer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-25" class="form-check-input" type="checkbox"
                                                id="25"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="25"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="25"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            it_admin
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-16" class="form-check-input" type="checkbox"
                                                id="16"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="16"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="16"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            logistics_coordinator
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-19" class="form-check-input" type="checkbox"
                                                id="19"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="19"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="19"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            machine_operator
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-3" class="form-check-input" type="checkbox"
                                                id="3"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="3"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="3"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-22" class="form-check-input" type="checkbox"
                                                id="22"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="22"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="22"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            marketing_manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-30" class="form-check-input" type="checkbox"
                                                id="30"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="30"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="30"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            nurse
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-13" class="form-check-input" type="checkbox"
                                                id="13"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="13"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="13"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            operations_manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-11" class="form-check-input" type="checkbox"
                                                id="11"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="11"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="11"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            payroll_officer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-31" class="form-check-input" type="checkbox"
                                                id="31"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="31"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="31"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            pharmacist
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-12" class="form-check-input" type="checkbox"
                                                id="12"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="12"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="12"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            procurement_officer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-17" class="form-check-input" type="checkbox"
                                                id="17"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="17"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="17"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            production_manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-18" class="form-check-input" type="checkbox"
                                                id="18"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="18"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="18"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            quality_control_officer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-8" class="form-check-input" type="checkbox"
                                                id="8"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="8"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="8"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            recruiter
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-20" class="form-check-input" type="checkbox"
                                                id="20"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="20"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="20"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            sales_manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-21" class="form-check-input" type="checkbox"
                                                id="21"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="21"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="21"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            sales_rep
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-32" class="form-check-input" type="checkbox"
                                                id="32"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="32"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="32"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            school_admin
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-24" class="form-check-input" type="checkbox"
                                                id="24"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="24"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="24"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            social_media_manager
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-34" class="form-check-input" type="checkbox"
                                                id="34"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="34"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="34"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            student_affairs_officer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-1" class="form-check-input" type="checkbox"
                                                id="1"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="1"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="1"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            super_admin
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-33" class="form-check-input" type="checkbox"
                                                id="33"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="33"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="33"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            teacher
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-4" class="form-check-input" type="checkbox"
                                                id="4"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="4"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="4"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            team_lead
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-27" class="form-check-input" type="checkbox"
                                                id="27"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="27"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="27"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            ui_ux_designer
                                        </label>
                                    </div>
                                                                    <div class="form-check"
                                         style="display:inline-flex;" >

                                        <!----- Multi-form field selection handled by the Livewire Automatically------>
                                        <!--[if BLOCK]><![endif]-->                                            <input wire:key="multi-check-14" class="form-check-input" type="checkbox"
                                                id="14"
                                                wire:model.defer="multiSelectFormFields.roles"
                                                value="14"  name="roles"
                                                                                                >

                                            <!----- Normal field selection handled manually------>
                                        <!--[if ENDBLOCK]><![endif]-->

                                        <label class="custom-control-label" for="14"
                                             style="margin: 0.25em 2em 1em 0.5em" >
                                            warehouse_manager
                                        </label>
                                    </div>
                                <!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--></div><!--[if ENDBLOCK]><![endif]-->
                                <!--------- End Checkbox on a horizontal line -------->

                            <!--[if ENDBLOCK]><![endif]-->

                            <!----------- Validation Error  ------------->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                <!----  END CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->



            <!--[if BLOCK]><![endif]-->                <div class="mt-5 col-12"></div>

            <!--[if ENDBLOCK]><![endif]-->





                    

            
            <!--[if BLOCK]><![endif]-->                <h6 class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-1">Password</h6>
                <hr class="horizontal dark mt-0" />

            
            <!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]-->
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]-->
                        


                        <!----  FORM FIELDS    ---->
                    <div class=" col-12">
                        <div class="form-group">
                            
                            <!--[if BLOCK]><![endif]-->                                <label class="mt-2 mb-1" for="password">Password</label>
                            <!--[if ENDBLOCK]><![endif]-->


                            <!---- Add  item ---->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->


                            <!--[if BLOCK]><![endif]-->                                <!----------- ANY OTHER INPUT ------------->
                                <div class="input-group">
                                <input type="password" wire:model.defer="fields.password" id="password"
                                    class="form-control" value="" name="password"
                                        placeholder="Please provide the password..."

                                        
                                                                                                                    >

                                    
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            <!--[if ENDBLOCK]><![endif]-->

                            <!----------- Validation Error  ------------->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                <!----  END CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if ENDBLOCK]><![endif]-->
            
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]-->
                        


                        <!----  FORM FIELDS    ---->
                    <div class=" col-12">
                        <div class="form-group">
                            
                            <!--[if BLOCK]><![endif]-->                                <label class="mt-2 mb-1" for="password_confirmation">Confirm Password</label>
                            <!--[if ENDBLOCK]><![endif]-->


                            <!---- Add  item ---->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->


                            <!--[if BLOCK]><![endif]-->                                <!----------- ANY OTHER INPUT ------------->
                                <div class="input-group">
                                <input type="password" wire:model.defer="fields.password_confirmation" id="password_confirmation"
                                    class="form-control" value="" name="password_confirmation"
                                        placeholder="Please provide the password confirmation..."

                                        
                                                                                                                    >

                                    
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            <!--[if ENDBLOCK]><![endif]-->

                            <!----------- Validation Error  ------------->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                        </div>
                    </div>

                <!----  END CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->



            <!--[if BLOCK]><![endif]-->                <div class="mt-5 col-12"></div>

            <!--[if ENDBLOCK]><![endif]-->





                    

            
            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]-->
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
            
                <!----  CHECKING IF SHOULD BE DISPLAYED ON FORM    ---->
                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->



            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->





        <!--[if ENDBLOCK]><![endif]-->
    </form>

    <div class="row">
        <div>
            <hr class="horizontal dark my-0" />
        </div>
        <div class=" d-flex justify-content-end align-items-center flex-wrap gap-2 p-3">
            <button type="button" class="btn bg-gradient-secondary rounded-pill"
                onclick="Livewire.dispatch('closeModalEvent', [{'modalId': 'addEditModal' }])">Close</button>

            <!--[if BLOCK]><![endif]-->                <button type="button" class="btn bg-gradient-primary rounded-pill"
                    wire:click="saveRecord('addEditModal')">
                    Add Record
                </button>
            <!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>



</div>

        </div>
    </div> 

    </div>
</div>



    
    <div class="card  p-4">

        
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    
                    <h5 class="mb-4">Users Overview </h5>

                </div>
                <!--[if BLOCK]><![endif]-->                    <button wire:click="$dispatch('openAddModalEvent')"
                        class="btn bg-gradient-primary btn-icon-only rounded-circle" type="button">
                        <i class="fa-solid fa-plus   text-white"></i>
                    </button>
                <!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>



        




        
        <div class="container ms-0 mt-4 mb-0">
            <div wire:snapshot="{&quot;data&quot;:{&quot;controls&quot;:[{&quot;0&quot;:&quot;addButton&quot;,&quot;files&quot;:[{&quot;export&quot;:[[&quot;xls&quot;,&quot;csv&quot;,&quot;pdf&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;import&quot;:[[&quot;xls&quot;,&quot;csv&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;0&quot;:&quot;print&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;bulkActions&quot;:[{&quot;export&quot;:[[&quot;xls&quot;,&quot;csv&quot;,&quot;pdf&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;0&quot;:&quot;delete&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;perPage&quot;:[[5,10,25,50,100,200,500],{&quot;s&quot;:&quot;arr&quot;}],&quot;1&quot;:&quot;search&quot;,&quot;2&quot;:&quot;showHideColumns&quot;,&quot;3&quot;:&quot;filterColumns&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;columns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;email_verified_at&quot;,&quot;password&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;hiddenFields&quot;:[{&quot;onTable&quot;:[[&quot;password&quot;,&quot;remember_token&quot;,&quot;email_verified_at&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onNewForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onEditForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onQuery&quot;:[[&quot;remember_token&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onDetail&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;visibleColumns&quot;:[{&quot;0&quot;:&quot;name&quot;,&quot;1&quot;:&quot;email&quot;,&quot;2&quot;:&quot;user_status_id&quot;,&quot;7&quot;:&quot;user_type&quot;,&quot;8&quot;:&quot;roles&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;model&quot;:&quot;App\\Models\\User&quot;,&quot;fieldDefinitions&quot;:[{&quot;name&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;validation&quot;:&quot;required&quot;,&quot;label&quot;:&quot;Name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;email&quot;,&quot;validation&quot;:&quot;required|email|unique:users,email&quot;,&quot;label&quot;:&quot;Email&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_status_id&quot;:[{&quot;field_type&quot;:&quot;select&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;column&quot;:&quot;display_name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;type&quot;:&quot;hasOne&quot;,&quot;display_field&quot;:&quot;display_name&quot;,&quot;dynamic_property&quot;:&quot;userStatus&quot;,&quot;foreign_key&quot;:&quot;user_status_id&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Status&quot;,&quot;display&quot;:&quot;block&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email_verified_at&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;datetime&quot;,&quot;label&quot;:&quot;Email Verified At&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;validation&quot;:&quot;required|min:8|confirmed&quot;,&quot;label&quot;:&quot;Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password_confirmation&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;label&quot;:&quot;Confirm Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;remember_token&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;label&quot;:&quot;Remember Token&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_type&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;select&quot;,&quot;validation&quot;:&quot;required|string:max:255&quot;,&quot;options&quot;:[{&quot;Employee&quot;:&quot;Employee&quot;,&quot;Customer&quot;:&quot;Customer&quot;,&quot;Supplier&quot;:&quot;Supplier&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Type&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;roles&quot;:[{&quot;field_type&quot;:&quot;checkbox&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;column&quot;:&quot;name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;type&quot;:&quot;belongsToMany&quot;,&quot;display_field&quot;:&quot;name&quot;,&quot;dynamic_property&quot;:&quot;roles&quot;,&quot;multiSelect&quot;:true,&quot;foreign_key&quot;:&quot;role_id&quot;,&quot;inlineAdd&quot;:true},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Roles&quot;,&quot;display&quot;:&quot;inline&quot;,&quot;multiSelect&quot;:true,&quot;validation&quot;:&quot;required&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;multiSelectFormFields&quot;:[{&quot;roles&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;modelName&quot;:&quot;User&quot;,&quot;moduleName&quot;:&quot;User&quot;,&quot;file&quot;:null,&quot;bulkAction&quot;:&quot;&quot;,&quot;selectedColumns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;search&quot;:&quot;&quot;,&quot;perPage&quot;:10,&quot;sortField&quot;:&quot;id&quot;,&quot;sortDirection&quot;:&quot;asc&quot;,&quot;selectedRows&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;filters&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},&quot;memo&quot;:{&quot;id&quot;:&quot;V1hSZwdOLncA2S9Ad4Fl&quot;,&quot;name&quot;:&quot;data-tables.data-table-control&quot;,&quot;path&quot;:&quot;user\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;85742f924ceb5077804def04c6210a10b1bd0f37c344b226813d557f60648909&quot;}" wire:effects="{&quot;listeners&quot;:[&quot;toggleRowsSelectedEvent&quot;,&quot;sortColumnEvent&quot;,&quot;changeSearchEvent&quot;,&quot;changePerPageEvent&quot;]}" wire:id="V1hSZwdOLncA2S9Ad4Fl" class="row">

    <!-- Files -->
    <!--[if BLOCK]><![endif]-->        <div class="dropdown col-12 w-100 col-sm-auto w-sm-auto " wire:ignore>
            <a href="#" class="btn bg-gradient-primary dropdown-toggle mb-2 bt-sm pt-2  rounded-pill w-100 px-5"
                data-bs-toggle="dropdown" id="navbarDropdownMenuLink2" style=" height: 3em; ">
                <span class="btn-inner--icon"><i class="fa-solid fa-file text-sm me-1 text-white"></i></span>
                <span class="btn-inner--text">File</span>
            </a>

            <ul class="dropdown-menu p-3 pt-4" aria-labelledby="navbarDropdownMenuLink2">
                <!-- Export Section -->
                <!--[if BLOCK]><![endif]-->                    <pan class="m-2 text-uppercase text-xs fw-bolder">Export</pan>
                    <hr class="m-2 p-0 bg-gray-500" />
                    <!--[if BLOCK]><![endif]-->                        <li class="mb-2">
                            <a wire:click="export('xlsx')" class="dropdown-item  border-radius-md" href="#">
                                <span class="btn-inner--icon me-1"><i
                                        class="fas fa-file-excel text-sm me-1 text-success"></i></span>
                                <span class="btn-inner--text">XLS</span>
                            </a>
                        </li>
                    <!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]-->                        <li class="mb-2">
                            <a wire:click="export('csv')" class="dropdown-item  border-radius-md" href="#">
                                <span class="btn-inner--icon me-1"><i
                                        class="fa-solid fa-file-csv me-1 text-info"></i></span>
                                <span class="btn-inner--text">CVS</span>
                            </a>
                        </li>
                    <!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]-->                        <li class="mb-2">
                            <a wire:click="export('pdf')" class="dropdown-item  border-radius-md" href="#">
                                <span class="btn-inner--icon me-1"><i
                                        class="fas fa-file-pdf text-sm me-1 text-danger"></i></span>
                                <span class="btn-inner--text">PDF</span>
                            </a>
                        </li>
                    <!--[if ENDBLOCK]><![endif]-->

                    



                <!--[if ENDBLOCK]><![endif]-->
                <!-- Print Option -->
                <!--[if BLOCK]><![endif]-->                    <hr class="m-2 p-0 bg-gray-500" />
                    <li class="mb-2">
                        <a wire:click="printTable()" class="dropdown-item  border-radius-md" href="#">
                            <span class="btn-inner--icon me-1"><i class="fa-solid fa-print text-sm me-1"></i></span>
                            <span class="btn-inner--text">Print</span>
                        </a>
                    </li>
                <!--[if ENDBLOCK]><![endif]-->

                <!-- Import Section -->
                <!--[if BLOCK]><![endif]-->                    <div class="mt-4"></div>
                    <pan class="m-2 text-uppercase text-xs fw-bolder">Import</pan>
                    <hr class="m-2 p-0 bg-gray-500" />
                    <li class="mb-2">
                        <form wire:submit.prevent="import">
                            <input type="file" wire:model="file" class="p-4 pb-4 mb-1" />

                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                            <span x-show="$wire.file">
                                <hr class="m-0 p-0 mt-2 bg-gray-500" />
                                <button type="submit" class="btn btn-sm btn-secondary w-100 mt-4"
                                    style="border-radius: 2em">Import</button>
                            </span>
                        </form>
                    </li>
                <!--[if ENDBLOCK]><![endif]-->

            </ul>
        </div>
    <!--[if ENDBLOCK]><![endif]-->

    <!-- Bulk Action -->
    <!--[if BLOCK]><![endif]-->        <div class="input-group col-12 w-100 col-sm-auto w-sm-auto" x-show="$wire.selectedRows.length">
            <select wire:model="bulkAction" class="form-select p-1 ps-3 pe-sm-5 px-sm-4 m-0"
                style = "height: 2.6em;
                                border-top-left-radius: 1.3em;
                                border-bottom-left-radius: 1.3em;

                            ">
                <option value="" style="display: none"> Action... </option>
                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]-->                    <option value="exportXLSX">Export XLS</option>
                <!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]-->                    <option value="exportCSV">Export CSV</option>
                <!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]-->                    <option value="exportPDF">Export PDF</option>
                <!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]-->                    <hr class="horizontal" />
                    <option value="delete">Delete</option>
                <!--[if ENDBLOCK]><![endif]-->
            </select>
            <button wire:click="applyBulkAction" class="btn btn-sm btn-outline-primary p-0"
                style="height: 3em;
                                width: 4.7em;
                                    border-top-right-radius: 1.3em;
                                    border-bottom-right-radius: 1.3em;
                                "
                type="button" id="button-addon2">OK
            </button>
        </div>
    <!--[if ENDBLOCK]><![endif]-->


    <!-- Rows Per Page, Search & Hide Columns Section -->
    <!-- Rows Per Page -->
    <!--[if BLOCK]><![endif]-->        <div class="input-group col-12 w-100 col-sm-auto w-sm-auto ">
            <label class="input-group-text" for="recordsPerPage"
                style = "
                            height: 2.6em;
                            padding: 0em 1em;
                            border-top-left-radius: 1.3em;
                            border-bottom-left-radius: 1.3em;">Rows</label>
            <select id="recordsPerPage" wire:model.live.500ms="perPage" class="form-select form-control ps-sm-2 pe-sm-5"
                style="
                                height: 2.6em;
                                border-top-right-radius: 1.3em;
                                border-bottom-right-radius: 1.3em;">
                <!--[if BLOCK]><![endif]-->                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="500">500</option>
                <!--[if ENDBLOCK]><![endif]-->
            </select>
        </div>
    <!--[if ENDBLOCK]><![endif]-->

    <!-- Search Box -->
    <!--[if BLOCK]><![endif]-->        <div class="input-group mb-2 col-12 w-100 col-sm-auto w-sm-auto">
            <span class="input-group-text"
                style="
                            height: 2.6em;
                            border-top-left-radius: 1.3em;
                            border-bottom-left-radius: 1.3em;"><i
                    class="fas fa-search"></i></span>
            <input wire:model.live.500ms="search" class="form-control" type="search" id="search_box"
                placeholder="Search..."
                style="
                            height: 2.6em;
                            border-top-right-radius: 1.3em;
                            border-bottom-right-radius: 1.3em;">
        </div>
    <!--[if ENDBLOCK]><![endif]-->



    <!-- Filter Columns -->
    <!--[if BLOCK]><![endif]-->        <div class="dropdown col-12 w-100 col-sm-auto w-sm-auto" >
            <a href="#" class="btn bg-gradient-primary dropdown-toggle bt-sm pt-2 me-2 w-100"
                data-bs-toggle="dropdown" id="filterDropdownMenuLink" style="border-radius: 3em; height: 3em">
                <span class="btn-inner--icon"><i class="fa-solid fa-filter text-sm me-1 text-white"></i></span>
                <span class="btn-inner--text">Filter</span>
            </a>

            <ul class="dropdown-menu  me-sm-n4 dropdown-menu-end p-3 pt-4 " aria-labelledby="filterDropdownMenuLink" style="min-width: 300px;">
                <span class="m-2 text-uppercase text-xs fw-bolder">Filter Records</span>
                <hr class="m-2 p-0 bg-gray-500" />

                
                <!--[if BLOCK]><![endif]-->                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item mb-2 border-radius-md">
                            <label class="form-label mb-1 fw-bold">
                                Name
                            </label>
                            <div class="input-group input-group-sm">
                                <select class="form-select me-1 " wire:model.defer="filters.name.operator" style="width: 4.5em;">
                                    <option value="like">Contains</option>
                                    <option value="=">=</option>
                                    <option value="!=">!=</option>
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                </select>
                                <input type="text" class="form-control" wire:model.defer="filters.name.value" placeholder="Value">
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item mb-2 border-radius-md">
                            <label class="form-label mb-1 fw-bold">
                                Email
                            </label>
                            <div class="input-group input-group-sm">
                                <select class="form-select me-1 " wire:model.defer="filters.email.operator" style="width: 4.5em;">
                                    <option value="like">Contains</option>
                                    <option value="=">=</option>
                                    <option value="!=">!=</option>
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                </select>
                                <input type="text" class="form-control" wire:model.defer="filters.email.value" placeholder="Value">
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item mb-2 border-radius-md">
                            <label class="form-label mb-1 fw-bold">
                                User Status
                            </label>
                            <div class="input-group input-group-sm">
                                <select class="form-select me-1 " wire:model.defer="filters.user_status_id.operator" style="width: 4.5em;">
                                    <option value="like">Contains</option>
                                    <option value="=">=</option>
                                    <option value="!=">!=</option>
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                </select>
                                <input type="text" class="form-control" wire:model.defer="filters.user_status_id.value" placeholder="Value">
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item mb-2 border-radius-md">
                            <label class="form-label mb-1 fw-bold">
                                User Type
                            </label>
                            <div class="input-group input-group-sm">
                                <select class="form-select me-1 " wire:model.defer="filters.user_type.operator" style="width: 4.5em;">
                                    <option value="like">Contains</option>
                                    <option value="=">=</option>
                                    <option value="!=">!=</option>
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                </select>
                                <input type="text" class="form-control" wire:model.defer="filters.user_type.value" placeholder="Value">
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item mb-2 border-radius-md">
                            <label class="form-label mb-1 fw-bold">
                                User Roles
                            </label>
                            <div class="input-group input-group-sm">
                                <select class="form-select me-1 " wire:model.defer="filters.roles.operator" style="width: 4.5em;">
                                    <option value="like">Contains</option>
                                    <option value="=">=</option>
                                    <option value="!=">!=</option>
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                </select>
                                <input type="text" class="form-control" wire:model.defer="filters.roles.value" placeholder="Value">
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                <!--[if ENDBLOCK]><![endif]-->

                <hr class="m-2 p-0 bg-gray-500" />
                <button class="btn btn-sm btn-secondary w-100 mt-2" wire:click="applyFilters"
                    style="border-radius: 2em">Apply Filter</button>
            </ul>
        </div>
    <!--[if ENDBLOCK]><![endif]-->




    <!-- Show / Hide Columns -->
    <!--[if BLOCK]><![endif]-->        <div class="dropdown col-12 w-100 col-sm-auto w-sm-auto">
            <a href="#" class="btn bg-gradient-primary dropdown-toggle bt-sm pt-2 me-2 w-100"
                data-bs-toggle="dropdown" id="navbarDropdownMenuLink2" style="border-radius: 3em; height: 3em">
                <span class="btn-inner--icon"><i class="fa-solid fa-list text-sm me-1 text-white"></i></span>
                <span class="btn-inner--text">Columns</span>
            </a>

            <ul class="dropdown-menu  me-sm-n4 dropdown-menu-end p-3 pt-4" aria-labelledby="navbarDropdownMenuLink2">
                <span class="m-2 text-uppercase text-xs fw-bolder">Show/Hide</span>
                <hr class="m-2 p-0 bg-gray-500" />
                
                <!--[if BLOCK]><![endif]-->                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item  border-radius-md">
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" wire:model.defer="selectedColumns"
                                    value="name" class="form-check-input"
                                    style="width: 1.2em; height:1.2em"
                                     checked >

                                <!--[if BLOCK]><![endif]-->                                    <span class="ms-1">
                                        Name
                                    </span>
                                <!--[if ENDBLOCK]><![endif]-->

                                </input>
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item  border-radius-md">
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" wire:model.defer="selectedColumns"
                                    value="email" class="form-check-input"
                                    style="width: 1.2em; height:1.2em"
                                     checked >

                                <!--[if BLOCK]><![endif]-->                                    <span class="ms-1">
                                        Email
                                    </span>
                                <!--[if ENDBLOCK]><![endif]-->

                                </input>
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item  border-radius-md">
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" wire:model.defer="selectedColumns"
                                    value="user_status_id" class="form-check-input"
                                    style="width: 1.2em; height:1.2em"
                                     checked >

                                <!--[if BLOCK]><![endif]-->                                    <span class="ms-1">
                                        User Status
                                    </span>
                                <!--[if ENDBLOCK]><![endif]-->

                                </input>
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item  border-radius-md">
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" wire:model.defer="selectedColumns"
                                    value="user_type" class="form-check-input"
                                    style="width: 1.2em; height:1.2em"
                                     checked >

                                <!--[if BLOCK]><![endif]-->                                    <span class="ms-1">
                                        User Type
                                    </span>
                                <!--[if ENDBLOCK]><![endif]-->

                                </input>
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <div class="dropdown-item  border-radius-md">
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" wire:model.defer="selectedColumns"
                                    value="roles" class="form-check-input"
                                    style="width: 1.2em; height:1.2em"
                                     checked >

                                <!--[if BLOCK]><![endif]-->                                    <span class="ms-1">
                                        User Roles
                                    </span>
                                <!--[if ENDBLOCK]><![endif]-->

                                </input>
                            </div>
                        </div>
                    <!--[if ENDBLOCK]><![endif]-->
                <!--[if ENDBLOCK]><![endif]-->
                <hr class="m-2 p-0 bg-gray-500" />
                <button class="btn btn-sm btn-secondary w-100 mt-2" wire:click="showHideSelectedColumns"
                    style="border-radius: 2em">OK</button>
            </ul>
        </div>
    <!--[if ENDBLOCK]><![endif]-->





</div>


        </div>


        
        <div wire:snapshot="{&quot;data&quot;:{&quot;model&quot;:&quot;App\\Models\\User&quot;,&quot;controls&quot;:[{&quot;0&quot;:&quot;addButton&quot;,&quot;files&quot;:[{&quot;export&quot;:[[&quot;xls&quot;,&quot;csv&quot;,&quot;pdf&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;import&quot;:[[&quot;xls&quot;,&quot;csv&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;0&quot;:&quot;print&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;bulkActions&quot;:[{&quot;export&quot;:[[&quot;xls&quot;,&quot;csv&quot;,&quot;pdf&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;0&quot;:&quot;delete&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;perPage&quot;:[[5,10,25,50,100,200,500],{&quot;s&quot;:&quot;arr&quot;}],&quot;1&quot;:&quot;search&quot;,&quot;2&quot;:&quot;showHideColumns&quot;,&quot;3&quot;:&quot;filterColumns&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;columns&quot;:[[&quot;name&quot;,&quot;email&quot;,&quot;user_status_id&quot;,&quot;email_verified_at&quot;,&quot;password&quot;,&quot;password_confirmation&quot;,&quot;remember_token&quot;,&quot;user_type&quot;,&quot;roles&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;fieldDefinitions&quot;:[{&quot;name&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;validation&quot;:&quot;required&quot;,&quot;label&quot;:&quot;Name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;email&quot;,&quot;validation&quot;:&quot;required|email|unique:users,email&quot;,&quot;label&quot;:&quot;Email&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_status_id&quot;:[{&quot;field_type&quot;:&quot;select&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;column&quot;:&quot;display_name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\User\\Models\\UserStatus&quot;,&quot;type&quot;:&quot;hasOne&quot;,&quot;display_field&quot;:&quot;display_name&quot;,&quot;dynamic_property&quot;:&quot;userStatus&quot;,&quot;foreign_key&quot;:&quot;user_status_id&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Status&quot;,&quot;display&quot;:&quot;block&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;email_verified_at&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;datetime&quot;,&quot;label&quot;:&quot;Email Verified At&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;validation&quot;:&quot;required|min:8|confirmed&quot;,&quot;label&quot;:&quot;Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;password_confirmation&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;password&quot;,&quot;label&quot;:&quot;Confirm Password&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;remember_token&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;string&quot;,&quot;label&quot;:&quot;Remember Token&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;user_type&quot;:[{&quot;display&quot;:&quot;inline&quot;,&quot;field_type&quot;:&quot;select&quot;,&quot;validation&quot;:&quot;required|string:max:255&quot;,&quot;options&quot;:[{&quot;Employee&quot;:&quot;Employee&quot;,&quot;Customer&quot;:&quot;Customer&quot;,&quot;Supplier&quot;:&quot;Supplier&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Type&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;roles&quot;:[{&quot;field_type&quot;:&quot;checkbox&quot;,&quot;options&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;column&quot;:&quot;name&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;relationship&quot;:[{&quot;model&quot;:&quot;App\\Modules\\Access\\Models\\Role&quot;,&quot;type&quot;:&quot;belongsToMany&quot;,&quot;display_field&quot;:&quot;name&quot;,&quot;dynamic_property&quot;:&quot;roles&quot;,&quot;multiSelect&quot;:true,&quot;foreign_key&quot;:&quot;role_id&quot;,&quot;inlineAdd&quot;:true},{&quot;s&quot;:&quot;arr&quot;}],&quot;label&quot;:&quot;User Roles&quot;,&quot;display&quot;:&quot;inline&quot;,&quot;multiSelect&quot;:true,&quot;validation&quot;:&quot;required&quot;},{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;multiSelectFormFields&quot;:[{&quot;roles&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;simpleActions&quot;:[[&quot;show&quot;,&quot;edit&quot;,&quot;delete&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;moreActions&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;hiddenFields&quot;:[{&quot;onTable&quot;:[[&quot;password&quot;,&quot;remember_token&quot;,&quot;email_verified_at&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onNewForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onEditForm&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onQuery&quot;:[[&quot;remember_token&quot;,&quot;password_confirmation&quot;],{&quot;s&quot;:&quot;arr&quot;}],&quot;onDetail&quot;:[[&quot;email_verified_at&quot;,&quot;remember_token&quot;,&quot;remember_token&quot;],{&quot;s&quot;:&quot;arr&quot;}]},{&quot;s&quot;:&quot;arr&quot;}],&quot;modelName&quot;:&quot;User&quot;,&quot;moduleName&quot;:&quot;User&quot;,&quot;visibleColumns&quot;:[{&quot;0&quot;:&quot;name&quot;,&quot;1&quot;:&quot;email&quot;,&quot;2&quot;:&quot;user_status_id&quot;,&quot;7&quot;:&quot;user_type&quot;,&quot;8&quot;:&quot;roles&quot;},{&quot;s&quot;:&quot;arr&quot;}],&quot;selectedColumns&quot;:null,&quot;sortField&quot;:&quot;id&quot;,&quot;sortDirection&quot;:&quot;asc&quot;,&quot;perPage&quot;:10,&quot;selectedRows&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;selectAll&quot;:null,&quot;search&quot;:&quot;&quot;,&quot;queryFilters&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;paginators&quot;:[{&quot;page&quot;:1},{&quot;s&quot;:&quot;arr&quot;}]},&quot;memo&quot;:{&quot;id&quot;:&quot;KhtQ0MPinlzhMqB83q1z&quot;,&quot;name&quot;:&quot;data-tables.data-table&quot;,&quot;path&quot;:&quot;user\/users&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;b5a656251fba8b8a09f621f8d950ff2c6f4027c82a6cb47eb8ced7cdde6b8c9a&quot;}" wire:effects="{&quot;url&quot;:{&quot;paginators.page&quot;:{&quot;as&quot;:&quot;page&quot;,&quot;use&quot;:&quot;push&quot;,&quot;alwaysShow&quot;:false,&quot;except&quot;:null}},&quot;listeners&quot;:[&quot;perPageEvent&quot;,&quot;searchEvent&quot;,&quot;showHideColumnsEvent&quot;,&quot;applyFilterEvent&quot;,&quot;recordDeletedEvent&quot;,&quot;recordSavedEvent&quot;]}" wire:id="KhtQ0MPinlzhMqB83q1z" class="table-responsive p-0">
    
    <div wire:loading class=" text-center"
            style="
                width: 100%;
                height:100%;
                z-index:100;
                top:0em;
                left:0em;
                position:absolute;
            ">
            <div class="spinner-border text-primary" style="width: 4em; height: 4em; margin:auto; margin-top:40%"
                role="status">
                <span class="sr-only">Loading...</span>
            </div>

        </div>


    
        <table id="dataTable" class="table align-items-center mb-0" >
    <thead>
        <tr>
            <!--- Bulk Action - Select ALL Checkbox ---->
            <!--[if BLOCK]><![endif]-->                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 no-print">
                    <div class="form-check">
                        <input class="form-check-input" style="width: 1.6em; height:1.6em"
                            type="checkbox" wire:model.live.500ms="selectAll">
                    </div>
                </th>
            <!--[if ENDBLOCK]><![endif]-->

            <!--- Table Header ACS-DESC Sorting ---->
            <!--[if BLOCK]><![endif]-->                <!--[if BLOCK]><![endif]-->                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2 round-top "
                        wire:click="sortColumn('name')" style="height: 0.5em; "
                        aria-sort="none">
                        <div
                            class="d-flex justify-content-between p-2 px-3
                        ">

                            <!--[if BLOCK]><![endif]-->                                <span>Name</span>
                            <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </th>
                <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]-->                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2 round-top "
                        wire:click="sortColumn('email')" style="height: 0.5em; "
                        aria-sort="none">
                        <div
                            class="d-flex justify-content-between p-2 px-3
                        ">

                            <!--[if BLOCK]><![endif]-->                                <span>Email</span>
                            <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </th>
                <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]-->                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2 round-top "
                        wire:click="sortColumn('user_status_id')" style="height: 0.5em; "
                        aria-sort="none">
                        <div
                            class="d-flex justify-content-between p-2 px-3
                        ">

                            <!--[if BLOCK]><![endif]-->                                <span>User Status</span>
                            <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </th>
                <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]-->                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2 round-top "
                        wire:click="sortColumn('user_type')" style="height: 0.5em; "
                        aria-sort="none">
                        <div
                            class="d-flex justify-content-between p-2 px-3
                        ">

                            <!--[if BLOCK]><![endif]-->                                <span>User Type</span>
                            <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </th>
                <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]-->                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2 round-top "
                        wire:click="sortColumn('roles')" style="height: 0.5em; "
                        aria-sort="none">
                        <div
                            class="d-flex justify-content-between p-2 px-3
                        ">

                            <!--[if BLOCK]><![endif]-->                                <span>User Roles</span>
                            <!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </th>
                <!--[if ENDBLOCK]><![endif]-->
            <!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]-->                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 no-print">
                    Actions
                </th>
            <!--[if ENDBLOCK]><![endif]-->

        </tr>
    </thead>
    <tbody>


        <!--[if BLOCK]><![endif]-->            <tr>
                <!--- Bulk Action - Single Row Selection Checkbox ---->
                <!--[if BLOCK]><![endif]-->                    <td
                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 no-print">
                        <div class="form-check">
                            <input class="form-check-input" style="width: 1.6em; height:1.6em"
                                x-on:click="$wire.toggleRowSelected()"
                                type="checkbox" wire:model="selectedRows" value="1"
                                 />
                        </div>
                    </td>
                <!--[if ENDBLOCK]><![endif]-->

                <!---- Displaying Record That Has A RELATIONSHIP  ---->
                <!--[if BLOCK]><![endif]-->                    <!--[if BLOCK]><![endif]-->                        <td  style=" white-space: normal; word-wrap: break-word; ">
                            <p class="text-xs font-weight-bold mb-0 ">
                                <!--[if BLOCK]><![endif]-->                                    Super Admin
                                <!--[if ENDBLOCK]><![endif]-->
                            </p>
                        </td>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <td  style=" white-space: normal; word-wrap: break-word; ">
                            <p class="text-xs font-weight-bold mb-0 ">
                                <!--[if BLOCK]><![endif]-->                                    admin@softui.com
                                <!--[if ENDBLOCK]><![endif]-->
                            </p>
                        </td>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <td  style=" white-space: normal; word-wrap: break-word; ">
                            <p class="text-xs font-weight-bold mb-0 ">
                                <!--[if BLOCK]><![endif]-->                                    <!---- Has Many Relationship ---->
                                    <!--[if BLOCK]><![endif]--> <!---- Belongs To Relationship ---->
                                                                                
                                    <!--[if ENDBLOCK]><![endif]-->

                                <!--[if ENDBLOCK]><![endif]-->
                            </p>
                        </td>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <td  style=" white-space: normal; word-wrap: break-word; ">
                            <p class="text-xs font-weight-bold mb-0 ">
                                <!--[if BLOCK]><![endif]-->                                    staff
                                <!--[if ENDBLOCK]><![endif]-->
                            </p>
                        </td>
                    <!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]-->                        <td  style=" white-space: normal; word-wrap: break-word; ">
                            <p class="text-xs font-weight-bold mb-0 ">
                                <!--[if BLOCK]><![endif]-->                                    <!---- Has Many Relationship ---->
                                    <!--[if BLOCK]><![endif]-->                                        super_admin
                                    <!--[if ENDBLOCK]><![endif]-->

                                <!--[if ENDBLOCK]><![endif]-->
                            </p>
                        </td>
                    <!--[if ENDBLOCK]><![endif]-->
                <!--[if ENDBLOCK]><![endif]-->

                <td class="no-print">
                    <!--[if BLOCK]><![endif]-->                        <!--[if BLOCK]><![endif]-->                            <!--[if BLOCK]><![endif]-->                                <span wire:click="$dispatch('openDetailModalEvent', [1, 'App\\Models\\User'] )"
                                    style="cursor: pointer" class="mx-2"
                                    data-bs-toggle="tooltip"  data-bs-original-title="Detail"
                                    >
                                    <i class="fas fa-eye text-info"></i>
                                </span>
                            <!--[if ENDBLOCK]><![endif]-->
                                                    <!--[if BLOCK]><![endif]-->
                                <span wire:click="editRecord( 1, 'App\\Models\\User' )"
                                    class="mx-2"
                                    style="cursor: pointer"
                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                    <i class="fas fa-edit text-primary"></i>
                                </span>
                            <!--[if ENDBLOCK]><![endif]-->
                                                    <!--[if BLOCK]><![endif]-->                                <span wire:click="deleteRecord(1 )"
                                    class="mx-2"
                                    style="cursor: pointer"
                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                    <i class="fas fa-trash text-danger"></i>
                                </span>
                            <!--[if ENDBLOCK]><![endif]-->
                        <!--[if ENDBLOCK]><![endif]-->
                    <!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                </td>

            </tr>
        <!--[if ENDBLOCK]><![endif]-->
    </tbody>
</table>
    <div class="mt-3 ms-3 me-4 d-flex justify-content-between align-items-center">
    <div>
        <p class="text-sm text-secondary">
            Showing 1 to 1 of 1
            results
        </p>
    </div>
    <div>
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->


    </div>
</div>


</div>





        
        <div wire:ignore.self id="detail" class="modal-wrapper" wire:key="modal-header-detail">
    <!-- Modal Backdrop -->
    <div class="modal-backdrop" id="modalBackdrop"
        onclick="Livewire.dispatch('close-modal-event', [{'modalId': 'detail' }])"></div>

    <!-- Modal Content -->
    <div class="modal-content  pb-0  mainModal" id="modalContent">
        <h5 class="card-title text-info text-gradient font-weight-bolder p-4 mx-4 mt-2 mb-2 pb-2">
            <!--[if BLOCK]><![endif]-->                User Detail
            <!--[if ENDBLOCK]><![endif]-->
        </h5>
        <div class="mb-4"><hr class="horizontal dark my-0" /></div>
        <div class="modal-body">






<form role="form text-left" class="p-4 modal-form">

    <!-- Display more details of the selected item -->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

</form>


<div class="row">
        <div>
            <hr class="horizontal dark my-0" />
        </div>
        <div class=" d-flex justify-content-end align-items-center flex-wrap gap-2 p-3">
            <button type="button" class="btn bg-gradient-secondary rounded-pill"
                onclick="Livewire.dispatch('closeModalEvent', [{'modalId': 'detail' }])">Close</button>

            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>




    </div>


</section>

<!----------  IMAGE CROPPER  ---------->
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script>
    function printTable() {
        printJS({
            printable: 'dataTable',
            type: 'html',
            showModal: true,
            style: `
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
                    .no-print { display: none; } /* Hide elements with the 'no-print' class */
                `
        });
    }
</script>


<script src="/assets/js/plugins/flatpickr.min.js"></script>
<script>
    // Date picker initialiser
    if (document.querySelector('.datepicker')) {
        flatpickr('.datepicker', {
        });
    }

    // Datetime picker initialiser
    if (document.querySelector('.datetimepicker')) {
        flatpickr('.datetimepicker', {
            enableTime: true,
        });
    }
</script>


                
                </div> 

</div>

                <footer class="footer pt-3  ">
    <div class="container-fluid">
        
    </div>
</footer>
            </div>
        </div>







    </div>
  </div>

  

  <!-- Toggle button placed outside the sidebar so it stays visible -->
  <button id="toggleSidebar" class="toggle-btn bg-gradient-primary">
    <i id="toggleIcon" class="bi"></i>
  </button>





  <!--[if ENDBLOCK]><![endif]-->


  <script>
    const sidebar    = document.getElementById('sidebar');
    const content    = document.getElementById('contentArea');
    const toggleBtn  = document.getElementById('toggleSidebar');
    const toggleIcon = document.getElementById('toggleIcon');

    // Global state variables.
    let states = []; // Array of available states.
    let currentStateIndex = 0;

    // Set mode based on window width.
    // - Desktop (≥993px): cycle through ['full','icons','hidden'] (default: full).
    // - Tablet (577–992px) & Mobile (≤576px): cycle through ['hidden','icons'].
    function setMode() {
      const width = window.innerWidth;
      if (width >= 993) {
        states = ['full', 'icons', 'hidden'];
        currentStateIndex = 0; // Default to full.
      } else if (width >= 577) {
        states = ['hidden', 'icons'];
        currentStateIndex = 1; // Default to icons.
      } else {
        states = ['hidden', 'icons'];
        currentStateIndex = 0; // Default to hidden.
      }
    }

    // Return sidebar width based on the current state.
    function getSidebarWidth() {
      const state = states[currentStateIndex];
      if (state === 'full') return 250;
      if (state === 'icons') return 80;
      return 0; // hidden state.
    }

    // Update sidebar class, main content margin, and toggle button appearance.
    function updateUI() {
      // Update sidebar state.
      sidebar.classList.remove('hidden', 'icons', 'full');
      sidebar.classList.add(states[currentStateIndex]);

    
      // Set main content margin to exactly match sidebar width.
      const sWidth = getSidebarWidth();
      // content.style.marginLeft = sWidth + 'px';
    
      // Position the toggle button near the right edge of the sidebar.
      toggleBtn.style.left = (sWidth > 0 ? sWidth : 5) + 'px';
    
      // Set the toggle arrow icon.
      toggleIcon.className = (states[currentStateIndex] === 'hidden')
                             ? 'fas fa-chevron-right'
                             : 'fas fa-chevron-left';
    
      // 🔽 NEW: Hide all expanded submenus if sidebar is not in 'full' state
      if (states[currentStateIndex] !== 'full') {
        document.querySelectorAll('.submenu.active').forEach(el => {
          el.classList.remove('active');
        });
      }

      if (states[currentStateIndex] == 'icons') {
        sidebar.style.backgroundColor = '#fff';
        sidebar.querySelectorAll('.nav-link').forEach(item => {
            item.querySelector('.nav-link-text').style.visibility = 'hidden';
        });

        sidebar.querySelectorAll('.text-uppercase').forEach(item => {
          item.style.visibility = 'hidden';
        });

        const sidebarLogoText = sidebar.querySelector('#sidebarLogoText');
        sidebarLogoText.style.visibility = 'hidden';

        const sidebarLogo = sidebar.querySelector('#sidebarLogo');

      } else if (states[currentStateIndex] == 'full'){
        sidebar.style.backgroundColor = null;

        sidebar.querySelectorAll('.nav-link').forEach(item => {
          item.querySelector('.nav-link-text').style.visibility = 'visible';
        });

        sidebar.querySelectorAll('.text-uppercase').forEach(item => {
          item.style.visibility = 'visible';
        });

        const sidebarLogoText = sidebar.querySelector('#sidebarLogoText');
        sidebarLogoText.style.visibility = 'visible';
      }


    }
    

    // Sidebar menu data (with submenu support).
    const menuItems = [
      /*{ icon: 'fa-house', text: 'Home' },
      { icon: 'fa-person', text: 'Profile', submenu: [
          { text: 'View Profile', link: '#' },
          { text: 'Edit Profile', link: '#' }
        ]
      },
      { icon: 'bi-gear', text: 'Settings' }*/
    ];

    // Helper function to create an element.
    function createElem(tag, className, innerHTML) {
      const el = document.createElement(tag);
      if (className) el.className = className;
      if (innerHTML) el.innerHTML = innerHTML;
      return el;
    }

    // Render sidebar menu items.
    function renderMenu() {
      //sidebar.innerHTML = '';
      menuItems.forEach((item, index) => {
        const menuDiv = createElem('div', 'menu-item');
        menuDiv.dataset.index = index;
        menuDiv.innerHTML = `<i class="fas ${item.icon}"></i><span class="menu-text">${item.text}</span>`;
        
        // If the menu item has a submenu, attach it.
        if (item.submenu) {
          const submenuDiv = createElem('div', 'submenu');
          item.submenu.forEach(sub => {
            const link = createElem('a', '', sub.text);
            link.href = sub.link;
            link.addEventListener('click', () => {
              if (states[currentStateIndex] === 'icons' && activePopup) {
                activePopup.remove();
                activePopup = null;
              }
            });
            submenuDiv.appendChild(link);
          });
          menuDiv.appendChild(submenuDiv);
        }
        sidebar.appendChild(menuDiv);
        
        // Handle click events for submenu toggle.
        if (item.submenu) {
          menuDiv.addEventListener('click', (e) => {
            e.stopPropagation();
            if (states[currentStateIndex] === 'full') {
              const submenu = menuDiv.querySelector('.submenu');
              submenu.classList.toggle('active');
            } else if (states[currentStateIndex] === 'icons') {
              if (activePopup) {
                activePopup.remove();
                activePopup = null;
              }
              activePopup = createElem('div', 'submenu-popup');
              item.submenu.forEach(sub => {
                const link = createElem('a', '', sub.text);
                link.href = sub.link;
                link.addEventListener('click', () => {
                  if (activePopup) {
                    activePopup.remove();
                    activePopup = null;
                  }
                });
                activePopup.appendChild(link);
              });
              const rect = menuDiv.getBoundingClientRect();
              activePopup.style.top = rect.top + 'px';
              activePopup.style.left = rect.right + 'px';
              document.body.appendChild(activePopup);
              document.addEventListener('click', function closePopup(e) {
                if (activePopup && !activePopup.contains(e.target) && e.target !== menuDiv) {
                  activePopup.remove();
                  activePopup = null;
                  document.removeEventListener('click', closePopup);
                }
              });
            }
          });
        }
      });
    }

    let activePopup = null;

    // Toggle the sidebar state on click.
    toggleBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      currentStateIndex = (currentStateIndex + 1) % states.length;
      updateUI();
    });

    // Initialization routine.
    function initialize() {
      setMode();
      renderMenu();
      updateUI();
    }

    window.addEventListener('resize', initialize);
    initialize();
  </script>
  
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>










<!--------------------------------  ORIGINAL LINKS --------------------------------->

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <!--   Core JS Files   -->
    <script src="http://localhost:8000/assets/js/core/popper.min.js"></script>
    
    <script src="http://localhost:8000/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/fullcalendar.min.js"></script>
    <script src="http://localhost:8000/assets/js/plugins/chartjs.min.js"></script>

        
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
    <script src="http://localhost:8000/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>


    <!----------------------------------- Plugins ---------------------------------->
    <!------------- Flat Date Picker JS -------------->
    <script src="http://localhost:8000/assets/js/plugins/flatpickr.min.js"></script>

    <!------------- Flat Date Picker JS ENDS -------------->

    <!------------------- Sweet Alert JS ------------------>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--<script src="http://localhost:8000/assets/js/plugins/sweetalert.min.js"></script>-->

    <!------------ PDF File ------------>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!------------ Crest App code generator supporting code ------------>
    <script src="http://localhost:8000/assets/js/crest-apps/code-generator-ui.js"></script>




</body>
</html>
<?php /**PATH /Users/mac/LaravelProjects/testing-quicker-faster-crud-package/storage/framework/views/837a757777b4ea6dc2fb687006010228.blade.php ENDPATH**/ ?>