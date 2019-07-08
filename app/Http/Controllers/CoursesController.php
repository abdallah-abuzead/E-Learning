<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Student;
use App\Videos;
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
        $video = Videos::find($id);
        $course = Courses::find($video->course_id);
        return view("playVideo")->with(compact("video", "course"));
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
