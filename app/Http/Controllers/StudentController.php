<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Courses;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::find($id);
        return view("studentProfile")->with("student", $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // Session::flash('username', $request->input("username"));
        // Session::flash('email', $request->input("email"));
        // Session::flash('fullname', $request->input("fullname"));
        // Session::flash('password', $request->input("password"));

        return view("studentProfileEdit")->with("id", $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = User::find($id);
        //-----------------------------------
        if ($request->hasFile('profilePic')) {
            $picNameWithExt = $request->file('profilePic')->getClientOriginalName();
            $picName = pathinfo($picNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profilePic')->getClientOriginalExtension();
            $picNameToStore = $picName.time().".".$extension;
            $request->file('profilePic')->move(base_path().'/public/profilePic/', $picNameToStore);
        }

        //-----------------------------------
        if(!Hash::check($request->get('oldPassword'),$student->password)){
            return redirect()->back()->with('flash_message_error','old password is not correct');
        }
        $student->profilePic = $picNameToStore;
        $student->username = $request->get('username');
        $student->email = $request->get('email');
        $student->fullName = $request->get('fullname');
        ////////////////
        $student->password = bcrypt($request->get('password'));
        $student->save();

        return redirect("student-profile/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
