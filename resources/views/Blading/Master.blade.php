<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blading-@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>


<body>


    <header>
        @yield('navbar')

    </header>

    @yield('main')


    <footer>
        @yield('footer')

    </footer>


</body>


</html>
