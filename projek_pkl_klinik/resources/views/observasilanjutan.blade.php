@extends('mainmenu')
@section('title')
    Observasi Lanjutan
@endsection 

@section('contentmenu')



<div class="container-fluid">
    <h4 class="mb-3">Observasi Lanjutan</h4>
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Observasi Lanjutan</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <div class="w-100">
                    <strong>Data Observasi </strong>Lanjutan
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
                    <form action="{{url('observasilanjutan')}}" method="post">
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
                        <th>Nama</th>
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
                                    @if ($item->pasien !== null)
                                        <a href="{{url('lihatobservasilanjutan')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                            <i class="bi bi-eye"></i> Lihat Data
                                        </a>
                                    @endif
                                    
                                    <a href="{{url('hapusobservasilanjut',['id' => $item->id]) }}}" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Hapus Data ???');">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                    
                                </td>
                            </tr>   
                        @endforeach
                </tbody>
            </table>
            <a href="{{url('observasilanjutan')}}" class="btn btn-primary">Refresh Page</a>
            {{$datasend->links()}}
        </div>
    </div> 
</div>

@endsection