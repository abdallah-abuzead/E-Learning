<?php

namespace App\Http\Controllers;

use  App\Courses;
use App\Student;
use App\Videos;

use App\Lecturers;
use Session;
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
        // return view('Courses.create',['Lecturers'=>Lecturers::all()] );
        return view('Courses.create');

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
            'Subject'=>'required',
            'description'=>'required',
            'level'=>'required|alpha',
            'cost'=>'required|max:1000|regex:/^[0-9]+(?:\.[0-9]{1,2})?$/',
            'NumberOfHours'=>'required|integer|min:1',
            // 'lectureID'=>'required',


        ]);

        $courses = new Courses();

        $courses->subject = $request->input('Subject');
        $courses->description = $request->input('description');
        $courses->level = $request->input('level');
        $courses->cost = $request->input('cost');
        $courses->numOfHours = $request->input('NumberOfHours');
        $courses->lec_id = Session::get('frontSession')->id;

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
        $enrolled = false ;
        foreach($course->students as $student){
            if(!empty(Session::get('frontSession')) && $student->id == Session::get('frontSession')->id){
                $enrolled = true;
                break;
            }
        }
        //dd($course->students[0]->pivot->commulativeGrade);
        return view("courseProfile")->with(compact('course', 'videos','enrolled'));
    }

    public function enroll($id)
    {
        $course = Courses::find($id);
        $videos = Videos::all()->where('course_id', $id);
        $enrolled = false ;

        $course->students()->attach(Session::get('frontSession')->id);
        
        foreach($course->students as $student){
            if($student->id == Session::get('frontSession')->id){
                $enrolled = true;
                break;
            }
        }
        // we should make the enrollment here
        return view("courseProfile")->with(compact('course', 'videos','enrolled'));
        //return view("enrollCourse")->with("course", $course);
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
    public function search()
    {
        $word = request('word');
        $courses = Courses::where('subject', 'like', "%$word%")->orWhere('cost', 'like', "%$word%")->get();
        return view('homeStudent', compact('courses'));
    }
}
