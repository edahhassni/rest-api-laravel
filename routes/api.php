<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'v1'], function () {

    // CRUD Lesson
    Route::apiResource('lessons', LessonController::class);
    // CRUD User
    Route::apiResource('user', UserController::class);
    // CRUD Tag
    Route::apiResource('tag', TagController::class);

    // Relationships 
    Route::get('user/{id}/lessons', [RelationController::class, 'UserLessons']);
    Route::get('lesson/{id}/tags', [RelationController::class, 'LessonTags']);
    Route::get('tag/{id}/lessons', [RelationController::class, 'TagsLessons']);



    // Deprecated endpoint notice
    Route::any('oldlesson', function () {
        $message = 'This is not updated api';

        return Response::json($message, 404);
    });

});
