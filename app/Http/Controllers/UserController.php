<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = UserResource::collection(User::all());
       return $user->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new UserResource(User::create($request->all()));
        return $user->response()->setStatusCode(200," User created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = new  UserResource(User::findOrFail($id));
        return $user->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = new UserResource(User::findOrFail($id));
        $user->update($request->all());
        return $user->response()->setStatusCode(200," User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return 204;
    }
}
