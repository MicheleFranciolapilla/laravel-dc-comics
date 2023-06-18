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
                            <form id="{{ "delete_form_" . $item->id }}" class="delete_form" action="{{ route('comics.destroy', ['comic' => $item]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="{{ "delete_btn_" . $item->id }}" class="delete btn btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
                                <button class="submitter" type="submit"></button>
                            </form>
                            {{-- <a href="{{ route('comics.edit', ['comic' => $item]) }}" type="button" class="delete btn btn-danger" onclick="delete_confirm()">Delete</a> --}}
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

@section('script_section')
    <script>
        
        function set_listener_on_deleter_btn()
        {
            let delete_buttons = document.querySelectorAll('*[id^="delete_btn_"]');
            for (let i = 0; i < delete_buttons.length; i++)
            {
                delete_buttons[i].addEventListener('click', function()
                {
                    let btn_form = this.parentElement;
                    btn_form.classList.add('to_be_deleted');
                });
            }
        }

        function reset_all_forms()
        {
            let delete_forms = document.querySelectorAll('*[id^="delete_form_"]');
            for (let i = 0; i < delete_forms.length; i++)
            {
                if (delete_forms[i].classList.contains('to_be_deleted'))
                    delete_forms[i].classList.remove('to_be_deleted');
            }
        }

        set_listener_on_deleter_btn();

        document.addEventListener('DOMContentLoaded', function()
        {
            let dismisser = document.getElementById('dismiss_modal_btn');
            dismisser.addEventListener('click', function()
            {
                reset_all_forms();
            });

            let deleter = document.getElementById('delete_btn');
            deleter.addEventListener('click', function()
            {
                let to_be_deleted_forms = document.querySelectorAll('.to_be_deleted');
                for (let i = 0; i < to_be_deleted_forms.length; i++)
                {
                    to_be_deleted_forms[i].classList.remove('to_be_deleted');
                    to_be_deleted_forms[i].submit();
                }
            });
        });

    </script>
@endsection