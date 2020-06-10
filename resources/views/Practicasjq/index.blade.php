<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Incluyendo JQuery-->
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <title>Acciones De Enlaces</title>
</head>

<body>
    <br>
    <h1>Practica Js Google</h1>

    <script>
        $(document).ready(function() {
            $("a").click(function(evento) {
                alert("Has pulsado el enlace...Ahora serás enviado a Pagina Web");
            });
        });
    </script>
    <h4>Pulse para ingresar <a href="https://google.com">Ir a Google.com</a></h4>

    <br>
    <hr><br>
    <h1>Practica Js YouTube</h1>

    <script>
        $(document).ready(function() {
            $("a").click(function(evento) {
                alert("Has pulsado el enlace...Ahora serás enviado a Pagina Web");
            });
        });
    </script>
    <h4>Pulse para ingresar <a href="https://www.youtube.com/">Ir a YouTube.com</a></h4>
<br><br>

    <a href="{{ route('home') }}">Atrás </span></a>
</body>

</html>