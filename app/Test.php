<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;


    protected $fillable=['course_id', 'lesson_id', 'title', 'description', 'is_published'];


    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }

    public function questions(){
        return $this->belongsToMany(Question::class);
    }
}
