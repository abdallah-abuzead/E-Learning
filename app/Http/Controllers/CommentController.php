<?php

namespace App\Http\Controllers;
use Session;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    //===========================================================================================

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = Session::get('frontSession')->id;
        $comment->course_id = $request->input('course_id');
        $comment->video_id = $request->input('video_id');
        $comment->save();
        if($request->input('video_id') == null)
            return redirect('/courses/'.$request->input('course_id'));
        else
            return redirect('/playVideo/'.$request->input('video_id'));
    }

    //===========================================================================================

    public function show($id)
    {
        //
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
