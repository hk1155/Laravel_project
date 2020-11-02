<html>

<head>
    @include('layout.Head')
</head>

<body>
    @include('layout.Header')
    <div class="container-fluid">
        @yield('content')
    </div>
    <footer>
        @include('layout.Footer')
    </footer>
</body>

</html>