<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    protected $table = 'lecturer';
    protected $primaryKey = 'id';
    protected $fillable = ['fullName', 'username', 'password', 'email', 'title'];
    public function courses()
    {
        return $this->hasMany('App\Courses', 'lec_id');
    }
}
