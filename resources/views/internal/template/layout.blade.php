<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('/assets/defaults/favicon.ico') }}">
        <title>@yield('title', config('app.name'))</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{ asset('/assets/int/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/int/css/custom-app.css') }}?v={{ config('app.asset_version') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    </head>
    <body id="page-top">
        <div id="wrapper">
            @include('internal.template.partials.side-bar')
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Start Main Content -->
                <div id="content">
                    @include('internal.template.partials.top-bar')
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-1">
                            <h1 class="h5 m-0 text-gray-800">@yield('title', '')</h1>
                        </div>
                        <hr class="d-none mt-2 mb-2 d-sm-block">
                        @yield('content')
                    </div>
                </div>
                <!-- End Main Content -->
                @include('internal.template.partials.footer')
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        @include('internal.template.partials.modal-logout')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('/assets/int/js/sb-admin-2.min.js') }}"></script>
    </body>
</html>
