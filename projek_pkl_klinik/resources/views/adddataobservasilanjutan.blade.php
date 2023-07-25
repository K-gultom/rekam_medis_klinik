@extends('mainmenu')
@section('title')
    Tambah Data Observasi Lanjutan
@endsection 

@section('contentmenu')
<style>
    .attention{
      color: red;
    }
</style>


<div class="container-fluid">
    <h4 class="mb-2">Tambah Data Observasi Lanjutan</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('observasiawal')}}">Observasi Awal</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Observasi Lanjutan</li>
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
            <form action="addobservasilanjutan" method="post">
                @csrf
                <div class="row mb-4">
                    <h5 class="mt-1 attention"><sup><i>Mohon Perhatikan Setiap Pengisian Anda</i></sup></h5>
                    <h5 class="mt-1 attention"><sup><i>Data yang Sudah Ditambahkan Tidak Dapat Untuk Edit/diPerbaharui</i></sup></h5>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input readonly value="{{old('nama', $datapasien->nama)}}" type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" />
                              @error('nama')
                                <div class="invalid-feedback">
                                  {{$message}}
                                </div>
                              @endif
                        </div>
                    </div>

                    <div class="col">
                      <div class="form-outline">
                          <label class="form-label" for="pasien_id">No Rekam Medis</label>
                          <input readonly value="{{old('pasien_id',$datapasien->id)}}" type="text" name="pasien_id" id="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" />
                            @error('pasien_id')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                            @endif
                      </div>
                    </div>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="sistole">Sistole </label>
                    <input readonly value="{{$data->sistole}}" type="text" name="sistole" id="sistole" class="form-control @error('sistole') is-invalid @enderror" />
                    <p class="mt-1"><sup><i>Tekanan Darah</i></sup></p>
                    @error('sistole')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @endif
                  </div>
                </div>

                <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="diastole">Diastole</label>
                      <input readonly value="{{$data->diastole}}" type="text" name="diastole" id="diastole" class="form-control @error('diastole') is-invalid @enderror" />
                      <p class="mt-1"><sup><i>Tekanan Darah</i></sup></p>
                      @error('diastole')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                    </div>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline mb-4">
                    <label @readonly(true) class="form-label" for="alergiobat">Alergi Obat</label>
                    <select name="alergiobat" class="form-control @error('alergiobat') @enderror" id="">
                      @if ($data->alergiobat == "Y")
                          <option value="Y">Ya</option>
                          @else
                          <option value="N">Tidak</option>
                      @endif
                    </select>
                      @error('alergiobat')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="jeniskelamin">Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-control" id="">
                      @if ($datapasien->jeniskelamin == 'P')
                      <option value="P">Perempuan</option>                       
                      @else
                      <option value="L">Laki-Laki</option>                       
                    @endif
                    </select>
                      @error('jeniskelamin')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                  </div>
                </div>
              </div>

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tglhadir">Tanggal Kehadiran</label>
                      <input value="{{old('tglhadir')}}" type="date" name="tglhadir" id="tglhadir" class="form-control @error('tglhadir') is-invalid @enderror" />
                        @error('tglhadir')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>
                  <div class="col">
                    
                  </div>
                </div>
                
                <div class="form-outline mb-4">
                    <label class="form-label" for="subjective">Subjective</label>
                    <textarea id="subjective" name="subjective" rows="5" class="form-control @error('subjective') is-invalid @enderror">{{ old('subjective') }}</textarea>
                    @error('subjective')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="assesment">Assesment</label>
                    <textarea id="assesment" name="assesment" rows="5" class="form-control @error('assesment') is-invalid @enderror">{{ old('assesment') }}</textarea>
                    @error('assesment')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="planing">Planing</label>
                    <textarea id="planing" name="planing" rows="5" class="form-control @error('planing') is-invalid @enderror">{{ old('planing') }}</textarea>
                    @error('planing')
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