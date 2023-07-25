@extends('mainmenu')
@section('title')
    Data Observasi Awal
@endsection 

@section('contentmenu')
<div class="container-fluid">
    <h4 class="mb-2">Data Observasi Awal</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('observasiawal')}}">Observasi Awal</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lihat Data</li>
      </ol>
    </nav>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <strong>Lihat </strong> Data
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
                            <input value="{{old('nama', $data->nama)}}" type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" />
                              @error('nama')
                                <div class="invalid-feedback">
                                  {{$message}}
                                </div>
                              @endif
                        </div>
                    </div>

                    <div class="col">
                      <div class="form-outline">
                          <label class="form-label" for="pasien_id">Pasien Id</label>
                          <input value="{{old('pasien_id',$data->id)}}" type="text" name="pasien_id" id="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" />
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
                      <select name="jeniskelamin" class="form-control" id="">
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
                    <div class="form-outline">
                      <label class="form-label" for="tglhadir">Tanggal Kehadiran</label>
                      <input value="{{old('tglhadir',$data->tgllahir)}}" type="date" name="tglhadir" id="tglhadir" class="form-control @error('tglhadir') is-invalid @enderror" />
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
                      <label class="form-label" for="alergiobat">Alergi Obat</label>
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
                      <label class="form-label" for="sistole">Suhu Tubuh</label>
                      <input value="{{old('suhutubuh',$data->suhutubuh)}}" type="text" name="suhutubuh" id="suhutubuh" class="form-control @error('suhutubuh') @enderror" />
                        @error('suhutubuh')
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
                      <input value="{{old('sistole',$data->sistole)}}" type="text" name="sistole" id="sistole" class="form-control @error('sistole') is-invalid @enderror" />
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
                        <input value="{{old('diastole',$data->diastole)}}" type="text" name="diastole" id="diastole" class="form-control @error('diastole') is-invalid @enderror" />
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
                        <input value="{{old('beratbadan',$data->beratbadan)}}" type="text" name="beratbadan" id="beratbadan" class="form-control @error('beratbadan') is-invalid @enderror" />
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
                      <input value="{{old('tinggibadan',$data->tinggibadan)}}" type="text" name="tinggibadan" id="tinggibadan" class="form-control @error('tinggibadan') is-invalid @enderror" />
                      @error('namatinggibadanibu')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
            </form> 
        </div>
    </div>
    
</div>


@endsection