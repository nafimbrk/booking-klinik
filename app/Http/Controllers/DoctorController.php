<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::select('id', 'name', 'specialization', 'bio')->get();

        return inertia('Doctor/Index', [
            'doctors' => $doctors
        ]);
    }

    public function create()
    {
        return inertia('Doctor/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'bio' => 'nullable'
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->specialization = $request->specialization;
        $doctor->bio = $request->bio;
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);

        return inertia('Doctor/Edit', [
            'doctor' => $doctor
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'bio' => 'nullable'
        ]);

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->specialization = $request->specialization;
        $doctor->bio = $request->bio;
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'data berhasil diubah');
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'data berhasil diubah');
    }
}
