<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaVehiculo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'linea_vehiculos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['LineaVehiculo', 'IdMarca'];

    
}
