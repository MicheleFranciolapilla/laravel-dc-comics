@extends('layouts.app')

@section('page_title')
    {{ config('Project_data.menus_and_titles.titles.create') }}
@endsection

@section('main_section')
    <a id="jumping_anchor" href="#form_section_start" class="d-none"></a>
    <div id="form_section_start" class="create_edit_box p-5">
        <h2 class="text-info text-center mb-3">Create a new comic</h2>
        <form action="{{ route('comics.store') }}" method="POST" class="border border-5 border-info bg-light">
            @csrf
            <div class="form-group p-3 my-1">
                <label for="title_input" class="form-label text-primary fs-5">Title (REQUIRED):</label>
                <input id="title_input" class="form-control @error('title') is-invalid @enderror" type="text" name="title" maxlength="100" placeholder="Please, enter the title, here!" required>
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group p-3 my-1">
                <label for="description_input" class="form-label text-primary fs-5">Description:</label>
                <textarea id="description_input" class="form-control" name="description" rows="3" placeholder="Please, feel free to enter some description, if you want..."></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <div class="w-100">
                    <div class="form-group w-100 p-3 my-1">
                        <label for="url_input" class="form-label text-primary fs-5">Image URL:</label>
                        <textarea id="url_input" class="form-control" name="thumb_url" rows="2" placeholder="Feel free to enter the url address for the image, if you want..."></textarea>
                    </div>
                    <div class="form-group w-100 p-3 my-1">
                        <label for="series_input" class="form-label text-primary fs-5">Series:</label>
                        <input id="serie_input" type="text" class="form-control @error('series') is-invalid @enderror" name="series" maxlength="50" placeholder="Enter the series, if you want...">
                        @error('series')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group w-100 p-3 my-1">
                        <label for="type_input" class="form-label text-primary fs-5">Type (REQUIRED):</label>
                        <input id="type_input" type="text" class="form-control @error('type') is-invalid @enderror" name="type" maxlength="50" placeholder="Comics type..." required>
                        @error('type')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="d-none thumb_area align-self-start border border-3 border-dark mx-3 w-25">
                    <img src="{{ Vite::asset('resources/img/dc_backup_img.webp') }}" alt="">
                </div> --}}
            </div>
            <div class="d-flex">
                <div class="form-group p-3 my-1">
                    <label for="date_input" class="form-label text-primary fs-5">Sale Date (REQUIRED):</label>
                    <input id="date_input" type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" required>
                    @error('sale_date')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group p-3 my-1">
                    <label for="price_input" class="form-label text-primary fs-5">Price ($) (REQUIRED):</label>
                    <input id="price_input" type="number" class="form-control @error('price') is-invalid @enderror" name="price" min="0.10" max="99.99" step="0.01" required>
                    @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form_buttons">
                <button id="reset_btn" class="btn btn-warning" type="reset">Reset</button>
                <button id="submit_btn" class="btn btn-primary" type="submit">Conferma e salva</button>
            </div>
        </form>
        <div id="middle_section">
            <a href="{{ route('comics.index') }}"> Go back to DC Collection</a>
        </div>
    </div>
@endsection

<script>
     window.addEventListener('DOMContentLoaded', function() {
        let direct_jump = document.getElementById('jumping_anchor');
        direct_jump.click();
    });
</script>