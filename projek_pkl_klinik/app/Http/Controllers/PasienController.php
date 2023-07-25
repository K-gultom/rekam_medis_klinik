<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{

    public function view_DataPasien(){
        // $data = Pasien::latest()->take(5)->get();
        $data = Pasien::latest()->paginate(5);

        return view('datapasien', compact('data'));

    }

    public function cari_DataPasien(Request $r){
        $search = $r->search; // Simpan parameter pencarian
    
        $data = Pasien::where('id', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%")
                    ->paginate(10)
                    ->appends(['search' => $search]); // Tambahkan parameter pencarian ke URL
        
        return view('datapasien', compact('data'));
        
    }

    public function add_DataPasien(){
        
        return view ('adddatapasien');
    }
    
    public function add_DataPasien_proses(Request $req){
        
        $req->validate([
            
            "nama" => 'required|min:3|max:30',
            "noNIK" => 'required|min:3|max:20',
            "noBpjs" => 'required|min:3|max:20',
            "tempatlahir" => 'required|min:3|max:30',
            "tgllahir" => 'required',
            "jeniskelamin" => 'required',
            "alamat" => 'required|min:3',
            "telp" => 'required|max:15',
            "alergiobat" => 'required',
            "namaayah" => 'required|min:3',
            "namaibu" => 'required|min:3',
            "namasuami" => 'required|min:3',
            "namaisteri" => 'required|min:3',
        ]);
        
        $new = new Pasien();
        $new -> nama = $req -> nama;
        $new -> noNIK = $req -> noNIK;
        $new -> noBpjs = $req -> noBpjs;
        $new -> tempatlahir = $req -> tempatlahir;
        $new -> tgllahir = $req -> tgllahir;
        $new -> jeniskelamin = $req -> jeniskelamin;
        $new -> alamat = $req -> alamat;
        $new -> telp = $req -> telp;
        $new -> alergiobat = $req -> alergiobat;
        $new -> namaayah = $req -> namaayah;
        $new -> namaibu = $req -> namaibu;
        $new -> namasuami = $req -> namasuami;
        $new -> namaisteri = $req -> namaisteri;
        $new -> save();

        $req->session()->flash('message', 'Tambah Data Sukses');
        $req->session()->flash('timeout', 5000);

        // dd($req->all());
        
        return redirect ('/dataPasien');
    }
    
    public function editdatapasien($id){

        $data = Pasien::findOrFail($id);
        return view ('editdatapasien', compact('data'));
    }
    
    public function edit_prosesdatapasien(Request $req ,$id){

        $req->validate([
            
            "nama" => 'required|min:3|max:30',
            "noNIK" => 'required|min:3|max:16',
            "noBpjs" => 'required|min:3|max:20',
            "tempatlahir" => 'required|min:3|max:30',
            "tgllahir" => 'required',
            "jeniskelamin" => 'required',
            "alamat" => 'required|min:3|max:50',
            "telp" => 'required|max:15',
            "alergiobat" => 'required',
            "namaayah" => 'required|min:3',
            "namaibu" => 'required|min:3',
            "namasuami" => 'required|min:3',
            "namaisteri" => 'required|min:3',
        ]);
        
        $new =  Pasien::findorFail($id);
        $new -> nama = $req -> nama;
        $new -> noNIK = $req -> noNIK;
        $new -> noBpjs = $req -> noBpjs;
        $new -> tempatlahir = $req -> tempatlahir;
        $new -> tgllahir = $req -> tgllahir;
        $new -> jeniskelamin = $req -> jeniskelamin;
        $new -> alamat = $req -> alamat;
        $new -> telp = $req -> telp;
        $new -> alergiobat = $req -> alergiobat;
        $new -> namaayah = $req -> namaayah;
        $new -> namaibu = $req -> namaibu;
        $new -> namasuami = $req -> namasuami;
        $new -> namaisteri = $req -> namaisteri;
        $new -> save();

        $req->session()->flash('message', 'Update Data Sukses');
        $req->session()->flash('timeout', 5000);
        
        // dd($req->all());
        return redirect('/dataPasien');
        
    }

    public function deletedatapasien($id){

        $delete = Pasien::findorFail($id);
        $delete -> delete();

        return back();
        
    }

}
