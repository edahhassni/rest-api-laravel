<?php

namespace App\Models;

use Illuminate\Container\Attributes\Tag;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $fillable = ['title', 'body', 'user_id'];


    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'lesson_tags');
    }
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
