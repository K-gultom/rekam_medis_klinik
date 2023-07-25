@extends('mainmenu')
@section('title')
    Data Pegawai
@endsection 

@section('contentmenu')


<div class="container-fluid ">
    <h4 class="mb-3">Data Pegawai</h4>
    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header"> 
            <div class="d-flex">
                <div class="w-100 pt-1"> 
                    <strong>Data</strong> Pegawai
                </div>
                <div class="w-100 text-end">
                    <a href="{{url('tambahdatapegawai')}}" class="btn btn-primary"> 
                        Tambah Data Pegawai <i class="bi bi-plus-circle"></i> 
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
                    <form action="{{url('dataPegawai')}}">
                        <label for="search" class="form-label"><strong>Cari Data</strong> Pegawai</label> <br> 
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari Nama ...">
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Bagian Kerja</th>
                        <th>No Telp</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                       @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$item->nama}} </td>
                                <td>{{$item->level}} </td>
                                <td>{{$item->telp}} </td>
                                <td class="text-center">

                                    {{-- @if (Auth::user()->level == 'admin' || Auth::user()->level == 'superadmin')
                                        <a href="{{url('lihatdatapegawai')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                            <i class="bi bi-eye"></i> Lihat Data
                                        </a>
                                        <a href="{{url('editdatapegawai')}}/{{$item->id}} " class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                    @endif --}}
                                    @if (Auth::user()->level == 'admin')
                                        <a href="{{url('lihatdatapegawai')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                            <i class="bi bi-eye"></i> Lihat Data
                                        </a>
                                        @if (Auth::user()->level == 'admin' && $item->level != 'superadmin')
                                            <a href="{{ url('editdatapegawai') }}/{{ $item->id }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                        @endif
                                    @endif

                                    @if (Auth::user()->level == 'superadmin')
                                        <a href="{{url('lihatdatapegawai')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                            <i class="bi bi-eye"></i> Lihat Data
                                        </a>
                                        <a href="{{url('editdatapegawai')}}/{{$item->id}} " class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="{{url('hapusdatapegawai',['id' => $item->id]) }}}" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Hapus Data ???');">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    @endif

                                    
                                    
                                </td>
                            </tr>   
                        @endforeach
                </tbody>
            </table>
            <a href="{{url('dataPegawai')}}" class="btn btn-primary">Refresh Page</a>
            {{$data->links()}}
        </div>
    </div> 
</div>


@endsection