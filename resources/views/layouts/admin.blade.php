<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">
    @include('sweetalert::alert')
    @include('components.headeradmin')
    @include('components.sidebaradmin')
    <main class="px-0 flex">
        <div class="container w-full flex pl-[16rem] justify-center pt-8 z-30">
            <div class="wrappers w-[90%]">
                @yield('content')
            </div>
        </div>
    </main>
    <script src="{{ asset('javascript/lib/jquery.min.js')}}"></script>
    <script src="{{ asset('javascript/script/admin.js')}}"></script>
</body>

</html>
