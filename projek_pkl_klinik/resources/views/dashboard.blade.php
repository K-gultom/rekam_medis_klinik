@extends('mainmenu')
@section('title')
    Dashboard
@endsection 

@section('contentmenu')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.1/echarts.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<div class="container-fluid">
    <h4 class="mb-3">Dashboard</h4>
    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    <div class="row m-5 p-2">

        {{-- Data Jumlah Pasien --}}
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <div class="d-flex">
                        <div class="w-100 pt-1">
                            <strong>Jumlah </strong> Pasien Klinik
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container">
                        <h1>{{$totalPasien}}</h1>
                    </div>
                </div>
            </div>
        </div>


        {{-- Data Jumlah Pasien yang observasi Awal --}}
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <div class="d-flex">
                        <div class="w-100 pt-1">
                            <strong>Jumlah </strong> Data Observasi Awal
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container">
                        <h1>{{$totalObservasiAwal}}</h1>
                    </div>
                </div>
            </div>
        </div>


        {{-- Data Jumlah Pasien yang observasi Lanjutan --}}
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <div class="d-flex">
                        <div class="w-100 pt-1">
                            <strong>Jumlah </strong> Data Observasi Lanjutan
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container">
                        <h1>{{$totalObservasiLanjutan}}</h1> 
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row m-5 p-2">

        {{-- Jumlah Pasien hadir perhari --}}
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <div class="d-flex">
                        <div class="w-100 pt-1">
                            <Strong>Jumlah </Strong> Data Pasien yang Hadir
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{ url('dashboard') }}" method="get" class="row align-items-center">
                            <div class="col-md-3">
                                <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </div>
                        </form>
                
                        @if ($pasienAda)
                            @foreach($observasiAwalPerHari as $data)
                                <div class="row mt-4">
                                    <p>Tanggal: {{ $data->tanggal }}</p>
                                    <p>Jumlah: <strong>{{ $data->total }}</strong></p>
                                </div>
                            @endforeach
                        @else
                                <div class="row mt-4">
                                    <p>Maaf, Pasien yang hadir tidak ada</p>
                                </div>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>

        
            {{-- Jumlah Pasien Laki2 dan Perempuan --}}
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <div class="d-flex">
                        <div class="w-100 pt-1">
                            <Strong>Data </Strong> Pasien Berdasarkan Jenis Kelamin
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <p>Jumlah Pasien Laki-laki: <strong>{{ $jumlahPasienLakiLaki }}</strong></p>
                        </div>
                        <div class="row">
                            <p>Jumlah Pasien Perempuan: <strong>{{ $jumlahPasienPerempuan }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection