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
        return $this->belongsToMany(Courses::class , 'courses_student' ,'student_id', 'course_id')->withPivot('commulativeGrade');
    }
}
