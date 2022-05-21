<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins.min.js') }}"></script>
@if(Session::has('success'))
    <script>
        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Success!</h4>' +
                '<p class="text-muted mx-4 mb-0">{{ Session::get("success") }}</p>' +
                '</div>' +
                '</div>',
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonClass: 'btn btn-primary w-xs mb-1',
            cancelButtonText: 'Back',
            buttonsStyling: false,
            showCloseButton: true
        });

    </script>
@endif

@if(Session::has('error'))
    <script>
       Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Oops...! Something went Wrong !</h4>' +
                    '<p class="text-muted mx-4 mb-0">{{ Session::get("error") }}</p>' +
                '</div>' +
            '</div>',
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonClass: 'btn btn-primary w-xs mb-1',
            cancelButtonText: 'Dismiss',
            buttonsStyling: false,
            showCloseButton: true
        })
    </script>
@endif
@yield('script')
@yield('script-bottom')
