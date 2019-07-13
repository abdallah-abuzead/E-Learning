<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'question_option';
    protected $primaryKey = 'id';
    protected $fillable = ['value', 'quest_id'];
    public function question()
    {
        return $this->belongsTo('App\Question','quest_id');
    }
    public function answerOf()
    {
        return $this->hasOne('App\Question','correct_ans');
    }
}
