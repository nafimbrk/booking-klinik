<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('doctor')->get();

        return inertia('Schedule/Index', [
            'schedules' => $schedules
        ]);
    }
}
