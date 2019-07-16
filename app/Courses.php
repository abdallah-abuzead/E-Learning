<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $fillable = ['subject','description','level','cost','numOfHours', 'lec_id', 'coursePic'];
    public function lecturer()
    {
        return $this->belongsTo('App\User','lec_id');
    }
    public function videos()
    {
        return $this->hasMany('App\Videos', 'course_id');
    }
    public function students()
    {
        //return $this->belongsToMany(Student::class, 'courses_student' ,'course_id')->withPivot('commulativeGrade');
        return $this->belongsToMany(User::class , 'courses_student' ,'course_id','student_id')->withPivot('commulativeGrade');

    }
    public function descriptions()
    {
        return $this->hasMany('App\Description', 'course_id');
    }
    public function exam()
    {
        return $this->hasOne('App\Exam','course_id');

    }
    public function comments()
    {
        return $this->hasMany('App\Comment','course_id');
    }
}
