@extends('layouts.app')

@section('page_title')
    {{ config('Project_data.menus_and_titles.titles.show') . $single_item->title }}
@endsection

@section('main_section')
    <div id="single_card_view">
        <div id="blue_strip">
            <div id="thumb">
                <img src="{{ $single_item['thumb_url'] }}" alt="{{ $single_item['title'] }}">
                <h6 class="text-white-50 text-center">VIEW GALLERY</h6>
            </div>
        </div>
        <div id="single_card" class="central">
            <h2>{{ $single_item['title'] }}</h2>
            <div id="data_block" class="d-flex my-3">
                <h6 class="py-1 px-2 border border-1 border-dark text-black bg-info">SERIES: <span class="text-secondary">{{ $single_item['series'] }}</span></h6>
                <h6 class="py-1 px-2 border border-1 border-dark text-black bg-info">TYPE: <span class="text-secondary">{{ $single_item['type'] }}</span></h6>
                <h6 class="py-1 px-2 border border-1 border-dark text-black bg-info">U.S. PRICE: <span class="text-secondary">$ {{ $single_item['price'] }}</span></h6>
            </div>
            <div id="description_block" class="d-flex justify-content-between column-gap-3 w-100 p-2">
                <p class="py-3">{{ $single_item['description'] }}</p>
                {{-- <img src="{{ $single_item['thumb_bis'] }}" alt=""> --}}
            </div>
            <hr>
            <h6 class="text-black">SALE DATE: <span class="text-secondary">{{ $single_item['sale_date'] }}</span></h6>
            {{-- <div id="authors" class="d-flex justify-content-between column-gap-3 w-100 border border-1 border-black rounded-1 p-2">
                <div id="artists">
                    <h6>ART BY</h6>
                    <p class="text-primary">{{ str_replace("///", " , ", $single_item['artists']) }}</p>
                </div>
                <div id="writers">
                    <h6>WRITTEN BY</h6>
                    <p class="text-primary">{{ str_replace("///", " , ", $single_item['writers']) }}</p>
                </div>
            </div> --}}
        </div>
    </div>
    <div id="middle_section">
        <a href="{{ route('home') }}"> Go back to HOME PAGE</a>
        <a href="{{ route('comics.index') }}"> Go back to COLLECTION</a>
        <a href="{{ route('comics.edit', ['comic' => $single_item]) }}"> Modify</a>
    </div>
@endsection
