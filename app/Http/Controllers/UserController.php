<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturers;
use App\Student;
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
                $lecturer = Lecturers::where('username',$data['username'])->first();
                if(!empty($lecturer) && Hash::check($password,$lecturer->password)){
                    Session::put('frontSession',$lecturer);
                    Session::put('type','lecturer');
                }
                else{
                    return redirect()->back()->with('flash_message_error','Invalid Username or Password!');
                }
            }
            else if($data['tabel']=='student'){
                $student = Student::where('username',$data['username'])->first();
                if(!empty($student) && Hash::check($password,$student->password)){
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

        $studentCount = Student::where('email',$data['email'])->count();
        $lecturerCount = Lecturers::where('email',$data['email'])->count();
        if($studentCount>0 || $lecturerCount>0){
            return redirect()->back()->with('flash_message_error','Email already exists!');
        }else{
            if($data['tabel'] == 'student'){
                $student = new Student;
                $student->fullName = $data['name'];
                $student->username = $data['username'];
                $student->email = $data['email'];
                /*if($data['password']!=$data['rePassword']){
                    return redirect()->back()->with('flash_message_error','Passwords are not matched!');
                }*/
                $student->password = bcrypt($data['password']);
                $student->save();
                
                $student = Student::where('email',$data['email'])->first();
                $password = $data['password'];
                if(!empty($student) && Hash::check($password,$student->password)){
                    Session::put('frontSession',$student);
                    Session::put('type','student');
                }
                return redirect('/homeStudent');
            }
            else {
                $lecturer = new Lecturers;
                $lecturer->fullName = $data['name'];
                $lecturer->username = $data['username'];
                $lecturer->email = $data['email'];
                $lecturer->title = $data['title'];
                $lecturer->password = bcrypt($data['password']);
                $lecturer->save();
                $lecturer = Lecturers::where('email',$data['email'])->first();
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
