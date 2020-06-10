@extends ('layouts.layout')
@section ('contenido')

<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3> Registrar Nuevo Vehiculo <a href="vehiculo/create"><button class="btn btn-success">Nuevo
                    <span class="glyphicon glyphicon-folder-open"></span></button></a></h3>


        <h3>Reporte Todos Los Vehiculos <a href="\imprimirVehiculos"><button class="btn btn-warning">
                    <span class="glyphicon glyphicon-downloadalt"></span> Generar PDF</button></a></h3>

        @include('Vehiculo.search')
        <h3>Listado de Vehiculos </h3>

    </div>
</div>
<div class="row" style="text-align: center">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead class="thead-dark">
                    <th>Id</th>
                    <th>color</th>
                    <th>tipo</th>
                    <th>placa</th>
                    <th>modelo</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id}}</td>
                    <td>{{ $vehiculo->color}}</td>
                    <td>{{ $vehiculo->tipo}}</td>
                    <td>{{ $vehiculo->placa}}</td>
                    <td>{{ $vehiculo->modelo}}</td>
                    <td>
                        <a href="{{URL::action('VehiculoController@edit',$vehiculo->id)}}">
                            <button class="btn btn-info">Editar <span class="glyphicon glyphicon-pencil"></button></a>
                        <a href="" data-target="#modal-delete-{{$vehiculo->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar <span class="glyphicon glyphicon-remove"></button></a>
                        <a href="{{URL::action('PdfController@imprimirVehiculoUnico',$vehiculo->id)}}"><button class="btn btn-warning">
                                <span class="glyphicon glyphicon-downloadalt"></span> Generar PDF</button></a>
                    </td>
                </tr>
                @include('Vehiculo.modal')
                @endforeach
            </table>
        </div>
        {{$vehiculos->render()}}
    </div>
</div>
@endsection