<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <?php
        if (!function_exists('residuoRaizCuadrada')) {
            function residuoRaizCuadrada($x) {
                $raiz = sqrt($x);
                
                $entero = floor($raiz);
                
                $residuo = $x - ($entero * $entero);
                
                return $residuo;
            }

            $RandomizerSquared = residuoRaizCuadrada($Randomizer);
            if($RandomizerSquared == 0){
                $cssFont = "'Comic Sans MS', 'Comic Sans', cursive";
                $UGLY = true;
            }else{
                $cssFont = "Figtree, sans-serif";
                $UGLY = false;
            }
        }
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GAMBLING TEST</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            :root {
                --css-font: <?= $cssFont; ?>;
                --is-ugly: <?= $UGLY ? 'true' : 'false'; ?>; //
            }
        </style>
        <link href = "/css/main.css" rel="stylesheet">

        @vite(['resources/scss/main.scss', 'resources/css/main.css', 'resources/js/main.js'])

    </head>
    <body class="antialiased">
        @yield('content')
    </body>
    <footer>
    @if($Randomizer > 0 && $Randomizer <= 20)
        <span class = "footerAlter">Copyright© 2024 Gambling Experiment</span>
    @else
        Copyright© 2024 Gambling Experiment
    @endif
</footer>
</html>