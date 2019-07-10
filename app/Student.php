<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';
    protected $fillable = ['fullName', 'username', 'password', 'email'];
    public function courses()
    {
<<<<<<< HEAD
        return $this->belongsToMany(Courses::class , 'courses_student' ,'student_id', 'course_id')->withPivot('commulativeGrade');
=======
        return $this->belongsToMany(Courses::class , 'courses_student' ,'student_id' ,'course_id');
>>>>>>> 81576c669c8714ff873ca66a65ef5f0aaa13cf51
    }
}
