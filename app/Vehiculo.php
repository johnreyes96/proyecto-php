<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehiculos';

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
    protected $fillable = ['Placa', 'IdTipoVehiculo', 'IdMarca', 'IdModelo', 'IdColor', 'LicenciaTransito', 'IdCiudadLicencia', 'IdUsuario', 'IdModalidadServicio'];

    
}
