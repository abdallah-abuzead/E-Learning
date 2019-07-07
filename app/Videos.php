<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = "videos";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'url', 'extention', 'course_id'];
    public function course(){
        return $this->belongsTo('App\Courses', 'course_id');
    }
}
