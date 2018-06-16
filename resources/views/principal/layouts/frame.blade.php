<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}" type="text/javascript"></script>
    <!-- custom.css -->
    <link href="{{ asset('css/custom.css') }}" media="all" rel="stylesheet" type="text/css" />

</head>
<body class="bg">
    <div class="container">
        @yield('container')
    </div>
</body>
</html>