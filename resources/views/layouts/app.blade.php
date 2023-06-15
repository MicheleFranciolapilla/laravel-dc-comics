<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title')</title>

    <!-- Styles -->
    @vite('resources/js/app.js')
</head>

<body>
    @include('partials.header')
    <main>
        @yield('main_section')
        @yield('icons_menu_content')
    </main>
    @include('partials.footer')
</body>
</html>