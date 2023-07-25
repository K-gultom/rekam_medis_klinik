@extends('mainmenu')
@section('title')
    Data Rekam Medis Pasien
@endsection 

@section('contentmenu')
<div class="container-fluid">
    <h4 class="mb-2">Lihat Data Rekam Medis</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('rekammedis')}}">Data Rekam Medis</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lihat Data Data Rekam Medis</li>
      </ol>
    </nav>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <strong>Data Rekam</strong> Medis
            </div>
          </div>
        </div>
        <div class="card-body">
            <form action="#" method="post">
                @csrf

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="nama">Nama Lengkap</label>
                      <input readonly value="{{$namaPasien}}" type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tglinput">Tanggal Input Dokumen</label>
                      <input readonly value="{{$data->tglinput}}" type="date" class="form-control" />
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="user_id">Nama Pegawai yang Menginput</label>
                      <input readonly value="{{$data->user->nama}}" type="text" class="form-control" />
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label class="form-label" for="tglinput">Dokumen Riwayat Medis</label> <br>
                        <a href="{{ url('images/'.$data->photo) }}" target="_blank">
                            <img src="{{ url('images/'.$data->photo) }}" class="img-fluid" alt="Dokumen Rekam Medis" style="width: 20%;">
                        </a>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                      <a href="{{ url('images/'.$data->photo) }}" download class="btn btn-outline-success">
                        Download Dokumen
                      </a>
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="catatan">Catatan</label>
                    <textarea readonly name="catatan" rows="5" class="form-control">{{$data->catatan}}</textarea>
                </div>

                {{-- <div class="row mb-4">
                    <div class="col justify-center">
                      <a href="{{ url('images/'.$data->photo) }}" data-lightbox="gallery" data-title="Foto Rekam Medis">
                        <img src="{{ url('images/'.$data->photo) }}" class="img-fluid" alt="Foto Rekam Medis" style="width: 20%;">
                      </a>
                    </div>
                </div> --}}

              </form> 

              <a href="{{url('lihatdatarekammedis')}}/{{$data->pasien->id}}" class="btn btn-primary">Kembali</a>
              
            
        </div>
    </div>
    
</div>

{{-- <!-- Tambahkan link CSS Lightbox2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

<!-- ... -->

<!-- Tambahkan link JavaScript Lightbox2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script> --}}


@endsection