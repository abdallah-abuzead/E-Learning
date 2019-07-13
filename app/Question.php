<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'mark', 'correct_ans', 'exam_id'];
    public function exam()
    {
        return $this->belongsTo('App\Exam', 'exam_id');
    }
    public function correctAnswer()
    {
        return $this->belongsTo('App\Option', 'correct_ans');
    }
    public function options()
    {
        return $this->hasMany('App\Option', 'quest_id');
    }
}
