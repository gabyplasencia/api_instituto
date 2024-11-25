<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlumnoDTO;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Esta es la URL http://127.0.0.1:8000/api/alumnos?nombre=jose usando GET
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
    //En la URL http://127.0.0.1:8000/api/alumnos?dni=11111111S&nombre=lolimar&apellidos=gomez gomez&fechanacimiento=1999-01-01 con POST
    public function store(Request $request)
    {
        $alumno = Alumno::create([
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'fechanacimiento' => $request->fechanacimiento,
            ]);
        return new AlumnoDTO($alumno);
    }

    /**
     * Display the specified resource.
     */
    //Solo funciona con la primary key
    // Esta es la URL http://127.0.0.1:8000/api/alumnos/00000000P usando GET
    public function show(Alumno $alumno)
    {
        return response()->json($alumno);
    }

    /**
     * Update the specified resource in storage.
     */
    //En la URL http://127.0.0.1:8000/api/alumnos/11111111S?nombre=lolimarModificada&apellidos=diaz diaz con PUT
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->only(['nombre', 'apellidos', 'fechanacimiento']));
        return new AlumnoDTO($alumno);
    }

    /**
     * Remove the specified resource from storage.
     */
    //En la URL http://127.0.0.1:8000/api/alumnos/11111111S con DELETE
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json(null, 204);
    }
}
