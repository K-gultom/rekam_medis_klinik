@extends('mainmenu')
@section('title')
    Edit Data Pegawai
@endsection 

@section('contentmenu')

<div class="container-fluid">
    <h4 class="mb-2">Edit Data Pegawai</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dataPegawai')}}">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Pegawai</li>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 
            <form action="{{url('editdatapegawai')}}/{{$data->id}}" method="post">
                @csrf
                
                <div class="row mb-4">
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

                <!-- Jenis Kelamin input -->
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

                <!--daftar Username dan Password untuk Login -->
                <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="email">Email</label>
                        <input value="{{old('email', $data->email)}}" type="email" name="email" id="email" class="form-control @error('email') @enderror" / placeholder="Isi dengan Email Anda">
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
                        <input type="text" disabled name="password" id="password" class="form-control @error('password') @enderror" />
                        <h6 class="mt-2"><sup><i>*Password digunakan saat Login Sistem</i></sup></h6>
                          @error('password')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                          @endif
                      </div>
                    </div>
                  </div>
  
                  <!-- Bagian Kerja -->
                  <div class="form-outline mb-4">
                      <label class="form-label" for="level">Bagian Kerja</label>
                      <select name="level" class="form-control" id="">
                            @if ($data->level == "dokterumum")
                                <option value="dokterumum">Dokter (Poli Umum)</option>
                              @elseif ($data->level == "doktergigi")
                                <option value="doktergigi">Dokter (Poli Gigi)</option>
                              @elseif ($data->level == "bidan")
                                <option value="bidan">Bidan</option>
                              @elseif ($data->level == "perawat")
                                <option value="perawat">Perawat</option> 
                              @elseif ($data->level == "admin")
                                <option value="admin">Admin</option> 
                                @elseif ($data->level == "superadmin")
                                <option value="superadmin">Super Admin</option> 
                            @endif
                      </select>
                      @error('level')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                      @endif
                  </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-2">Update Data</button>
            </form> 
        </div>
    </div>
</div>

@endsection