<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>HaloWeb</title>
</head>
<body class="bg-slate-50 text-black">
    @include('components.head')
    @include('components.error')
    @include('components.breads')
    @include('components.hero')
    @yield('content')
</body>
</html>
