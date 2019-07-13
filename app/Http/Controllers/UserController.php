<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturers;
use App\Student;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }
    public function registerPage(){
        return view('auth.register');
    }
    public function logout(){
        Session::forget('frontSession');
        Session::forget('type');
        return redirect('/home');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $username = $data['username'];
            $password = $data['password'];

            if($data['tabel']=='lecturer'){
                $lecturer = User::where('username',$data['username'])->first();
                if(!empty($lecturer) && Hash::check($password,$lecturer->password) && $lecturer->type == 1){
                    Session::put('frontSession',$lecturer);
                    Session::put('type','lecturer');
                }
                else{
                    return redirect()->back()->with('flash_message_error','Invalid Username or Password!');
                }
            }
            else if($data['tabel']=='student'){
                $student = User::where('username',$data['username'])->first();
                if(!empty($student) && Hash::check($password,$student->password) && $student->type == 0){
                    Session::put('frontSession',$student);
                    Session::put('type','student');
                }
                else{
                    return redirect()->back()->with('flash_message_error','Invalid Username or Password!');
                }
            }
                return redirect('/homeStudent');
        }
    }

public function register(Request $request){
    if($request->isMethod('post')){
        $data = $request->all();

        $usersnameCount = User::where('username',$data['username'])->count();
        $usersemailCount = User::where('email',$data['email'])->count();
        if($usersnameCount>0){
            return redirect()->back()->with('flash_message_error','User Name already exists!');
        }
        else if($usersemailCount>0){
            return redirect()->back()->with('flash_message_error','User Email already exists!');
        }
        else{
            if($data['tabel'] == 'student'){
                $student = new User;
                $student->fullName = $data['name'];
                $student->username = $data['username'];
                $student->email = $data['email'];
                $student->type = 0;
                /*if($data['password']!=$data['rePassword']){
                    return redirect()->back()->with('flash_message_error','Passwords are not matched!');
                }*/
                $student->password = bcrypt($data['password']);
                $student->save();
                
                $student = User::where('email',$data['email'])->first();
                $password = $data['password'];
                if(!empty($student) && Hash::check($password,$student->password)){
                    Session::put('frontSession',$student);
                    Session::put('type','student');
                }
                return redirect('/homeStudent');
            }
            else {
                $lecturer = new User;
                $lecturer->fullName = $data['name'];
                $lecturer->username = $data['username'];
                $lecturer->email = $data['email'];
                $lecturer->type = 1;
                $lecturer->title = $data['title'];
                $lecturer->password = bcrypt($data['password']);
                $lecturer->save();
                $lecturer = User::where('email',$data['email'])->first();
                $password = $data['password'];
                if(!empty($lecturer) && Hash::check($password,$lecturer->password)){
                    Session::put('frontSession',$lecturer);
                    Session::put('type','lecturer');
                }
                return redirect('/homeStudent');
            }
        }	
    }
}
}
