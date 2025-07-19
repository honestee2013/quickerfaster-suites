<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        // Logic to store attendance data
        return response()->json([
            'message' => 'Attendance recorded successfully',
            'data' => $request->all() // Return the stored data
        ]);
    }

}
