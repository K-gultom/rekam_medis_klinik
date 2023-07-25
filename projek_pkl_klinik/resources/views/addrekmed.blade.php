@extends('mainmenu')
@section('title')
    Tambah Data Rekam Medis
@endsection 

@section('contentmenu')
<style>
  .attention{
    color: red;
  }
</style>


<div class="container-fluid">
    <h4 class="mb-2">Tambah Data Rekam Medis</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('rekammedis')}}">Data Rekam Medis</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Rekam Medis</li>
      </ol>
    </nav>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <strong>Tambah </strong> Data
            </div>
          </div>
        </div>
        <div class="card-body">
            <form action="tambahdatarekammedis" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <div class="row mb-4">
                  <h5 class="mt-1 attention"><sup><i>Mohon Perhatikan Setiap Pengisian Anda</i></sup></h5>
                  <h5 class="mt-1 attention"><sup><i>Data yang Sudah Ditambahkan Tidak Dapat Untuk Edit/diPerbaharui</i></sup></h5>
                </div> --}}

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input readonly value="{{old('nama', $data->nama)}}" type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" />
                              @error('nama')
                                <div class="invalid-feedback">
                                  {{$message}}
                                </div>
                              @endif
                        </div>
                    </div>

                    <div class="col">
                      <div class="form-outline">
                        {{-- Nomor rekam medis ini adalah hasil pengambilan id dari table pasien dengan relasi antar table 
                            pada pasien_id  --}}
                          <label class="form-label" for="pasien_id">No Rekam Medis</label>
                          <input readonly value="{{old('pasien_id',$data->id)}}" type="text" name="pasien_id" id="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" />
                            @error('pasien_id')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                            @endif
                      </div>
                  </div>
                </div>

                <div class="row mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="tglinput">Tanggal Input</label>
                        <input value="{{old('tglinput')}}" type="date" name="tglinput" id="tglinput" class="form-control @error('tglinput') is-invalid @enderror" />
                          @error('tglinput')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                          @endif
                      </div>
                </div>
                
                <div class="row mb-4">
                    <div class="form-outline">
                        <label for="photo">Dokumen</label>
                        <input value="{{old('photo')}}" type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" placeholder="Choose File...">
                        <p class="mt-1"><sup><i>Dokumen yang diupload harus dalam bentuk JPEG, JPG, PNG atau PDF</i></sup></p>
                        @error('photo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="catatan">Info Dokumen / Catatan</label>
                    <textarea id="catatan" name="catatan" rows="5" class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan') }}</textarea>
                    <p class="mt-1"><sup><i>Isi Dengan 'xxx' jika tidak ada info</i></sup></p>
                    @error('catatan')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-2">Tambah Data</button>

                <button type="reset" class="btn btn-warning btn-block mb-2">Reset</button>
            </form> 
        </div>
    </div>
    
</div>


@endsection