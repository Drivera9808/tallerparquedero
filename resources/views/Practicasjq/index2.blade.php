<!DOCTYPE html>
<html lang="es">

<head>
    <title>Otras Accines JQuery</title>
    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <style>
        li {
            float: left;
            list-style: none;
            margin: 0 25px 25px 0;
            display: none;
        }

        li img {
            width: 100px;
            height: 100px;
        }

        #panel,
        #flip {
            padding: 5px;
            text-align: center;
            background-color: #e5eecc;
            border: solid 1px #c3c3c3;
        }

        #panel {
            padding: 50px;
            display: none;
        }
    </style>
</head>

<body>
    <section>
        <h3 style="text-align: center">Manejo Secuencial de Imagenes</h3>
        <center>
            <a href="#" id="mostrar">Mostrar</a> / <a href="#" id="ocultar">Ocultar</a>
            <ul>
                <li><img src="{{asset('img/1.png')}}"></li>
                <li><img src="{{asset('img/2.png')}}"></li>
                <li><img src="{{asset('img/3.png')}}"></li>
                <li><img src="{{asset('img/1.png')}}"></li>
                <li><img src="{{asset('img/2.png')}}"></li>
                <li><img src="{{asset('img/3.png')}}"></li>
                <li><img src="{{asset('img/1.png')}}"></li>
                <li><img src="{{asset('img/2.png')}}"></li>
                <li><img src="{{asset('img/3.png')}}"></li>
            </ul>
            <script>
                $(document).ready(function() {
                    var lista = $('li').hide();
                    $('#mostrar').click(function() {
                        var i = 0;
                        (function mostrarimg() {
                            lista.eq(i++).fadeIn(400, mostrarimg);
                        })();
                    });
                    $('#ocultar').click(function() {
                        var i = $('li').length;
                        (function ocultarimg() {
                            lista.eq(--i).fadeOut(200, ocultarimg);
                        })();
                    });
                });
            </script>
    </section>

    <br><br><br><br><br><br><br>
    <hr><br>

    <section>

        <h3 style="text-align: center">Manejo Dezlizantes con Texto</h3>

        <div id="flip">Presiona Para Abrir Y Cerrar</div>
        <div id="panel">Hola Mundo! <br><br> Lab 16 Jquery</div>

        <script>
            $(document).ready(function() {
                $("#flip").click(function() {
                    $("#panel").slideToggle("slow");
                });
            });
        </script>
    </section>

    <br><br>
    <hr><br>

    <section style="text-align: center">
        <h3 style="text-align: center">Animacion De Texto Con Fondo De Color </h3>

        <button>Iniciar Animacion</button>
        <div style="background:#98bf21;height:100px;width:300px;position:absolute;">
            <p style="text-align: center">Hola Mundo!</p>
        </div>

        <center>
            <script>
                $(document).ready(function() {
                    $("button").click(function() {
                        var div = $("div");
                        var p = $("p");
                        div.animate({
                            left: '500px'
                        }, "slow");
                        p.animate({
                            fontSize: '3.3em'
                        }, "slow");
                    });
                });
            </script>
    </section>

    <br><br><br><br><br><br>
    <hr><br>

    <section>
        <h3 style="text-align: center">Animacion De Reloj </h3>

        <center>
            <span id="hora" style="font-size: 20px"></span>
            <script>
                $(function() {
                    function mostrarHora() {
                        var fecha = new Date(),
                            hora = fecha.getHours() + ":" + fecha.getMinutes() + ":" + fecha.getSeconds();
                        $('#hora').text(hora);
                    }
                    setInterval(mostrarHora, 1000); 
                });
            </script>
    </section>

    <br><br>
    <hr><br>

    <a href="{{ route('home') }}">Atrás </span></a>

</body>

</html>