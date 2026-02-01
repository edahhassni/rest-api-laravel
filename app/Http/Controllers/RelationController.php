<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;

class RelationController extends Controller
{
    // Lesson's Tags
    public function LessonTags($id)
    {
       return Lesson::findOrFail($id)->tags;

    }
    // Tag's Lessons
    public function Tagslessons($id)
    {
       return Tag::findOrFail($id)->lessons;

    }
    // User's Lessons
    public function UserLesson($id)
    {
        return User::findOrFail($id)->lessons;

    }
}
