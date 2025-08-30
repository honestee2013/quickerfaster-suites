<?php

namespace App\Modules\Hr\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Modules\Hr\Models\EmployeeProfile;


class EmployeeSyncController extends Controller
{
    public function syncEmployees()
    {
        $employees = EmployeeProfile::with(['user', 'role']) // ['user', 'basicInfo', 'role'])
            //->has('user') // only employees linked to a user
            ->get()
            ->map(function ($employee) {
                return [
                    'user_id'       => $employee->user->id ?? null,
                    'name'          => $employee->name,

                    // From User (Auth)
                    'username'      => optional($employee->user)->username,
                    'password'      => optional($employee->user)->password, // ideally hashed
                    'role'          => optional($employee->role)->name,

                    // From Employee Profile
                    'employee_id'   => $employee->employee_id,
                    'department'    => $employee->department,
                    'designation'   => $employee->designation,

                    // From Basic Info
                    'profile_picture' => '',
                    /*'profile_picture' => optional($employee->basicInfo)->profile_picture
                        ? asset('storage/' . $employee->basicInfo->profile_picture)
                        : null,*/
                ];
            });

        return response()->json([
            'status'  => true,
            'message' => 'Employee data synced successfully.',
            'data'    => $employees,
        ]);
    }
}
