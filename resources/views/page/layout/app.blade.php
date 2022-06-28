<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/dist/assets/css/bootstrap.css')}}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/css/pages/dripicons.css')}}">

    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('template/dist/assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('page/layout/sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @yield('content')
        </div>
    </div>

    <script src="{{asset('template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('template/dist/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="{{asset('template/dist/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('template/dist/assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('template/dist/assets/js/main.js')}}"></script>
    <script src="{{asset('template/dist/assets/js/extensions/sweetalert2.js')}}"></script>
    <script src="{{asset('template/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
</body>
@include('page/layout/notif')
</html>