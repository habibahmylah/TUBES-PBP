<!DOCTYPE html>
<html lang="en"> 
    {{-- means languagenya english --}}
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="{{ asset('pictures') }}/seek.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- menyesuaikan tampilan @device --}}
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Work Wise Search | @yield('title')</title>

        {{-- link untuk akses bootstrap and js --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <script type="text/javascript" src="{{ asset('assets') }}/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('assets') }}/js/bootstrap.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>

    <body>
        <div class="container" style="background:#ccc">
        {{-- <div class="alert alert-info text-center">   
            <h4 style="margin-bottom: 0px">Welcome to <b>World Wise Search</b></h4>      --}}
        </div>
            @include('Pengunjung.menu')
            @include('Pengunjung.banner')
            @include('Pengunjung.content')
            @include('Pengunjung.footer')
        </div>
    </body>
</html>