<?php

namespace App\Http\Controllers;
use App\Courses;
use App\Student;
use App\Videos;
use Faker\Provider\File;
use Illuminate\Http\Request;

class VideoController extends Controller
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
            $request->file('video')->move(base_path().'/public/courses/'.$course->subject.'_'.$course->id, $videoNameToStore);
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
        $prevs = Videos::all()->where('id', '<', $id)->sortByDesc('id');
        $data = [];
        foreach ($prevs as $p) $data[] = $p;
        $prevs = $data;
        $videos = Videos::all()->where('id', '>=', $id);
        $data = [];
        foreach ($videos as $v) $data[] = $v;
        $videos = $data;
        $course = Courses::find($videos[0]->course_id);
        return view("playVideo")->with(compact("videos", "prevs", "course"));
    }

    public function playNextVideo($id)
    {
        $prevs = Videos::all()->where('id', '<=', $id)->sortByDesc('id');
        $data = [];
        foreach ($prevs as $p) $data[] = $p;
        $prevs = $data;
        $videos = Videos::all()->where('id', '>', $id);
        $data = [];
        foreach ($videos as $v) $data[] = $v;
        $videos = $data;
        $course = Courses::find($videos[0]->course_id);
        return view("playVideo")->with(compact("videos", "prevs", "course"));
    }

    public function playPreviousVideo($id)
    {
        $prevs = Videos::all()->where('id', '<', $id)->sortByDesc('id');
        $data = [];
        foreach ($prevs as $p) $data[] = $p;
        if (count($prevs) == 1) $prevs = [];
        $videos = Videos::all()->where('id', '>=', $data[0]->id);
        $data = [];
        foreach ($videos as $v) $data[] = $v;
        $videos = $data;
        $course = Courses::find($videos[0]->course_id);
        return view("playVideo")->with(compact("videos", "prevs", "course"));
    }

    public function show($id)
    {
        //
    }

    public function destroyVideo($id)
    {
        $video = Videos::find($id);
        $course = Courses::find($video->course_id);
        $dir = base_path().'/public/courses/'.$course->subject.'_'.$course->id.'/'.$video->video;
        unlink($dir);
        $video->delete();
        return redirect('/courseProfile/'.$course->id);
    }
}
