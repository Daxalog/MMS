<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <script src="{{ asset('jquery-1.12.3.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('jquery.dataTables.css')}}">
    <script type="text/javascript" charset="utf8" src="{{asset('jquery.dataTables.js')}}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}" >
    <title>Document</title>
</head>
<body>
    @include('layouts.nav')
    <div class="container-fluid">
        @yield('content')
    </div>
    
</body>
</html>