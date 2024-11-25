<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $dni
 * @property integer $year
 * @property AsignaturaMatricula[] $asignaturaMatriculas
 * @property Alumno $alumno
 */
class Matricula extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['dni', 'year'];
    public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaturaMatriculas()
    {
        return $this->hasMany('App\Models\AsignaturaMatricula', 'idmatricula');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno', 'dni', 'dni');
    }

    public function asignaturas() {
        return $this->belongsToMany(
            Asignatura::class,
            'asignatura_matricula',
            'idmatricula',
            'idasignatura',
        );
    }
}
