<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmpleadoFormRequest;
use App\Http\Requests;
use App\Empleado;
use DB;



class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $empleados = DB::table('empleados')->where('cedula', 'LIKE', '%' . $query . '%')->orderBy('id', 'asc')->paginate(5);
            return view('Empleado.index', ["empleados" => $empleados, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('Empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoFormRequest $request)
    {
        $empleado = new Empleado;
        $empleado->nombre = $request->get('nombre');
        $empleado->apellido = $request->get('apellido');
        $empleado->cedula = $request->get('cedula');
        $empleado->direccion = $request->get('direccion');
        $empleado->telefono = $request->get('telefono');
        $empleado->email = $request->get('email');
        $empleado->cargo = $request->get('cargo');
        $empleado->clave = $request->get('clave');
        $empleado->save();
        return Redirect::to('empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleados = Empleado::find($id);
        return view('Empleado.show', compact('empleados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('empleado.edit', compact('empleado'));
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
        $this->validate($request, [
            'nombre' => 'required',  'apellido' => 'required',
            'cedula' => 'required', 'direccion' => 'required', 'telefono' => 'required',
            'email' => 'required', 'cargo' => 'required', 'clave' => 'required'
        ]);
        empleado::find($id)->update($request->all());
        return redirect()->route('empleado.index')->with('success', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success', 'Registro Eliminado');
    }
}
