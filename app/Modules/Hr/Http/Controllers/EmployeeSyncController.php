<?php

namespace App\Modules\Hr\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Modules\Hr\Models\EmployeeProfile;


class EmployeeSyncController extends Controller
{
    public function syncEmployees()
    {
        //dd("Employee Syncing starts.... ");

        $employees = EmployeeProfile::with(['user.basicInfo', 'role'])
            ->get()
            ->map(function ($employee) {
                return [
                    'user_id'       => optional($employee->user)->id,
                    'name'          => $employee->full_name, // Changed from $employee->name to $employee->full_name

                    // From User (Auth)
                    'username'      => optional($employee->user)->username,
                    'password'      => optional($employee->user)->password,
                    'role'          => optional($employee->role)->name,

                    // From Employee Profile
                    'employee_id'   => $employee->employee_id,
                    'full_name'     => $employee->full_name,
                    'department'    => $employee->department,
                    'designation'   => $employee->designation,

                    // From Basic Info
                    'profile_picture' => optional(optional($employee->user)->basicInfo)->profile_picture
                        ? asset('storage/' . $employee->user->basicInfo->profile_picture)
                        : null,
                ];
            });

        //dd("Employee Syncing.... ".$employees);
        return response()->json([
            'status'  => true,
            'message' => 'Employee data synced successfully.',
            'data'    => $employees,
        ]);
    }
}