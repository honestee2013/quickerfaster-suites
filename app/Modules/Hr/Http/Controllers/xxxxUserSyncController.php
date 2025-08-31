<?php

namespace App\Modules\Hr\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Hr\Models\EmployeeProfile;


class UserSyncController extends Controller
{
    public function syncUser()
    {
        $profiles = EmployeeProfile::with(['user.basicInfo', 'role'])
            ->get()
            ->map(function ($profile) {
                return [
                    'user_id' => optional($profile->user)->id,
                    'username' => optional($profile->user)->username,
                    'password' => optional($profile->user)->password,
                    'role' => optional($profile->role)->name,
                    'name' => $profile->full_name,
                    'employee_id' => $profile->employee_id,
                    'department' => $profile->department,
                    'designation' => $profile->designation,
                    'profile_picture' => optional(optional($profile->user)->basicInfo)->profile_picture
                        ? asset('storage/' . $profile->user->basicInfo->profile_picture)
                        : null,
                ];
            });

        return response()->json([
            'status' => true,
            'message' => 'User data synced successfully.',
            'data' => $profiles,
        ]);
    }
}