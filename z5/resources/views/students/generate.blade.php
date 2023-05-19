<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://editor.codecogs.com/assets/css/eqneditor.css"/>
    <!-- MathJax -->
    <script src="{{ asset('js/mathjax.js') }}"></script>
    <script type="text/javascript" id="MathJax-script" async
    src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>
</head>
<body>
   <!-- <div id="assignmentId">{{ $assignmentId }}</div> -->
   <div class="d-flex flex-column align-items-center justify-content-center">
    <div id="task">Pr. {!! $taskContent !!}</div>
    </div>
    @if(isset($filename))
    <div class="image-container">
        <div class="image-wrapper">
            <img class="responsive-image" src="{{ asset('images/' . $filename) }}" alt="TaskImage">
        </div>
    </div>   
    @endif

  <!--  @if(isset($imageFilePath))
        <img src="{{ asset('../z5/storage/' . $imageFilePath) }}" alt="TaskImage"> 
    @endif-->

    <div id="equation-editor">
        <div id="history"></div>
        <div id="toolbar"></div>
        <div id="latexInput" autocorrect="off"></div>
        <div id="equation-output">
        <img id="output">
        </div>
    </div>
    <div class="container">
    <div class="row justify-content-center mt-2 mb-5">
    <div style="max-width: 200px;">
    <button id="compareBtn" class="btn btn-success btn-block" onclick="compareResults({{$solutionId}})">{{__('trans.Compare')}}</button>
    </div>
    </div>
    </div>
    <div id="userResult" class="d-flex flex-column align-items-center justify-content-center"> 
        <div id="result" class="result-item"></div>
        <div id="points" class="result-item"></div>
    </div>
    <script src="https://editor.codecogs.com/assets/js/eqneditor.api.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/calc.js') }}"></script>
</body>
</html>