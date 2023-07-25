@extends('mainmenu')
@section('title')
    Tambah Data Pasien
@endsection 

@section('contentmenu')

<div class="container-fluid">
    <h4 class="mb-2">Edit Data Pasien</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dataPasien')}}">Data Pasien</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Pasien</li>
      </ol>
    </nav>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <strong>Edit </strong> Data
            </div>
          </div>
        </div>
        <div class="card-body">
            @if(Session::has('message'))
              <div class="card alert alert-success">
                  {{Session::get('message')}}
              </div>
            @endif

            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <form action="{{url('editdatapasien')}}/{{$data->id}}" method="post">
                @csrf
                
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input value="{{old('nama',$data->nama)}}" type="text" name="nama" id="nama" class="form-control @error('nama') @enderror" />
                              @error('nama')
                                <div class="invalid-feedback">
                                  {{$message}}
                                </div>
                              @endif
                        </div>
                    </div>
              </div>

                <div class="row mb-4">
                  <div class="col">
                    <!-- NO NIK -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="noNIK">Nomor Induk Kependudukan (NIK) </label>
                      <input value="{{old('noNIK',$data->noNIK)}}" type="text" name="noNIK" id="noNIK" class="form-control @error('noNIK') @enderror" />
                      <p class="mt-1"><sup><i>*Terdidri dari 16 Angka</i></sup></p>
                      @error('noNIK')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                    </div>
                </div>
                  <div class="col">
                      <!-- NO BPJS -->
                      <div class="form-outline mb-4">
                        <label class="form-label" for="noBpjs">No BPJS</label>
                        <input value="{{old('noBpjs',$data->noBpjs)}}" type="text" name="noBpjs" id="noBpjs" class="form-control @error('noBpjs') @enderror" />
                        <p class="mt-1"><sup><i>*isi dengan *** jika tidak memiliki nomor BPJS</i></sup></p>
                        @error('noBpjs')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                      </div>
                  </div>
                </div>
    
                <!-- Text input Tempat & Tanggal Lahir -->
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tempatlahir">Tempat Lahir</label>
                      <input value="{{old('tempatlahir',$data->tempatlahir)}}" type="text" name="tempatlahir" id="tempatlahir"  class="form-control @error('tempatlahir') @enderror" />
                        @error('tempatlahir')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tgllahir">Tanggal Lahir</label>
                      <input value="{{old('tgllahir',$data->tgllahir)}}" type="date" name="tgllahir" id="tgllahir" class="form-control @error('tgllahir') @enderror" />
                        @error('tgllahir')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>
                </div>

                <!-- Radio Input jenis kelamin-->
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
              
                <!-- Text input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="alamat">Alamat</label>
                  <input value="{{old('alamat',$data->alamat)}}" type="text" name="alamat" id="alamat" class="form-control @error('alamat') @enderror" />
                    @error('alamat')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @endif
                </div>
              
                <!-- telp input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="telp">No Telp/Whatsapp</label>
                  <input value="{{old('telp',$data->telp)}}" type="text" name="telp" id="telp" class="form-control @error('telp') @enderror" />
                    @error('telp')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @endif
                </div>

                <!-- Radio Input alergi obat Obat-->
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

                <!-- Text Input nama Ayah dan Ibu-->
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="namaayah">Nama Ayah</label>
                        <input value="{{old('namaayah',$data->namaayah)}}" type="text" name="namaayah" id="namaayah" class="form-control @error('namaayah') @enderror" />
                        <p class="mt-1"><sup><i>*isi dengan *** jika Sudah Menikah</i></sup></p>
                        @error('namaayah')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="namaibu">Nama Ibu</label>
                      <input value="{{old('namaibu',$data->namaibu)}}" type="text" name="namaibu" id="namaibu" class="form-control @error('namaibu') @enderror" />
                      <p class="mt-1"><sup><i>*isi dengan *** jika Sudah Menikah</i></sup></p>
                      @error('namaibu')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                  </div>
                  </div>
                </div>

                <!-- Text Input nama Suami dan Isteri-->
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="namasuami">Nama Suami</label>
                      <input value="{{old('namasuami',$data->namasuami)}}" type="text" name="namasuami" id="namasuami" class="form-control @error('namasuami') @enderror" />
                      <p class="mt-1"><sup><i>*isi dengan *** jika belum Menikah</i></sup></p>
                      @error('namasuami')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="namaisteri">Nama Isteri</label>
                      <input value="{{old('namaisteri',$data->namaisteri)}}" type="text" name="namaisteri" id="namaisteri" class="form-control @error('namaisteri') @enderror" />
                      <p class="mt-1"><sup><i>*isi dengan *** jika belum Menikah</i></sup></p>
                      @error('namaisteri')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-2">Update Data</button>
                
                <a href="{{url('dataPasien')}}" class="btn btn-primary btn-block mb-2">Kembali</a>
            </form> 
        </div>
    </div>
    
</div>


@endsection