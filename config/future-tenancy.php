<?php


/*
/****** When tenancy is added ******* /

To be copied to the config/tenancy.php
'central_domains' => [
    'suites.quickerfaster.com',
],


// Central QF Suite (admin)
Route::domain('suites.quickerfaster.com')->group(function () {
    Route::get('/', function () {
        return view('welcome'); // or central login/dashboard
    });
});

// Future multi-tenant company sites
Route::domain('{company}.quickerfaster.com')->group(function () {
    Route::get('/', function ($company) {
        return "Welcome to QF Suite for: " . $company;
    });
});









And also register fallback routes for suites.quickerfaster.com


*/
