@extends ('layouts.layout')
@section ('contenido')

<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <h3> Registrar Nueva Tarifa <a href="/tarifa/create">
                <button class="btn btn-success">Nuevo <span class="glyphicon glyphicon-folder-open"></span>
                </button></a></h3>

        <h3>Reporte Todas Las Tarifas <a href="\imprimirTarifas"><button class="btn btn-warning">
                    <span class="glyphicon glyphicon-downloadalt"></span> Generar PDF</button></a></h3>

        <h3>Listado de Tarifas </h3>

    </div>
</div>
<div class="row" style="text-align: center">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead class="thead-dark">
                    <th>Id</th>
                    <th>Tipo Vehiculo</th>
                    <th>Valor</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($tarifa as $tarifa)
                <tr>
                    <td>{{ $tarifa->id}}</td>
                    <td>{{ $tarifa->tipo_vehiculo->nombre}}</td>
                    <td>{{ $tarifa->valor}}</td>
                    <td>{{ $tarifa->estado}}</td>
                    <td>
                        <a href="{{URL::action('TarifaController@edit',$tarifa->id)}}">
                            <button class="btn btn-info">Editar <span class="glyphicon glyphicon-pencil"></button></a>
                        <a href="" data-target="#modal-delete-{{$tarifa->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar <span class="glyphicon glyphicon-remove"></button></a>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection