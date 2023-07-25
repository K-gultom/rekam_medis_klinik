@extends('mainmenu')
@section('title')
    Lihat Data Rekam Medis
@endsection 

@section('contentmenu')

<div class="container-fluid">
    <h4 class="mb-2">Data Rekam Medis</h4>
    <nav aria-label="breadcrumb" class="mb-1">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('rekammedis')}}">Data Rekam Medis</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lihat Data</li>
      </ol>
    </nav>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <strong>Data </strong> Pasien
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
                            <input readonly value="{{old('nama',$data->nama)}}" type="text" name="nama" id="nama" class="form-control @error('nama') @enderror" />
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
                    <!-- NO NIK -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="noNIK">Nomor Induk Kependudukan (NIK) </label>
                      <input readonly value="{{old('noNIK',$data->noNIK)}}" type="text" name="noNIK" id="noNIK" class="form-control @error('noNIK') @enderror" />
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
                        <input readonly value="{{old('noBpjs',$data->noBpjs)}}" type="text" name="noBpjs" id="noBpjs" class="form-control @error('noBpjs') @enderror" />
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
                      <input readonly value="{{old('tempatlahir',$data->tempatlahir)}}" type="text" name="tempatlahir" id="tempatlahir"  class="form-control @error('tempatlahir') @enderror" />
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
                      <input readonly value="{{old('tgllahir',$data->tgllahir)}}" type="date" name="tgllahir" id="tgllahir" class="form-control @error('tgllahir') @enderror" />
                        @error('tgllahir')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                        @endif
                    </div>
                  </div>
                </div>

                {{-- <div class="row mb-4">
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
                    </div>
                </div> --}}

{{--               
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
                </div> --}}

                <!-- Submit button -->

            </form> 
        </div>


        <!-- Section Rekam Medis -->
        <div class="card-header ">
            {{-- <div class="d-flex">
                <div class="w-100">
                    <strong>Riwayat</strong> Rekam Medis
                    
                </div>
            </div> --}}
            <div class="d-flex">
              <div class="w-100">
                  <strong>Dokumen </strong>Rekam Medis
              </div>
              <div class="w-100 text-end">
                  <a href="{{url('tambahdatarekammedis')}}/{{$data->id}}" class="btn btn-primary">
                      Tambah Dokumen Rekam Medis <i class="bi bi-plus-circle"></i> 
                  </a>
              </div>
          </div>
        </div>
        <div class="card-body"> 
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th >Nama</th>
                        <th class="text-center">No Rekam Medis</th>
                        <th class="text-center">Tanggal Kedatangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekammedis as $item)
                      <tr>
                          <td class="text-center">{{$loop->iteration}} </td>
                              {{-- <td>{{$item->pasien->nama}} </td>
                              <td>{{$item->pasien->telp}} </td> --}}
                              @if ($item->pasien !== null)
                                  <td>{{$item->pasien->nama}}</td>
                                  <td class="text-center">{{$item->pasien->id}}</td>
                              @else
                                  <td>Data Pasien Tidak Tersedia</td>
                                  <td>-</td>
                              @endif
                          <td class="text-center">{{$item->tglinput}} </td>
                          <td class="text-center">
                              <a href="{{url('Riwayatrekammedis')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                  <i class="bi bi-eye"></i> Lihat Data 
                              </a>
                              <a href="{{url('hapusdatarekmed',['id' => $item->id]) }}}" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Hapus Data ???');">
                                <i class="bi bi-trash"></i> Delete
                              </a>
                              
                          </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Section Observasi Awal -->
        <div class="card-header ">
            <strong>Riwayat</strong> Observasi Awal
        </div>
        <div class="card-body"> 
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th >Nama</th>
                        <th class="text-center">No Rekam Medis</th>
                        <th class="text-center">Tanggal Kedatangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($observasiawal as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}} </td>
                                {{-- <td>{{$item->pasien->nama}} </td>
                                <td>{{$item->pasien->telp}} </td> --}}
                                @if ($item->pasien !== null)
                                    <td>{{$item->pasien->nama}}</td>
                                    <td class="text-center">{{$item->pasien->id}}</td>
                                @else
                                    <td>Data Pasien Tidak Tersedia</td>
                                    <td>-</td>
                                @endif
                            <td class="text-center">{{$item->tglhadir}} </td>
                            <td class="text-center">
                                <a href="{{url('Rekmedobservasiawal')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                    <i class="bi bi-eye"></i> Lihat Data
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Section Observasi Lanjutan -->
        <div class="card-header ">
            <strong>Riwayat</strong> Observasi Lanjutan
        </div>
        <div class="card-body"> 
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th >Nama</th>
                        <th class="text-center">No Rekam Medis</th>
                        <th class="text-center">Tanggal Kedatangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($observasilanjutan as $item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}} </td>
                                {{-- <td>{{$item->pasien->nama}} </td>
                                <td>{{$item->pasien->telp}} </td> --}}
                                @if ($item->pasien !== null)
                                    <td>{{$item->pasien->nama}}</td>
                                    <td class="text-center">{{$item->pasien->id}}</td>
                                @else
                                    <td>Data Pasien Tidak Tersedia</td>
                                    <td>-</td>
                                @endif
                            <td class="text-center">{{$item->tglhadir}} </td>
                            <td class="text-center">
                                <a href="{{url('Rekmedobservasilanjutan')}}/{{$item->id}} " class="btn btn-success btn-sm">
                                    <i class="bi bi-eye"></i> Lihat Data
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <a href="{{url('rekammedis')}}" class="btn btn-primary btn-block mb-2">Kembali</a>
        </div>

        

    </div>
    
</div>


@endsection