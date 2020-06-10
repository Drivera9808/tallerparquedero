@extends ('layouts.layout')
@section ('contenido')

<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3> Registrar Nuevo Empleado <a href="empleado/create"><button class="btn btn-success">Nuevo 
                    <span class="glyphicon glyphicon-folder-open"></span></button></a></h3>
        @include('Empleado.search')
        <h3>Listado de Empleados </h3>
    </div>
</div>
<div class="row" style="text-align: center">
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-15">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead class="thead-dark">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Clave</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id}}</td>
                    <td>{{ $empleado->nombre}}</td>
                    <td>{{ $empleado->apellido}}</td>
                    <td>{{ $empleado->cedula}}</td>
                    <td>{{ $empleado->direccion}}</td>
                    <td>{{ $empleado->telefono}}</td>
                    <td>{{ $empleado->email}}</td>
                    <td>{{ $empleado->cargo}}</td>
                    <td>{{ $empleado->clave}}</td>
                    <td>
                        <a href="{{URL::action('EmpleadoController@edit',$empleado->id)}}">
                            <button class="btn btn-info">Editar <span class="glyphicon glyphicon-pencil"></button></a>
                        <a href="" data-target="#modal-delete-{{$empleado->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar <span class="glyphicon glyphicon-remove"></button></a>
                    </td>
                </tr>
                @include('Empleado.modal')
                @endforeach
            </table>
        </div>
        {{$empleados->render()}}
    </div>
</div>
@endsection