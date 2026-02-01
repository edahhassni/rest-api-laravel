<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'v1'], function () {

    // CRUD Lesson
    Route::get('lesson', function(){
        return Lesson::all();
    });

    Route::get('lesson/{id}', function ($id) {
        return Lesson::findOrFail($id);
    });

    Route::post('lesson', function (Request $request) {
        return Lesson::create($request->all());
    });

    Route::put('lesson/{id}', function (Request $request, $id) {
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());
    });

    Route::delete('lesson/{id}', function ($id) {
        Lesson::findOrFail($id)->delete();
    });


    // CRUD User
    Route::get('users', function () {
       return User::all();
    });

    Route::get('user/{id}', function ($id) {
        return User::findOrFail($id);
    });



    Route::post('user', function (Request $request) { 
        return User::create($request->all());
    });

    Route::put('user/{id}', function (Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    });

    Route::delete('user/{id}', function ($id) {
        User::findOrFail($id)->delete();
    });


    // CRUD Tag
    Route::get('tag', function () { 
        Tag::all();
    });

    Route::get('tag/{id}', function ($id) { 
        Tag::findOrFail($id);
    });

    Route::post('tag', function (Request $request) {
        Tag::create($request->all());
    });

    Route::put('tag/{id}', function (Request $request, $id) {
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());
    });

    Route::delete('tag/{id}', function ($id) {
        Tag::findOrFail($id)->delete();
    });


    // Relationships
    Route::get('user/{id}/lessons', function ($id) {
        return User::findOrFail($id)->lessons;
    });

    
    Route::get('lesson/{id}/tags', function ($id) {
       return Lesson::findOrFail($id)->tags;
    });


    // Deprecated endpoint notice
    Route::any('oldlesson', function () {
        return response()->json([
            'message' => 'This endpoint is deprecated'
        ], 410);
    });

});
