{{-- Ini merupakan main master menu --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body>
    <style>
        body{
            position: relative;
        }
        a:hover{
            background-color: rgb(1, 82, 145);
        }
        .navbar-brand{
            margin-left: 20px;
            font-size: 25px;
            font-weight: 600;
        }
        .myaccount{
            margin-right: 100px;
        }
        .clr{
            background-color: #245fb8;
            box-shadow: 10px 10px 20px 5px rgb(194, 194, 194);
        }
        .klinik{
            color: #ffffff;
        }
        .klinik:hover{
            /* background-color: rgb(1, 82, 145); */
            color: #ffffff;
        }
        .content-wrap {
            min-height: 100%;
            padding-bottom: 50px; /* Sesuaikan dengan tinggi footer */
        }
        footer {
            background-color: #888687;
            color: #ffffff;
            height: 50px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
        }
    </style>
    <div class="d-flex">
        <div class="clr max-height-vh-100 min-vh-100 col-2">
            <nav class="nav flex-column">
                <div class="container mt-3">
                    <a class="klinik navbar-brand mt-3"> 
                        <img src="{{asset('images/logoklinik.jpg')}}" height="40">
                         Klinik Sukatani
                    </a>
                    <h3 class="klinik m-3"></h3>
                    {{-- <a class="navbar-brand text-light">{{auth()->user()->level}}</a> --}}
                    <h3 class="klinik m-3"></h3> 
                </div>
                <a href="{{url('dashboard')}}" class="side nav-item nav-link active text-light"><i class="bi bi-house-fill"></i> Dashboard</a>

                @if (Auth::user()->level == 'superadmin' || Auth::user()->level == 'admin')
                    <a href="{{url('dataPegawai')}}" class="side nav-item nav-link text-light"><i class="bi bi-file-earmark-text-fill"></i> Data Pegawai</a>
                @endif

                @if (Auth::user()->level == 'superadmin' || Auth::user()->level == 'admin' || Auth::user()->level == 'perawat')

                    <a href="{{url('dataPasien')}}" class="side nav-item nav-link text-light"><i class="bi bi-file-earmark-text-fill"></i> Data Pasien</a>
                    
                @endif

                @if (Auth::user()->level == 'superadmin' || Auth::user()->level == 'admin' || Auth::user()->level == 'perawat' || Auth::user()->level == 'dokterumum' || Auth::user()->level == 'doktergigi' || Auth::user()->level == 'bidan')

                    <a href="{{url('rekammedis')}}" class="side nav-item nav-link text-light"><i class="bi bi-file-earmark-text-fill"></i> Data Rekam Medis</a>
                    <a href="{{url('observasiawal')}}" class="side nav-item nav-link text-light"><i class="bi bi-clipboard2-data-fill"></i> Observasi Awal</a>

                @endif

                @if (Auth::user()->level == 'superadmin' || Auth::user()->level == 'admin' || Auth::user()->level == 'dokterumum' || Auth::user()->level == 'doktergigi' || Auth::user()->level == 'bidan')
                    <a href="{{url('observasilanjutan')}}" class="side nav-item nav-link text-light"><i class="bi bi-clipboard2-pulse-fill"></i> Observasi Lanjutan</a>
                @endif

                
            </nav> 
        </div>

        <div class="col">
            <nav class="navbar navbar-dark bg-primary navbar-expand-lg border-left-1">
                <div class="container-fluid">
                    <a class="navbar-brand">Hai, Selamat Datang {{auth()->user()->nama}}</a>
                    <a href="{{url('/logout')}}" class="text-light" style="text-decoration: none;">Logout <i class="bi bi-box-arrow-right text-light m-1"></i></a>
                </div>
            </nav>

            <div class="m-1 p-3">
                @yield('contentmenu')


                <div class="mb-5"></div>
            </div> 
            <footer class="text-center p-3">
                &copy; 2023 Klinik Sukatani. All rights reserved.
            </footer>
        </div>
        
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>