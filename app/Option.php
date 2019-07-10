<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'question_option';
    protected $primaryKey = 'id';
    protected $fillable = ['value'];
    public function question()
    {
        return $this->belongsTo('App\Question','quest_id');
    }
}
