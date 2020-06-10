@extends ('layouts.layout')
@section ('contenido')

<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


        <h3>Registrar Nuevo Tipo De Vehiculo<a href="/tipovehiculo/create">
                <button class="btn btn-success">Nuevo <span class="glyphicon glyphicon-folder-open"></span>
                </button></a></h3>


        <h3>Reporte Todos Los Tipos De Vehiculos <a href="\imprimirTipoVehiculos"><button class="btn btn-warning">
                    <span class="glyphicon glyphicon-downloadalt"></span> Generar PDF</button></a></h3>

        <h3>Listado Tipos De Vehiculos </h3>

    </div>
</div>
<div class="row" style="text-align: center">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead class="thead-dark">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($tipo_vehiculo as $tipo_vehiculo)
                <tr>
                    <td>{{ $tipo_vehiculo->id}}</td>
                    <td>{{ $tipo_vehiculo->nombre}}</td>
                    <td>{{ $tipo_vehiculo->descripcion}}</td>
                    <td>
                        <a href="{{URL::action('TipoVehiculoController@edit',$tipo_vehiculo->id)}}">
                            <button class="btn btn-info">Editar <span class="glyphicon glyphicon-pencil"></button></a>
                        <a href="" data-target="#modal-delete-{{$tipo_vehiculo->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar <span class="glyphicon glyphicon-remove"></button></a>
                        <a href="{{URL::action('PdfController@imprimirTipoVehiculoUnico',$tipo_vehiculo->id)}}"><button class="btn btn-warning">
                                <span class="glyphicon glyphicon-downloadalt"></span> Generar PDF</button></a>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection