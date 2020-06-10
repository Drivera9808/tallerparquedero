<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TipoVehiculoFormRequest;
use App\Http\Requests;
use App\Tipo_vehiculo;
use DB;

class TipoVehiculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipo_vehiculo = Tipo_vehiculo::all(); //findOrfail(1)
        return view('TipoVehiculo.index')->with('tipo_vehiculo', $tipo_vehiculo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        return view('TipoVehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoVehiculoFormRequest  $request)
    {
        $request->user()->authorizeRoles('admin');

        $tipo_vehiculo = new Tipo_vehiculo;
        $tipo_vehiculo->nombre = $request->get('nombre');
        $tipo_vehiculo->descripcion = $request->get('descripcion');
        $tipo_vehiculo->save();
        return Redirect::to('tipovehiculo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $tipo_vehiculos = Tipo_vehiculo::find($id);
        return view('TipoVehiculo.show', compact('tipo_vehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $tipo_vehiculo = Tipo_vehiculo::find($id);
        return view('tipovehiculo.edit', compact('tipo_vehiculo'));

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
        $request->user()->authorizeRoles('admin');

        $this->validate($request, ['nombre' => 'required',  'descripcion' => 'required']);
        Tipo_vehiculo::find($id)->update($request->all());
        return redirect()->route('tipovehiculo.index')->with('success', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles('admin');
        
        Tipo_vehiculo::find($id)->delete();
        return redirect()->route('tipovehiculo.index')->with('success', 'Tarifa Eliminada');
    }
}
