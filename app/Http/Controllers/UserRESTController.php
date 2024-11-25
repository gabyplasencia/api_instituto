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
    //En la URL http://127.0.0.1:8000/api/asignaturas?nombre=asigURL&curso=2ºDAM con POST
    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
            ]);
        return new UserDTO($user);
    }

    /**
     * Display the specified resource.
     */
     // Esta es la URL http://127.0.0.1:8000/api/asignatura/18 usando GET
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    //En la URL http://127.0.0.1:8000/api/asignaturas/22?nombre=asigURL2&curso=1ºDAM con PUT
    public function update(Request $request, User $user)
    {
        $user->update($request->only(['name']));
        return new UserDTO($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    //En la URL http://127.0.0.1:8000/api/asignaturas/22 con DELETE
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
