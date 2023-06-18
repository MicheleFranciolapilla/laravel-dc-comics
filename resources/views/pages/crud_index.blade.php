@extends('layouts.app')

@section('page_title')
    {{ config('Project_data.menus_and_titles.titles.collection') }}
@endsection

@section('main_section')
    <div id="comics_area">
        <div id="card_set" class="central py-4">
            @foreach($comics_db as $item)
                <div class="card">
                    <a href="{{ route('comics.show', [$id = $item->id])}}" class="d-flex flex-column w-100 h-100">
                        <img src="{{ $item['thumb_url'] }}" alt="{{ $item['title'] }}">
                        <h6>{{ $item['title'] }}</h6>
                        <div class="card_buttons_box align-self-end w-100 d-flex flex-column row-gap-1">
                            <a href="{{ route('comics.edit', ['comic' => $item]) }}" type="button" class="btn btn-primary">Modify</a>
                            <a href="{{ route('comics.edit', ['comic' => $item]) }}" type="button" class="btn btn-danger">Delete</a>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div id="middle_section">
        <a href="{{ route('home') }}"> Go back to HOME PAGE</a>
        <a href="{{ route('comics.create') }}"> Add more</a>
        <a id="delete_all" href="{{ route('comics.create') }}"> DELETE ALL</a>
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
