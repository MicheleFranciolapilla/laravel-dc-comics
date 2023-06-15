@php
    $header_menus = config('Project_data.menus_and_titles.menus.standard.header');
@endphp 
<header>
    <div id="upper_header">
        <ul class="central d-flex justify-content-end column-gap-4">
            @foreach($header_menus['upper_header'] as $menu_item)
                <li>
                    <a href="#">{{ $menu_item }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <nav class="central d-flex justify-content-between px-2">
        <img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="logo piccolo">
        <ul id="nav_menu" class="d-flex justify-content-between px-5">
            @foreach($header_menus['nav'] as $index => $menu_item)
                @if ($loop->first)
                    <li class="active">
                @else
                    <li>
                @endif
                        <a href="#">{{ $menu_item }}</a>
                    </li>
            @endforeach
        </ul>
    </nav>
    <div id="jumbotron">
    </div>
</header>