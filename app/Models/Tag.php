<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonTag extends Model
{
    protected $fillable = ['name'];

    public function lesson()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_tags');
    }

}
