<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Salida de Vehiculos | Sistema Web</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Reporte de Salidas</h3>
        <img align="right" src="" alt="" width='100px'>
        <br><br>
        <h1 class="text-center">Parqueadero Warriors</h1>
        <h3 class="text-center">NIT: 123456789-1</h3>
        <h3 class="text-center">Tel. 6666666</h3>
        <br><br><br>

        @php
        $suma=0;
        $contador=0;
        @endphp

        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Salida ID</th>
                <th>Placa</th>
                <th>Tipo Vehiculo</th>
                <th>Fecha Ingreso</th>
                <th>Fecha Salida</th>
                <th>Total</th>
            </tr>
            @foreach($salida as $s)
            <tr>
                <td>ID: {{$s->id}}</td>
                <td>{{$s->placa}}</td>
                <td>{{$s->nombre}}</td>
                <td>{{$s->fecha_ingreso}}</td>
                <td>{{$s->fecha_salida}}</td>
                <td>{{$s->total}}</td>

                @php
                $suma= $suma + $s->total;
                @endphp

            </tr>
            @endforeach

            <tr>
                <td colspan="5">Recuado Total</td>
                <td>{{$suma}}</td>
            </tr>

        </table>
        <br>
        <h5 class="text-center">Usuario: {{auth()->user()->name}}</h5>
        <h6 align="center">Software de Parqueaderos version 1</h6>
    </div>
</body>

</html>