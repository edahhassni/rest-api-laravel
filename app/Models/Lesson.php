<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Tag;
use App\Models\User;

class Lesson extends Model
{
        use HasFactory;
    protected $fillable = ['title', 'body', 'user_id'];


    public function tags() 
    {
        return $this->belongsToMany(Tag::class, 'lesson_tags');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
