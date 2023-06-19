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
    <div class="modal fade" id="deletion_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletion_modalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
              <h3 class="modal-title text-danger" id="deletion_modalLabel">ATTENZIONE</h3>
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
    </main>
    @include('partials.footer')

    <script>

        function reset_all_forms()
        {
            let delete_forms = document.querySelectorAll('*[id^="delete_form_"]');
            for (let i = 0; i < delete_forms.length; i++)
            {
                if (delete_forms[i].classList.contains('to_be_deleted'))
                    delete_forms[i].classList.remove('to_be_deleted');
            }
        }

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
</body>
</html>