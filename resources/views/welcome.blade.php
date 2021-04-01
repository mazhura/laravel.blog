<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/admin/css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/user/assets/admin/css/adminlte.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>

@if(session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning">
        {{session('warning')}}
    </div>
@endif


@if(Auth::check())
    <a href="{{route('logout')}}">Log out</a>
@endif




<h1 class="mx-5">HOME PAGE</h1>
</body>
</html>
