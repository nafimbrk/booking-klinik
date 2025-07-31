<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('doctor')->orderBy('id', 'desc')->get();

        return inertia('Schedule/Index', [
            'schedules' => $schedules
        ]);
    }

    public function create()
    {
        $doctors = Doctor::select('id', 'name')->get();

        return inertia('Schedule/Create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
        ]);

        $schedule = new Schedule();
        $schedule->doctor_id = $request->doctor_id;
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->save();

        return redirect()->route('schedules.index')->with('success', 'data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);

        $doctors = Doctor::select('id', 'name')->get();

        return inertia('Schedule/Edit', [
            'schedule' => $schedule,
            'doctors' => $doctors
        ]);
    }

    public function update(Request $request, $id)
    {
        dd('anjay');
        $request->validate([
            'doctor_id' => 'required',
            'day' => 'required',
        ]);

        $schedule = Schedule::find($id);
        $schedule->doctor_id = $request->doctor_id;
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->save();


        return redirect()->route('schedules.index')->with('success', 'data berhasil diubah');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'data berhasil diubah');
    }
}
