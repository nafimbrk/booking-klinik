<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::select('id', 'user_id', 'specialization', 'bio')->with('user')->orderBy('id', 'desc')->get();

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
            'email' => 'required',
            'password' => 'required',
            'specialization' => 'required',
            'bio' => 'nullable'
        ]);

        $user = new User();
        $doctor = new Doctor();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 'dokter';
        $user->save();

        $doctor->user_id = $user->id;
        $doctor->specialization = $request->specialization;
        $doctor->bio = $request->bio;
        $doctor->save();

        return redirect()->route('doctors.index')->with('success', 'data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $doctor = Doctor::with('user')->find($id);

        return inertia('Doctor/Edit', [
            'doctor' => $doctor,
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
