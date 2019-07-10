<?php

namespace App\Http\Controllers;

use  App\Courses;
use App\Student;
use App\Videos;

use App\Lecturers;

use Illuminate\Http\Request;

class CoursesController extends Controller
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
        return view('Courses.create',['Lecturers'=>Lecturers::all()] );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'Subject'=>'required|alpha',
            'description'=>'required|alpha',
            'level'=>'required|alpha',
            'cost'=>'required',
            'NumberOfHours'=>'required',
            'lectureID'=>'required',


        ]);

        $courses = new Courses();

        $courses->subject = $request->input('Subject');
        $courses->description = $request->input('description');
        $courses->level = $request->input('level');
        $courses->cost = $request->input('cost');
        $courses->numOfHours = $request->input('NumberOfHours');
        $courses->lec_id = $request->input('lectureID');

        $courses->save();
        return redirect('/homeStudent');

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
        $course = Courses::find($id);
        $videos = Videos::all()->where('course_id', $id);
        
        //dd($course->students[0]->pivot->commulativeGrade);
        return view("courseProfile")->with(compact('course', 'videos'));
    }

    public function enroll($id)
    {
        $course = Courses::find($id);
        return view("enrollCourse")->with("course", $course);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::find($id);
        $dir = base_path().'/public/courses/'.$course->subject.'_'.$course->id;

        if (is_dir($dir)) {
            $videos = scandir($dir);
            foreach ($videos as $video) {
                if ($video != '.' && $video != '..') unlink($dir . '/' . $video);
            }
            reset($videos);
            rmdir($dir);
        }
        $course->delete();
        return redirect('/homeStudent');
    }
}
