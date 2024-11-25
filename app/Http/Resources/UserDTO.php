<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDTO extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request) {
        
        return [
            'idUsuario' => $this->id,
            'nombreUsuario' => $this->name,
            'emailUsuario' => $this->email,
            'rolUsuario' => $this->role,
            ];
            
    }
}
