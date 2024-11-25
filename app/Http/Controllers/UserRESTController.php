<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDTO;
use App\Models\User;
use Illuminate\Http\Request;

class UserRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserDTO::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
