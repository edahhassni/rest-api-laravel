<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Lesson;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('lesson', function () {
    return Lesson::all();
});

Route::get('lesson/{id}', function ($id) {
    return Lesson::find($id);
});

Route::post('lesson', function (Request $request) {
    return Lesson::create($request->all());
});

Route::put('lesson/{id}', function (Request $request, $id) {
    $lesson = Lesson::findOrFail($id);
    $lesson->update($request->all());
});

Route::delete('lesson/{id}', function ($id) {
    Lesson::findOrFail($id);
    return 200;
});