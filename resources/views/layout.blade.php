<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <link href="/styles/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-SQ79RED3LT"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
                gtag('config', 'G-SQ79RED3LT');
        </script>
    </head>
    <body>
        <header>
            <nav class="lang">
                @if ($lang == 'es')
                    <span class="no-active">ES</span>
                    <a href="/hasiera" class="active">EU</a>
                @elseif ($lang == 'eu')
                    <a href="/" class="active">ES</a>
                    <span class="no-active">EU</span>
                @endif
            </nav>
        </header>
        <!--<header>
            <nav class="topnav" id="myTopnav">
                <a href="/" class="active">Inicio</a>
                <a href="/festivos">Festivos</a>
                <a href="/municipios">Municipios</a>
                <a href="/territorios">Territorios</a>
                <a href="/sobre-esta-web">Sobre esta web</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
            </nav>
        </header>-->
        <main>
        @yield('content')
        </main>
    </body>
    <!--<script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        } 
    </script>-->
</html>
