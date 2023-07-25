@extends('mainmenu')
@section('title')
    Tambah Data Pegawai
@endsection 

@section('contentmenu') 

<div class="container-fluid">
    <h4 class="mb-2">Tambah Data Pegawai</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dataPegawai')}}">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Pegawai</li>
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
            @if(Session::has('message'))
              <div class="card alert alert-success">
                {{Session::get('message')}}
              </div>
            @endif
            
            <form action="tambahdatapegawai" method="post">
                @csrf
                
                <div class="row mb-4">
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
                  <select  value="{{old('jeniskelamin')}}" name="jeniskelamin" class="form-control @error('jeniskelamin') is-invalid @enderror" id="" >
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                    @error('jeniskelamin')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @endif
                </div>
              
                <div class="form-outline mb-4">
                  <label class="form-label" for="alamat">Alamat</label>
                  <input  value="{{old('alamat')}}" type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" />
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

                <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="email">Email</label>
                        <input value="{{old('email')}}" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Isi dengan Email Anda">
                        <h6 class="mt-2"><sup><i>*Email digunakan saat Login ke Sistem</i></sup></h6>
                          @error('email')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                          @endif
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="password">Password</label>
                        <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />
                        <h6 class="mt-2"><sup><i>*Password digunakan saat Login Sistem</i></sup></h6>
                          @error('password')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                          @endif
                      </div>
                    </div>
                  </div>
  
                  <div class="form-outline mb-4">
                      <label class="form-label" for="level">Bagian Kerja</label>
                      <select name="level" class="form-control @error('level') is-invalid @enderror" id="">
                        <option value="">Pilih Bagian Kerja</option>
                        @if (Auth::user()->level == 'admin')
                            <option value="dokterumum">Dokter (Poli Umum)</option>
                            <option value="doktergigi">Dokter (Poli Gigi)</option>
                            <option value="bidan">Bidan</option>
                            <option value="perawat">Perawat</option>  
                        @elseif(Auth::user()->level == 'superadmin')
                            <option value="dokterumum">Dokter (Poli Umum)</option>
                            <option value="doktergigi">Dokter (Poli Gigi)</option>
                            <option value="bidan">Bidan</option>
                            <option value="perawat">Perawat</option> 
                            <option value="admin">Admin</option>  
                            <option value="superadmin">Super Admin</option>  
                        @endif
                        
                      </select>
                      @error('level')
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