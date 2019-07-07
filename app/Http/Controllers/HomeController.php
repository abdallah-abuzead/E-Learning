<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homeStudent()
    {
        $courses = Courses::all();
        return view('homeStudent')->with("courses", $courses);
    }
    public function homeInstructor()
    {
        return view('homeInstructor');
    }

    public function addCourses()
    {
        return view('Courses.create');
    }

}
