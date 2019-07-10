<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $fillable = ['subject', 'lec_id'];

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
        return $this->belongsToMany(Student::class, 'courses_student' ,'course_id')->withPivot('commulativeGrade');
    }
}
