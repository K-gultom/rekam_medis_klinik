@extends('mainmenu')
@section('title')
    Data Observasi Awal
@endsection 

@section('contentmenu')
<div class="container-fluid">
    <h4 class="mb-2">Data Observasi Awal</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('rekammedis')}}">Data Rekam Medis</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Observasi Awal</li>
      </ol>
    </nav>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <strong>Data Observasi</strong> Awal
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
                      <label class="form-label" for="tglhadir">Tanggal Kehadiran</label>
                      <input readonly value="{{$data->tglhadir}}" type="date" class="form-control" />
                    </div>
                  </div>
                </div>

                
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="sistole">Suhu Tubuh</label>
                      <input readonly value="{{$data->suhutubuh}}" type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="sistole">Nama Pegawai yang Menangani</label>
                      <input readonly value="{{$data->user->nama}}" type="text" class="form-control" />
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="sistole">Sistole </label>
                      <input readonly value="{{$data->sistole}}" type="text" class="form-control" />
                      <p class="mt-1"><sup><i>Tekanan Darah</i></sup></p>
                    </div>
                  </div>
                  <div class="col">
                      <div class="form-outline mb-4">
                        <label class="form-label" for="diastole">Diastole</label>
                        <input readonly value="{{$data->diastole}}" type="text" class="form-control" />
                        <p class="mt-1"><sup><i>Tekanan Darah</i></sup></p>
                      </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="beratbadan">Berat Badan</label>
                        <input readonly value="{{$data->beratbadan}}" type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tinggibadan">Tinggi Badan</label>
                      <input readonly value="{{$data->tinggibadan}}" type="text" class="form-control" />
                  </div>
                  </div>
                </div>

              </form> 
              <a href="{{url('lihatdatarekammedis')}}/{{$data->pasien->id}}" class="btn btn-primary col-1">Kembali</a>
            
        </div>
    </div>
    
</div>


@endsection