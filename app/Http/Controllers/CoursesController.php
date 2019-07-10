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

    public function storeVideo(Request $request)
    {
        $this->validate($request, [
            'video' => 'required'
        ]);
        $course = Courses::find($request->input("id"));

        if ($request->hasFile('video')) {
//            $getID3 = new \getID3;
//            $file = $getID3->analyze($path);
//            $duration = date('H:i:s.v', $file['playtime_seconds']);

        $videoNameWithExt = $request->file('video')->getClientOriginalName();
        $videoName = pathinfo($videoNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('video')->getClientOriginalExtension();
        $videoNameToStore = $videoName.time().".".$extension;
        $path = $request->file('video')->move(base_path().'/public/videos', $videoNameToStore);
        }

        $video = new Videos();
        $video->name = $videoName;
        $video->video = $videoNameToStore;
        $video->extension = $extension;
        $video->course_id = $request->input("id");
        $video->save();
        return redirect('/courses/'.$request->input("id"));
    }

    public function playVideo($id)
    {
        $videos = Videos::all()->where('id', '>=', $id);
        $data = [];
        foreach ($videos as $v) $data[] = $v;
        $video = $data[0];
        $video1 = $data[1];
        $video2 = $data[2];

        $course = Courses::find($video->course_id);
        return view("playVideo")->with(compact("video", "video1", "video2", "course"));
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
        //
    }
}
