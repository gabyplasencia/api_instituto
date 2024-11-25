<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $nombre = $request->input('nombre');
        $alumno = Alumno::where('nombre', $nombre)->first();
        return response()->json($alumno);
        // return response()->json([
        // 'foo' => 'bar',
        // ]);
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
    //Solo funciona con la primary key
    public function show(Alumno $alumno)
    {
        return response()->json($alumno);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
