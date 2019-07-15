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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = Comment::find($id);
        $comment->comment = $request->input('comment');
        $comment->save();
        if($comment->video_id == null)
            return redirect('/courses/'.$comment->course_id);
        else
            return redirect('/playVideo/'.$comment->video_id);
    }

    //===========================================================================================

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        if($comment->course_id == null)
            return redirect('/playVideo/'.$comment->video_id);
        else
            return redirect('/courses/'.$comment->course_id);
    }
}
