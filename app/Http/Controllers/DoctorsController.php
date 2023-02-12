<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctor = Doctors::where('id', session()->get('loginID'))->first();
        return view('user.doctorDashboard', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctors::where('id', $id)->first();
        return view('user.editDoctor', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'docFirstName' => 'required',
            'docLastName' => 'required',
            'docEmail' => ['required','email',Rule::unique('doctors')->ignore($id)],
            'docSpecialist' => 'required',
        ]);

        $res = Doctors::where('id', $id)
            ->update([
                'docFirstName' => $request->input('docFirstName'),
                'docLastName' => $request->input('docLastName'),
                'docEmail' => $request->input('docEmail'),
                'docSpecialist' => $request->input('docSpecialist'),
            ]);

        if ($res)
            return back()->with('success', 'Profile details have updated successfully.');
        else
            return back()->with('fail', 'Something went wrong.');
    }
}
