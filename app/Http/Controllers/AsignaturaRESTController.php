<?php

namespace App\Http\Controllers;

use App\Http\Resources\AsignaturaDTO;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    //En la URL http://127.0.0.1:8000/api/asignaturas?nombre=asigURL&curso=2ºDAM con POST
    public function store(Request $request)
    {
        $asignatura = Asignatura::create([
            'nombre' => $request->nombre,
            'curso' => $request->curso,
            ]);
        return new AsignaturaDTO($asignatura);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //En la URL http://127.0.0.1:8000/api/asignaturas/22?nombre=asigURL2&curso=1ºDAM con PUT
    public function update(Request $request, Asignatura $asignatura)
    {
        $asignatura->update($request->only(['nombre', 'curso']));
        return new AsignaturaDTO($asignatura);
    }

    /**
     * Remove the specified resource from storage.
     */
    //En la URL http://127.0.0.1:8000/api/asignaturas/22 con PUT
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return response()->json(null, 204);
    }
}
