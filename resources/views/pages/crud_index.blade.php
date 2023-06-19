@extends('layouts.app')

@php
    $delete_all = false;
@endphp 

@section('page_title')
    {{ config('Project_data.menus_and_titles.titles.collection') }}
@endsection

@section('main_section')
    <div id="comics_area">
        <div id="card_set" class="central py-4">
            @forelse($comics_db as $item)
                <div class="card">
                    <a href="{{ route('comics.show', [$id = $item->id])}}" class="d-flex flex-column w-100 h-100">
                        <img src="{{ $item['thumb_url'] }}" alt="{{ $item['title'] }}">
                        <h6>{{ $item['title'] }}</h6>
                        <div class="card_buttons_box align-self-end w-100 d-flex flex-column row-gap-1">
                            <a href="{{ route('comics.edit', ['comic' => $item]) }}" type="button" class="btn btn-primary">Modify</a>
                            <form id="{{ "delete_form_" . $item->id }}" class="delete_form" action="{{ route('comics.destroy', ['comic' => $item]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="{{ "delete_btn_" . $item->id }}" class="delete btn btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#deletion_modal"
                                 onclick="this.parentElement.classList.add('to_be_deleted');">Delete</button>
                            </form>
                        </div>
                    </a>
                </div>
            @empty
                <h2 class="mx-auto text-info">The Database is empty</h2>
            @endforelse
        </div>
    </div>
    <div id="middle_section">
        <a href="{{ route('home') }}"> Go back to HOME PAGE</a>
        <a href="{{ route('comics.create') }}"> Add more</a>
        @if (count($comics_db) != 0)
            <a id="delete_all" type="button" data-bs-toggle="modal" data-bs-target="#deletion_modal" onclick="prepare_for_delete_all()"> DELETE ALL</a>
        @endif 
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