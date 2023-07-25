@extends('mainmenu')
@section('title')
    Observasi Awal
@endsection 

@section('contentmenu')



<div class="container-fluid">
    <h4 class="mb-3">Observasi Awal</h4>
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Observasi Awal</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <div class="w-100">
                    <strong>Data Observasi </strong>Awal
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('message'))
                <div id="flash-message" class="alert alert-success">
                    {{ session('message') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('flash-message').style.display = 'none';
                    }, {{ session('timeout', 5000) }});
                </script>
            @endif
            <div class="container">
                <div class="row m-5">
                    <form action="{{url('observasiawal')}}" method="POST">
                        @csrf
                        <label for="nama" class="form-label"><strong>Cari Data</strong> Observasi</label> <br> 
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nomor Rekam Medis ...">
                            <button class="btn  btn-primary" type="submit">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th >Nama</th>
                        <th class="text-center">No Rekam Medis</th>
                        <th class="text-center">Tanggal Kedatangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datasend as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}} </td>
                                {{-- <td>{{$item->pasien->nama}} </td>
                                <td>{{$item->pasien->telp}} </td> --}}
                                @if ($item->pasien !== null)
                                    <td>{{$item->pasien->nama}}</td>
                                    <td class="text-center">{{$item->pasien->id}}</td>
                                @else
                                    <td>Data Pasien Tidak Tersedia</td>
                                    <td>-</td>
                                @endif
                                                            
                                <td class="text-center">{{$item->tglhadir}} </td>
                                <td class="text-center">
                                    @if (Auth::user()->level == 'dokterumum'||Auth::user()->level == 'doktergigi'||Auth::user()->level == 'bidan'
                                    || Auth::user()->level == 'superadmin'||Auth::user()->level == 'admin')
                                        @if ($item->pasien !== null)
                                            <a href="{{url('addobservasilanjutan')}}/{{$item->id}} " class="btn btn-primary btn-sm">
                                                    <i class="bi bi-plus-circle"></i> Observasi Lanjutan
                                            </a>
                                        @endif
                                    @endif
                                    
                                    @if (Auth::user()->level == 'perawat'||Auth::user()->level == 'superadmin'||Auth::user()->level == 'admin' 
                                    ||Auth::user()->level == 'dokterumum'||Auth::user()->level == 'doktergigi'||Auth::user()->level == 'bidan')
                                        @if ($item->pasien !== null)                                  
                                            <a href="{{url('lihatdataobservasiawal')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                                <i class="bi bi-eye"></i> Lihat Data
                                            </a>
                                        @endif 
                                    @endif

                                    @if (Auth::user()->level == 'perawat'||Auth::user()->level == 'superadmin'||Auth::user()->level == 'admin')
                                        <a href="{{url('hapusobservasiawal',['id' => $item->id]) }}}" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Hapus Data ???');">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    @endif


                                </td>
                            </tr>   
                        @endforeach
                </tbody>
            </table>
            <a href="{{url('observasiawal')}}" class="btn btn-primary">Refresh Page</a>
            {{$datasend->links()}}
        </div>
    </div> 
</div>

@endsection