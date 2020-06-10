<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];
    protected $dates = ['fecha_ingreso', 'fecha_salida'];

    public $timestamps = false;
    public function ingreso_vehiculo()
    {
        return $this->belongsTo('App\Ingreso_vehiculo');
    }   
}
