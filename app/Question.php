<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'mark'];
    public function exam()
    {
        return $this->belongsTo('App\Exam','exam_id');
    }
    public function options()
    {
        return $this->hasMany('App\Option', 'quest_id');
    }
}
