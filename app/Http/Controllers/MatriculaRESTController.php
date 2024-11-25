<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatriculaDTO;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //En la URL http://127.0.0.1:8000/api/matriculas con GET
    public function index()
    {
        return MatriculaDTO::collection(Matricula::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    //En la URL http://127.0.0.1:8000/api/matriculas?dni=00000000P&year=2000 con POST
    public function store(Request $request)
    {
        $matricula = Matricula::create([
            'dni' => $request->dni,
            'year' => $request->year,
            ]);
        return new MatriculaDTO($matricula);
    }

    /**
     * Display the specified resource.
     */
    // Esta es la URL http://127.0.0.1:8000/api/matriculas/44 usando GET
    public function show(Matricula $matricula)
    {
        return response()->json($matricula);
    }

    /**
     * Update the specified resource in storage.
     */
        //En la URL http://127.0.0.1:8000/api/matriculas/44?year=2001 con PUT
    public function update(Request $request, Matricula $matricula)
    {
        $matricula->update($request->only(['dni', 'year']));
        return new MatriculaDTO($matricula);
    }

    /**
     * Remove the specified resource from storage.
     */
    //En la URL http://127.0.0.1:8000/api/matriculas/44 con DELETE
    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return response()->json(null, 204);
    }
}
