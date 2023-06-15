@php
    $footer_menus = config('Project_data.menus_and_titles.menus.standard.footer');
@endphp
<footer>
    <div id="upper_footer">
        <div id="footer_inner_box" class="central">
            <ul id="footer_vertical_menu">
                @foreach($footer_menus['upper_footer'] as $outer_index => $footer_menu)
                    <li class="outer_list_item">
                        <a href="#">{{ $outer_index }}</a>
                        <ul class="inner_list">
                            @foreach($footer_menu as $inner_index => $footer_menu_item)
                                <li class="inner_list_item">
                                    <a href="#">{{ $footer_menu_item }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
            <img src="{{ Vite::asset('resources/img/dc-logo-bg.png') }}" alt="logo inclinato">
            <p>
                All site content TM and &copy; 2020 DC Entertainement, unless otherwise 
                <a href="#">noted here</a>. 
                All rights reserved. 
                <a href="#">Cookies Settings</a>
            </p>
        </div>
    </div>
    <div id="lower_footer" class="py-4">
        <ul id="lower_footer_list" class="central px-0">
            @foreach($footer_menus['lower_footer'] as $menu_item => $sub_menu)
                <li>
                    @if ($loop->first)
                        <a href="#">{{ $menu_item }}</a>
                    @else
                        <span>{{ $menu_item }}</span>
                        <ul id="social_menu">
                            @foreach($sub_menu as $social_icon)
                                <li>
                                    <a href="#">
                                        <img src="{{ Vite::asset('resources/img/' . $social_icon) }}" alt="{{ $social_icon }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</footer>