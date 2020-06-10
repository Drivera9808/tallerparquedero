<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso_vehiculo extends Model
{
    protected $guarded = [];
    protected $dates = ['fecha_ingreso'];
    public $timestamps = false;
    //Relacion con la tabla vehiculo
    public function vehiculo()
    {
        return $this->belongsTo('App\Vehiculo');
    }
}
