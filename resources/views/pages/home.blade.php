@extends('layouts.app')

@section('page_title')
    {{ config('Project_data.menus_and_titles.titles.main') }}
@endsection

@section('main_section')
    <div id="middle_section">
        <a href="{{ route('comics.index') }}"> Go to DC Collection</a>
    </div>
@endsection

@section('icons_menu_content')
    @php
        $main_menus = config('Project_data.menus_and_titles.menus.standard.main');
    @endphp 
    <div id="icons_menu_area" class="p-3">
        <ul id="icons_menu_list" class="central d-flex align-items-center px-5">
            @foreach($main_menus['icons_menu'] as $icons_menu_name => $icons_menu_item)
                <li>
                    <a href="#" class="d-flex flex-row text-white">
                        <img src="{{ Vite::asset('resources/img/' . $icons_menu_item) }}" alt="" class="@if ($loop->last) special @endif">
                        <span>{{ $icons_menu_name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection