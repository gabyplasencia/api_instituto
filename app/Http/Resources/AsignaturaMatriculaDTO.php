<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AsignaturaMatriculaDTO extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'idMatricula' => $this->asignaturas->idmatricula,
            'idAsignatura' => $this->asignaturas->idasignatura,
            ];
    }
}
