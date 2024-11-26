<?php

namespace App\Http\Controllers;

use App\Http\Resources\AsignaturaMatriculaDTO;
use App\Models\Matricula;
use Illuminate\Http\Request;

class AsignaturaMatriculaRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::all();
        $info = [];
        foreach($matriculas as $matricula){
            $asignatura = $matricula->asignaturas;
            array_push($info, $asignatura);
        }
        // return AsignaturaMatriculaDTO::collection($asignaturas);
        return $info;
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
