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
        $tags = Lesson::findOrFail($id)->tags;

        $fields = array();
        $filtred = array();

        foreach ($tags as $tag) {
            $fields['Name'] = $tag->name;
            $filtred[] = $fields;
        }

        return response()->json([
            'data' => $filtred
        ], 200);
    }
    // Tag's Lessons
    public function Tagslessons($id)
    {
        $lessons = Tag::findOrFail($id)->lessons;

        $fields = array();
        $filtred = array();

        foreach ($lessons as $lesson) {
            $fields['Title'] = $lesson->title;
            $fields['Body']  = $lesson->body;
            $filtred[] = $fields;
        }

        return response()->json([
            'data' => $filtred
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
