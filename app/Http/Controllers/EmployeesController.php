<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class EmployeesController extends Controller
{
    public function index()
    {
        $employee = Employees::where('id', session()->get('loginEmployeeID'))->first();
        return view('user.employeeDashboard', compact('employee'));
    }

    public function show()
    {
        $Employees = Employees::all();
        return view('user.employees', compact('Employees'));
    }

    public function store(Request $request)
    {
        //add to db
    }

    public function edit($id)
    {
        $Employee = Employees::where('id', $id)->first();
        return view('user.editEmployee', compact('Employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employeeName' => 'required',
            'employeeMobile' => 'required',
            'employeeAddress' => 'required',
            'employeeEmail' => ['required','email',Rule::unique('employees')->ignore($id)],
        ]);

        $res = Employees::where('id', $id)
            ->update([
                'employeeName' => $request->input('employeeName'),
                'employeeMobile' => $request->input('employeeMobile'),
                'employeeAddress' => $request->input('employeeAddress'),
                'employeeEmail' => $request->input('employeeEmail'),
            ]);

        if ($res)
            return back()->with('success', 'Profile details have updated successfully.');
        else
            return back()->with('fail', 'Something went wrong.');
    }

    public function editPw($id)
    {
        $Employee = Employees::where('id', $id)->first();
        return view('user.employeeVerifyPw', compact('Employee'));
    }

    public function verifyPw(Request $request)
    {
        $employee = Employees::where('id', '=', $request->id)->first();

        if ($employee) {
            if (Hash::check($request->employeePw, $employee->employeePw)) {
                $Employee = Employees::where('id', $request->id)->first();
                return view('user.employeeChangePw', compact('Employee'));
            } else {
                return back()->with('fail', 'Invalid password. You need to enter your current password!');
            }
        }
    }

    public function updatePw(Request $request)
    {
        $updatePw = Employees::where('id', $request->id)
            ->update([
                'employeePw' => Hash::make($request->input('employeePw'))
            ]);

        if ($updatePw) {
            return view('welcome');
        }
    }

    public function destroy($id)
    {
        Employees::where('id', $id)->delete();
        return redirect()->back();
    }
}
