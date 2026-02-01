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
       $lessons = Lesson::findOrFail($id)->tags;
        return response()->json([
           'data' => $lessons
        ], 200);

    }
    // Tag's Lessons
    public function Tagslessons($id)
    {
       $tags = Tag::findOrFail($id)->lessons;
         return response()->json([
          'data' => $tags
         ], 200);

    }
    // User's Lessons
    public function UserLessons($id)
    {
        $users = User::findOrFail($id)->lessons;
        return response()->json([
            'data' => $users
        ], 200);
    }
}
