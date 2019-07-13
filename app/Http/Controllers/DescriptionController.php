<?php

namespace App\Http\Controllers;

use App\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $description = new Description();
        $description->description = $request->input('description');
        $description->course_id = $request->input('course_id');
        $description->save();
        return redirect('/courses/'.$request->input('course_id'));
    }

    //=======================================================================================================

    public function edit($id)
    {
        $description = Description::find($id);
        return view('/updateDescription')->with('description', $description);
    }

    //=======================================================================================================

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);

        $description = Description:: find($id);
        $description->description = $request->input('description');
        $description->save();
        return redirect('/courses/'.$description->course_id);
    }

    //=======================================================================================================

    public function destroy($id)
    {
        $description = Description::find($id);
        $description->delete();
        return redirect('/courses/'.$description->course_id);
    }
}
