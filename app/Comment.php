<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $fillable = ['comment','user_id', 'course_id', 'video_id'];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Courses','course_id');
    }
    public function video()
    {
        return $this->belongsTo('App\Videos','video_id');
    }
}
