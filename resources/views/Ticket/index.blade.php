@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Reporte Todas Las Salidas <a href="\imprimirSalidas"><button class="btn btn-warning">
                    <span class="glyphicon glyphicon-downloadalt"></span> Generar PDF</button></a></h3>

        <h3>Listado A Generar Salida </h3>
        @include('Ticket.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Tipo de Vehiculo</th>
                    <th>Fecha Ingreso</th>
                    <th>valor hora</th>
                    <th>Opciones</th>
                </thead>
                @foreach ($ticket as $ticket)
                <tr>
                    <td>{{ $ticket->id}}</td>
                    <td>{{ $ticket->placa}}</td>
                    <td>{{ $ticket->nombre}}</td>
                    <td>{{ $ticket->fecha_ingreso}}</td>
                    <td>{{ $ticket->valor}}</td>
                    <td>
                        <a href="{{route('ticket', [$ticket->placa, $ticket->id ,$ticket->valor])}}">
                            <button class="btn btn-info">Generar Salida  <span class="glyphicon glyphicon-log-out"></button></a>

                        <a href="" data-target="#modal-delete-{{$ticket->id}}" data-toggle="modal">
                            <button class="btn btn-danger">Eliminar <span class="glyphicon glyphicon-remove"></button></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection