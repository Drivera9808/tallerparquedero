<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
 
    //Relacion con la tabla Ingreso_vehiculo
   public $timestamps = false;
   protected $fillable = ['color','placa', 'tipo', 'modelo'];
    public function ingreso_vehiculo()
    {
    return $this->hasManythrough(Salida_Vehiculo::class,Ingreso_Vehiculo::class);
    } 

}
