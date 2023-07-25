@extends('mainmenu')
@section('title')
    Lihat Data Pegawai
@endsection 

@section('contentmenu')

<div class="container-fluid">
    <h4 class="mb-2">Lihat Data Pegawai</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dataPegawai')}}">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lihat Data Pegawai</li>
      </ol>
    </nav>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <strong>Data </strong> Pegawai
            </div>
          </div>
        </div>
        
        <div class="card-body">
            <form action="" method="post">
                @csrf
                
                <div class="row mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="nama">Nama Lengkap</label>
                      <input readonly value="{{$data->nama}}" type="text" class="form-control" />
                    </div>
                </div>
    
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tempatlahir">Tempat Lahir</label>
                      <input readonly value="{{$data->tempatlahir}}" type="text" class="form-control" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-outline">
                      <label class="form-label" for="tgllahir">Tanggal Lahir</label>
                      <input readonly value="{{$data->tgllahir}}" type="date" class="form-control" />
                    </div>
                  </div>
                </div>

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
              
                <div class="form-outline mb-4">
                  <label class="form-label" for="alamat">Alamat</label>
                  <input readonly value="{{$data->alamat}}" type="text"class="form-control" />
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="telp">No Telp/Whatsapp</label>
                  <input readonly value="{{$data->telp}}" type="text" class="form-control" />
                </div>

                <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="email">Email</label>
                        <input readonly value="{{$data->email}}" type="email"class="form-control">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <label class="form-label" for="password">Password</label>
                        <input type="text" disabled class="form-control"/>
                      </div>
                    </div>
                  </div>
  
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
                  </div>
                  
              <a href="{{url('dataPegawai')}}" class="btn btn-primary col-1">Kembali</a>
            </form> 
        </div>
    </div>
</div>

@endsection