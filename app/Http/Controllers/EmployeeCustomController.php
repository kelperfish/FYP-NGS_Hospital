<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmployeeCustomController extends Controller
{
    public function login(){
        return view ("auth.loginEmployee");
    }
    public function register(){
        return view ("auth.registerEmployee");
    }

    public function registerEmployee(Request $request){
        $request->validate([
            'employeeName'=>'required',
            'employeeMobile'=>'required',
            'employeeAddress'=>'required',
            'employeeEmail'=>'required|email|unique:employees',
            'employeePw'=>'required|min:8|max:16'
        ]);

        $employee = new Employees();
        $employee->employeeName = $request->employeeName;
        $employee->employeeMobile = $request->employeeMobile;
        $employee->employeeAddress = $request->employeeAddress;
        $employee->employeeEmail = $request->employeeEmail;
        $employee->employeePw = Hash::make($request->employeePw);
        //generate ID
        $employeeID = $this->generateRegistrationID();
        $input['employeeID'] = $employeeID;
        $employee->employeeID = $employeeID;

        $res = $employee->save();

        if($res)
            return back()->with('success', 'You have registered successfully.');     
        else
            return back()->with('fail', 'Something went wrong.');   
    }

    public function loginEmployee(Request $request){
        $request->validate([
            'employeeEmail'=>'required|email',
            'employeePw'=>'required'
        ]);

        $employee = Employees::where('employeeEmail','=',$request->employeeEmail)->first();
        if($employee){
            if(Hash::check($request->employeePw,$employee->employeePw)){
                $request->session()->put('loginEmployeeID',$employee->id);
                return redirect('/dashboard');
            }
            else{
                return back()->with('fail', 'Invalid email or password.');
            }
        }

        else{
            return back()->with('fail', 'Invalid email or password.');
        }
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginEmployeeID')){
            $data =Employees::where('id','=',Session::get('loginEmployeeID'))->first();
        }
        return view('welcome',compact('data'));
    }

    public function logout(){
        if(Session::has('loginEmployeeID')){
            Session::pull('loginEmployeeID');
            return view('welcome');
        }
    }

    function generateRegistrationID()
    {
        $employeeID =  mt_rand(10000000, 99999999); // better than rand()

        // call the same function if the id exists already
        if ($this->registrationIdExists($employeeID)) {
            return $this->generateRegistrationID();
        }
        
        // otherwise, it's valid and can be used
        return $employeeID;
    }

    function registrationIdExists($employeeID)
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Employees::where('employeeID', $employeeID)->exists();
    }
}