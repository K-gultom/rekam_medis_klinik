@extends('mainmenu')
@section('title')
    Tambah Data Observasi Awal
@endsection 

@section('contentmenu')
<style>
  .attention{
    color: red;
  }
</style>


<div class="container-fluid">
    <h4 class="mb-2">Tambah Data Observasi Awal</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dataPasien')}}">Data Pasien</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Observasi Awal</li>
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
            <form action="addobservasiawal" method="post">
                @csrf
                <div class="row mb-4">
                  <h5 class="mt-1 attention"><sup><i>Mohon Perhatikan Setiap Pengisian Anda</i></sup></h5>
                  <h5 class="mt-1 attention"><sup><i>Data yang Sudah Ditambahkan Tidak Dapat Untuk Edit/diPerbaharui</i></sup></h5>
                </div>

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
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="jeniskelamin">Jenis Kelamin</label>
                      <select @readonly(true) name="jeniskelamin" class="form-control" id="">
                        @if ($data->jeniskelamin == 'L')
                            <option value="L">Laki-Laki</option>                       
                         @else
                            <option value="P">Perempuan</option>                       
                        @endif
                      </select>
                        @error('jeniskelamin')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="alergiobat">Alergi Obat</label>
                      <select @readonly(true) name="alergiobat" class="form-control @error('alergiobat') @enderror" id="">
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
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="sistole">Suhu Tubuh</label>
                      <input value="{{old('suhutubuh')}}" type="number" step="any" name="suhutubuh" id="suhutubuh" class="form-control @error('suhutubuh') @enderror" />
                      <p class="mt-1"><sup><i>Satuan dalam &deg; Celcius</i></sup></p>
                        @error('suhutubuh')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>
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
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="sistole">Sistole </label>
                      <input value="{{old('sistole')}}" type="number" name="sistole" id="sistole" class="form-control @error('sistole') is-invalid @enderror" />
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
                        <input value="{{old('diastole')}}" type="number" name="diastole" id="diastole" class="form-control @error('diastole') is-invalid @enderror" />
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
                    <div class="form-outline">
                        <label class="form-label" for="beratbadan">Berat Badan</label>
                        <input value="{{old('beratbadan')}}" type="number" step="any" name="beratbadan" id="beratbadan" class="form-control @error('beratbadan') is-invalid @enderror" />
                        <p class="mt-1"><sup><i>Satuan dalam kg</i></sup></p>
                        @error('beratbadan')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tinggibadan">Tinggi Badan</label>
                      <input value="{{old('tinggibadan')}}" type="number" step="any" name="tinggibadan" id="tinggibadan" class="form-control @error('tinggibadan') is-invalid @enderror" />
                      <p class="mt-1"><sup><i>Satuan dalam cm</i></sup></p>
                      @error('namatinggibadanibu')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                  </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-2">Tambah Data</button>

                <button type="reset" class="btn btn-warning btn-block mb-2">Reset</button>
            </form> 
        </div>
    </div>
    
</div>


@endsection