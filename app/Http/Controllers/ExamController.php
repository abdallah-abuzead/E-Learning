<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use App\Option;
use App\Question;
use Illuminate\Http\Request;
use Session;

class ExamController extends Controller
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
        return view("addExam");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $exam = new Exam();
       $exam->title = $request->get('title');
       $duration = $request->get('h').":".$request->get('m');
       $exam->duration = $duration;
       //$exam->duration = $request->get('duration');
       $exam->course_id = Session::get('courseId');
       $exam->save();

       Session::forget('courseId');
       Session::put("exam_id", $exam->id);
       Session::put("exam_title", $exam->title);

        return view("addQuestions");
    }

    public function storeQuestion(Request $request)
    {
        $question = new Question();
        $question->title = $request->get('title');
        $question->mark = $request->get('mark');
        $question->exam_id = Session::get('exam_id');

        $question->save();

        $options = ['A', 'B', 'C', 'D'];

        for($i = 0; $i < count($options); $i++) {
            if($request->exists("$options[$i]")) {
                $option = new Option();

                $option->value = $request->get("$options[$i]");
                $option->quest_id = $question->id;
                $option->save();

                if($request->get('correct-ans') == $i) {
                    $question->correct_ans = $option->id;
                    $question->save();
                }
            } else {
                break;
            }
        }

        $questions = Question::all()->where("exam_id", Session::get('exam_id'));
        return view("addQuestions")->with('questions', $questions);
    }

    public function deleteQuestion($id) {
        $question = Question::find($id);

        $options = Option::all()->where("quest_id", $id);

        foreach ($options as $option) {
            $option->delete();
        }
        $question->delete();

        $questions = Question::all()->where("exam_id", Session::get('exam_id'));
        return view("addQuestions")->with('questions', $questions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::all()->where("course_id", $id);

        return view('startExam')->with("exam", $exam[0]);
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

    public function showResult(Request $request, $id)
    {
        $exam = Exam::find($id);
        $pivoteTable = $exam->course->students->where('id', Session::get('frontSession')->id);
        $pivoteTable[0]->pivot->commulativeGrade = 0;
        foreach ($exam->questions as $question) {
            if($request->get("$question->id") == $question->correctAnswer->id) {
                $pivoteTable[0]->pivot->commulativeGrade += $question->mark;
            }
        }
        $pivoteTable[0]->pivot->save();

        return view('examResult')->with("exam", $exam);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();
    }
}
