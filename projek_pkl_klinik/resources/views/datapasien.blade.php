@extends('mainmenu')
@section('title')
    Data Pasien
@endsection 

@section('contentmenu')
<div class="container-fluid">
    <h4 class="mb-3">Data Pasien</h4>
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <div class="w-100">
                    <strong>Data </strong>Pasien
                </div>
                <div class="w-100 text-end">
                    <a href="{{url('tambahdatapasien')}}" class="btn btn-primary">
                        Tambah Data Pasien <i class="bi bi-plus-circle"></i> 
                    </a>
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
                    <form action="{{url('dataPasien')}}" method="post">
                        @csrf
                        <label for="search" class="form-label"><strong>Cari Data</strong> Pasien</label> <br> 
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari Nomor Rekam Medis ...">
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
                        <th class="text-center" >No Rekam Medis</th>
                        <th class="text-center" >No BPJS</th>
                        <th >Alamat</th>
                        <th  class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}} </td>
                                <td>{{$item->nama}} </td>

                                <td class="text-center">{{$item->id}} </td>
                                <td class="text-center">{{$item->noBpjs}} </td>

                                <td>{{$item->alamat}} </td>
                                <td  class="text-center">
                                    <a href="{{url('addobservasiawal')}}/{{$item->id}} " class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-circle"></i> Observasi Awal
                                    </a>

                                    {{-- <a href="{{url('addobservasiawal')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                        <i class="bi bi-eye"></i> Lihat Data Rekam Medis
                                    </a> --}}
                                    {{-- <a href="{{url('addobservasilanjutan')}}/{{$item->id}} " class="btn btn-primary btn-sm">
                                        <i class="bi bi-plus-circle"></i> Observasi Lanjutan
                                    </a> --}}
                                    <a href="{{url('editdatapasien')}}/{{$item->id}} " class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <a href="{{url('hapusdatapasien',['id' => $item->id]) }}}" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Hapus Data ???');">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>   
                        @endforeach
                </tbody>
            </table>
            <a href="{{url('dataPasien')}}" class="btn btn-primary">Refresh Page</a>
            {{ $data->appends(['search' => request('search')])->links() }}
        </div>
    </div> 
</div>

@endsection