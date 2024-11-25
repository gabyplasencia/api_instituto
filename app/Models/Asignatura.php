<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nombre
 * @property string $curso
 * @property AsignaturaMatricula[] $asignaturaMatriculas
 */
class Asignatura extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nombre', 'curso'];
    public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaturaMatriculas()
    {
        return $this->hasMany('App\Models\AsignaturaMatricula', 'idasignatura');
    }

    public function matriculas() {
        return $this->belongsToMany(
            Matricula::class,
            'asignatura_matricula',
            'idasignatura',
            'idmatricula',
        );
    }
}
