@extends('mainmenu')
@section('title')
    Lihat Data Observasi Lanjutan
@endsection 

@section('contentmenu')
<div class="container-fluid">
    <h4 class="mb-2">Lihat Data Observasi Lanjutan</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('observasilanjutan')}}">Observasi Lanjutan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lihat Data Observasi Lanjutan</li>
      </ol>
    </nav>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <strong>Data Observasi </strong> Lanjutan
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
                          <input readonly  value="{{$namaPasien}}" type="text" class="form-control" />
                      </div>
                  </div>
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tglhadir">Tanggal Kehadiran</label>
                      <input readonly value="{{$data->tglhadir}}" type="date" class="form-control" />
                    </div>
                  </div>
                </div> 

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="sistole">Sistole </label>
                      <input readonly value="{{$observasiAwal->sistole}}" type="text" class="form-control" />
                      <p class="mt-1"><sup><i>Tekanan Darah</i></sup></p>
                    </div>
                  </div>
                  <div class="col">
                      <div class="form-outline mb-4">
                        <label class="form-label" for="diastole">Diastole</label>
                        <input readonly value="{{$observasiAwal->diastole}}" type="text" class="form-control" />
                        <p class="mt-1"><sup><i>Tekanan Darah</i></sup></p>
                      </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="sistole">Nama Pegawai yang Menangani</label>
                      <input readonly value="{{$data->user->nama}}" type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="col"></div>
                </div>
                
                <div class="form-outline mb-4">
                    <label class="form-label" for="subjective">Subjective</label>
                    <textarea readonly  name="subjective" rows="5" class="form-control">{{$data->subjective}}</textarea>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="assesment">Assesment</label>
                    <textarea readonly name="assesment" rows="5" class="form-control">{{$data->assesment}}</textarea>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="planing">Planing</label>
                    <textarea readonly name="planing" rows="5" class="form-control">{{$data->planing}}</textarea>
                </div>

            </form> 
            <a href="{{url('observasilanjutan')}}" class="btn btn-primary col-1">Kembali</a>
        </div>
    </div>
    
</div>


@endsection