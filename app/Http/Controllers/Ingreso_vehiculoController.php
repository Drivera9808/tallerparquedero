<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Ingreso_vehiculo;
use DB;


class Ingreso_vehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ingreso = DB::table('ingreso_vehiculos as i')
            ->join('vehiculos as v','i.vehiculos_id', '=','v.id')
            ->join('users as u','u.id','=','i.users_id')
            ->Select('i.id','i.fecha_ingreso','i.estado','i.users_id','i.vehiculos_id','u.name','v.placa')
            ->where('v.placa', 'LIKE', '%' . $query . '%')
            ->paginate(10);
            return view('ingresoVehiculo.index', ["ingreso" => $ingreso, "searchText" => $query]);

        //$ingreso = Ingreso_vehiculo::all();
        //return view('IngresoVehiculo.index')->with('ingreso', $ingreso);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $vehiculo = DB::table('vehiculos')
            ->select('vehiculos.placa', 'vehiculos.id')
            ->get();
        return view('IngresoVehiculo.create')->with('vehiculo', $vehiculo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso = new Ingreso_vehiculo;
        $ingreso->id = $request->get('id');
        $ingreso->fecha_ingreso = $request->get('fecha_ingreso');
        $ingreso->estado = $request->get('estado');
        $ingreso->users_id = $request->get('users_id');
        $ingreso->vehiculos_id = $request->get('vehiculos_id');
        $ingreso->save();
        return Redirect::to('ingresoV');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso = Ingreso_Vehiculo::find($id);
        return view('IngresoVehiculo.show', compact('ingresoVehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingreso = Ingreso_Vehiculo::find($id);
        $vehiculos_id= DB::table('ingreso_vehiculos')->select('ingreso_vehiculos.id', 'ingreso_vehiculos.vehiculos_id')->get();
        return view('ingresoVehiculo.edit', compact('ingreso'))->with('vehiculos_id', $vehiculos_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['fecha_ingreso' => 'required', 'estado' => 'required', 'users_id' => 'required', 'vehiculos_id' => 'required']);
        Ingreso_Vehiculo::find($id)->update($request->all());
        return Redirect()->route('ingresoVehiculo.index')->with('success', 'Ingreso Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingreso_Vehiculo::find($id)->delete();
        return redirect()->route('ingresoVehiculo.index')->with('success', 'Ingreso Eliminado');
    }
}
