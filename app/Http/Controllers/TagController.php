<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Tag::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tag::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Tag::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return 204;
    }
}
