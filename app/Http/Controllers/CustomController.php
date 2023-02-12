<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomController extends Controller
{
    public function login(){
        return view ("auth.login");
    }
    public function register(){
        return view ("auth.register");
    }

    public function registerDoctor(Request $request){
        $request->validate([
            'docFirstName'=>'required',
            'docLastName'=>'required',
            'docEmail'=>'required|email|unique:doctors',
            'docSpecialist'=>'required',
            'docPw'=>'required|min:8|max:16'
        ]);

        $doctor = new Doctors();
        $doctor->docFirstName = $request->docFirstName;
        $doctor->docLastName = $request->docLastName;
        $doctor->docEmail = $request->docEmail;
        $doctor->docSpecialist = $request->docSpecialist;
        $doctor->docPw = Hash::make($request->docPw);

        $res = $doctor->save();

        if($res)
            return back()->with('success', 'You have registered successfully.');     
        else
            return back()->with('fail', 'Something went wrong.');      
    }

    public function loginDoctor(Request $request){
        $request->validate([            
            'docEmail'=>'required|email',
            'docPw'=>'required'
        ]);

        $doctor = Doctors::where('docEmail','=',$request->docEmail)->first();
        if($doctor){
            if(Hash::check($request->docPw,$doctor->docPw)){
                $request->session()->put('loginID',$doctor->id);
                return redirect('/employeeDashboard');
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
        if(Session::has('loginID')){
            $data = Doctors::where('id','=',Session::get('loginID'))->first();
        }
        return view('welcome',compact('data'));
    }

    public function logout(){
        if(Session::has('loginID')){
            Session::pull('loginID');
            return view('welcome');
        }
    }
}