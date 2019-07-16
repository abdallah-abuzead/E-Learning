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
            'level'=>'required|alpha',
            'cost'=>'required|max:1000|regex:/^[0-9]+(?:\.[0-9]{1,2})?$/',
            'NumberOfHours'=>'required|integer|min:1',
            // 'lectureID'=>'required',


        ]);

        $courses = new Courses();

        $courses->subject = $request->input('Subject');
        $courses->level = $request->input('level');
        $courses->cost = $request->input('cost');
        $courses->numOfHours = $request->input('NumberOfHours');
        $courses->lec_id = Session::get('frontSession')->id;
        $courses->coursePic = "default.jpg";

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

    //===========================================================================

    public function edit($id)
    {
        $course = Courses::find($id);
        return view('Courses.update')->with('course', $course);
    }

    //===========================================================================

    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'Subject'=>'required',
            'level'=>'required|alpha',
            'cost'=>'required|max:1000|regex:/^[0-9]+(?:\.[0-9]{1,2})?$/',
            'NumberOfHours'=>'required|integer|min:1',
            'coursePic'=>'required',


        ]);
//        dd($request->input('coursePic'));
        $courses = Courses:: find($id);

        $courses->subject = $request->input('Subject');
        $courses->level = $request->input('level');
        $courses->cost = $request->input('cost');
        $courses->numOfHours = $request->input('NumberOfHours');
        //------------------------------------
        if ($request->hasFile('coursePic')) {
            $picNameWithExt = $request->file('coursePic')->getClientOriginalName();
            $picName = pathinfo($picNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('coursePic')->getClientOriginalExtension();
            $picNameToStore = $picName.time().".".$extension;
            $request->file('coursePic')->move(base_path().'/public/coursePic/', $picNameToStore);
        }
        else
            $picNameToStore = "default.jpg";
        $courses->coursePic = $picNameToStore;
        //------------------------------------
        $courses->save();
        return redirect('/courses/'.$id);

        //
    }

    //===========================================================================

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
