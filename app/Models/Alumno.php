<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dni
 * @property string $nombre
 * @property string $apellidos
 * @property integer $fechanacimiento
 * @property Matricula[] $matriculas
 */
class Alumno extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'dni';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['dni', 'nombre', 'apellidos', 'fechanacimiento'];

    protected $dates = [ 'fechanacimiento' ];

    public function setFechaNacimientoAttribute( $value){
        //esta función toma una string para guardar en la base de datos
        $this->attributes['fechanacimiento'] = Carbon::parse($value)->getTimestampMs();
    }
        
    //esta función toma la info de la DDBB y lo muestra
    public function getFechaNacimientoAttribute( $value){
        return Carbon::createFromTimestampMs($value)->format('d/m/Y H:i');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany('App\Models\Matricula', 'dni', 'dni');
    }
}
