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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
              <h3 class="modal-title text-danger" id="staticBackdropLabel">ATTENZIONE</h3>
            </div>
            <div class="modal-body">
                <h6 class="text-warning">L'operazione di cancellazione non sarà reversibile.</h6>
                <h6 class="text-danger">Clicca su "Procedi" solo se sei certo di voler cancellare.</h6>
            </div>
            <div class="modal-footer">
                <button id="dismiss_modal_btn" type="button" class="btn btn-info" data-bs-dismiss="modal">Annulla</button>
                <button id="delete_btn" type="button" class="btn btn-danger">Procedi</button>
            </div>
          </div>
        </div>
      </div>
    @include('partials.header')
    <main>
        @yield('main_section')
        @yield('icons_menu_content')
        @yield('script_section')
    </main>
    @include('partials.footer')
</body>
</html>