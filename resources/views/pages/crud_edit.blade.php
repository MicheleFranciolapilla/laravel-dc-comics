@extends('layouts.app')

@section('page_title')
    {{ config('Project_data.menus_and_titles.titles.edit') . $comic->title }}
@endsection

@section('main_section')
    <a id="jumping_anchor" href="#form_section_start" class="d-none"></a>
    <div id="form_section_start" class="create_edit_box p-5">
        <h2 class="text-info text-center mb-3">Modify</h2>
        <form action="{{ route('comics.update', $comic) }}" method="POST" class="border border-5 border-info bg-light">
            @csrf
            @method('PUT')
            <div class="form-group p-3 my-1">
                <label for="title_input" class="form-label text-primary fs-5">Title (REQUIRED):</label>
                <input id="title_input" class="form-control @error('title') is-invalid @enderror" type="text" name="title" maxlength="100" required value="{{ old('title') ?? $comic->title }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group p-3 my-1">
                <label for="description_input" class="form-label text-primary fs-5">Description:</label>
                <textarea id="description_input" class="form-control" name="description" rows="3" placeholder="Please, feel free to enter some description, if you want...">
                    {{ old('description') ?? $comic->description }}
                </textarea>
            </div>
            <div class="d-flex justify-content-between">
                <div class="w-100">
                    <div class="form-group w-100 p-3 my-1">
                        <label for="url_input" class="form-label text-primary fs-5">Image URL:</label>
                        <textarea id="url_input" class="form-control" name="thumb_url" rows="2" placeholder="Feel free to enter the url address for the image, if you want...">
                            {{ old('thumb_url') ?? $comic->thumb_url }}
                        </textarea>
                    </div>
                    <div class="form-group w-100 p-3 my-1">
                        <label for="series_input" class="form-label text-primary fs-5">Series:</label>
                        <input id="serie_input" type="text" class="form-control" name="series" maxlength="50" placeholder="Enter the series, if you want..." value="{{ old('series') ?? $comic->series }}">
                    </div>
                    <div class="form-group w-100 p-3 my-1">
                        <label for="type_input" class="form-label text-primary fs-5">Type (REQUIRED):</label>
                        <input id="type_input" type="text" class="form-control" name="type" maxlength="50" required value="{{ old('type') ?? $comic->type }}">
                    </div>
                </div>
                {{-- <div class="d-none thumb_area align-self-start border border-3 border-dark mx-3 w-25">
                    <img src="{{ Vite::asset('resources/img/dc_backup_img.webp') }}" alt="">
                </div> --}}
            </div>
            <div class="d-flex">
                <div class="form-group p-3 my-1">
                    <label for="date_input" class="form-label text-primary fs-5">Sale Date (REQUIRED):</label>
                    <input id="date_input" type="date" class="form-control" name="sale_date" required value="{{ old('sale_date') ?? $comic->sale_date }}">
                </div>
                <div class="form-group p-3 my-1">
                    <label for="price_input" class="form-label text-primary fs-5">Price ($) (REQUIRED):</label>
                    <input id="price_input" type="number" class="form-control" name="price" min="0.1" max="99.99" step="0.11" required value="{{ old('price') ?? $comic->price }}">
                </div>
            </div>
            <div class="form_buttons">
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