<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('../z5/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('../z5/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://editor.codecogs.com/assets/css/eqneditor.css"/>
</head>
<body>
<body>
    <div id="equation-editor">
        <div id="history"></div>
        <div id="toolbar"></div>
        <div id="latexInput" autocorrect="off"></div>
        <div id="equation-output">
        <img id="output">
        </div>
    </div>
    <div class="container">
    <div class="row justify-content-center">
    <div style="max-width: 200px;">
            <button id="compareBtn" class="btn btn-success btn-block">Porovnaj výsledok</button>
</div>
    </div>
    </div>
    <p>{{ $output }}</p>
    <script src="https://editor.codecogs.com/assets/js/eqneditor.api.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ asset('../z5/js/script.js') }}"></script>
    <script src="{{ asset('../z5/js/calc.js') }}"></script>
</body>
</html>