<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $fillable = ['subject','description','level','cost','numOfHours', 'lec_id'];
    public function lecturer()
    {
        return $this->belongsTo('App\Lecturers','lec_id');
    }
    public function videos()
    {
        return $this->hasMany('App\Videos', 'course_id');
    }
    public function students()
    {
<<<<<<< HEAD
        return $this->belongsToMany(Student::class, 'courses_student' ,'course_id')->withPivot('commulativeGrade');
=======
        return $this->belongsToMany(Student::class , 'courses_student' ,'course_id','student_id')->withPivot('commulativeGrade');
>>>>>>> 81576c669c8714ff873ca66a65ef5f0aaa13cf51
    }
}
