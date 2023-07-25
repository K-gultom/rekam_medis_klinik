@extends('mainmenu')
@section('title')
    Tambah Data Pasien
@endsection 

@section('contentmenu')

<div class="container-fluid">
    <h4 class="mb-2">Tambah Data Pasien</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dataPasien')}}">Data Pasien</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Pasien</li>
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
            <form action="tambahdatapasien" method="post">
                @csrf
                
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input value="{{old('nama')}}" type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" />
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
                    <div class="form-outline mb-4">
                      <label class="form-label" for="noNIK">Nomor Induk Kependudukan (NIK) </label>
                      <input value="{{old('noNIK')}}" type="number" name="noNIK" id="noNIK" class="form-control @error('noNIK') is-invalid @enderror" />
                      <p class="mt-1"><sup><i>*Terdidri dari 16 Angka</i></sup></p>
                      @error('noNIK')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @endif
                    </div>
                  </div>

                  <div class="col">
                      <div class="form-outline mb-4">
                        <label class="form-label" for="noBpjs">No BPJS</label>
                        <input value="{{old('noBpjs')}}" type="number" name="noBpjs" id="noBpjs" class="form-control @error('noBpjs') is-invalid @enderror" maxlength="16" minlength="16" />
                        <p class="mt-1"><sup><i>*isi dengan *** jika tidak memiliki nomor BPJS</i></sup></p>
                        @error('noBpjs')
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
                      <label class="form-label" for="tempatlahir">Tempat Lahir</label>
                      <input value="{{old('tempatlahir')}}" type="text" name="tempatlahir" id="tempatlahir"  class="form-control @error('tempatlahir') is-invalid @enderror" />
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
                      <input value="{{old('tgllahir')}}" type="date" name="tgllahir" id="tgllahir" class="form-control @error('tgllahir') is-invalid @enderror" />
                        @error('tgllahir')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="jeniskelamin">Jenis Kelamin</label>
                  <select name="jeniskelamin" class="form-control @error('jeniskelamin') is-invalid @enderror" id="">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jeniskelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ old('jeniskelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                    @error('jeniskelamin')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @endif
                </div>
              
                <div class="form-outline mb-4">
                  <label class="form-label" for="alamat">Alamat</label>
                  <input value="{{old('alamat')}}" type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" />
                    @error('alamat')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @endif
                </div>
              
                <div class="form-outline mb-4">
                  <label class="form-label" for="telp">No Telp/Whatsapp</label>
                  <input value="{{old('telp')}}" type="text" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" />
                    @error('telp')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @endif
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="alergiobat">Alergi Obat</label>
                  <select name="alergiobat" class="form-control @error('alergiobat') is-invalid @enderror" id="">
                    <option value="">Anda Alergi Obat ?</option>
                    <option value="Y" {{ old('alergiobat') == 'Y' ? 'selected' : '' }}>Ya</option>
                    <option value="N" {{ old('alergiobat') == 'N' ? 'selected' : '' }}>Tidak</option>
                  </select>
                    @error('alergiobat')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @endif
                </div>

                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="namaayah">Nama Ayah</label>
                        <input value="{{old('namaayah')}}" type="text" name="namaayah" id="namaayah" class="form-control @error('namaayah') is-invalid @enderror" />
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
                      <input value="{{old('namaibu')}}" type="text" name="namaibu" id="namaibu" class="form-control @error('namaibu') is-invalid @enderror" />
                      @error('namaibu')
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
                      <label class="form-label" for="namasuami">Nama Suami</label>
                      <input value="{{old('namasuami')}}" type="text" name="namasuami" id="namasuami" class="form-control @error('namasuami') is-invalid @enderror" />
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
                      <input value="{{old('namaisteri')}}" type="text" name="namaisteri" id="namaisteri" class="form-control @error('namaisteri') is-invalid @enderror" />
                      <p class="mt-1"><sup><i>*isi dengan *** jika belum Menikah</i></sup></p>
                      @error('namaisteri')
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