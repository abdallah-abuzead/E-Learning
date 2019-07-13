<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $table = 'description';
    protected $primaryKey = 'id';
    protected $fillable = ['description','course_id'];
    public function course()
    {
        return $this->belongsTo('App\Courses','course_id');
    }
}
