<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Tipos De Vehiculos | Sitio Web </title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Reporte De Tipos De Vehiculo</h3>
        <img align="right" src="" alt="" width='100px'>
        <br><br>
        <h1 class="text-center">Parqueadero Warriors</h1>
        <h3 class="text-center">NIT: 123456789-1</h3>
        <h3 class="text-center">Tel. 6666666</h3>
        <br><br><br>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Tipo Vehiculo ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
            </tr>

            @foreach($tipovehiculos as $tv)
            <tr>
                <td>ID: {{$tv->id}}</td>
                <td>{{$tv->nombre}}</td>
                <td>{{$tv->descripcion}}</td>
            </tr>
            @endforeach

        </table>
        <br>
        <h5 class="text-center">Usuario: {{auth()->user()->name}}</h5>
        <h6 align="center">Software de Parqueaderos version 1</h6>
    </div>
</body>

</html>