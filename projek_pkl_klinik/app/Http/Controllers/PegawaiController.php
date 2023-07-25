<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PegawaiController extends Controller
{
    public function view_DataPegawai(Request $r){

        $data = User::where('nama','like',"%$r->search%")
        ->orderBy('nama', 'asc')
        ->paginate(5);
        
        return view('datapegawai', compact('data'));
        
    }

    public function add_DataPegawai(){
        
        // dd($req->all());
        return view ('adddatapegawai');

    }

    public function add_DataPegawai_proses(Request $req){
        
        $req->validate([

            "nama" => 'required|min:3|max:30',
            "tempatlahir" => 'required|min:3|max:30',
            "tgllahir" => 'required',
            "jeniskelamin" => 'required',
            "alamat" => 'required|min:3',
            "telp" => 'required|max:15',
            "email" => 'required|min:5|max:50|email|unique:users,email',
            "password" => 'required|min:6', 
            "level" => 'required',
        ]);

        $new = new User();
        $new -> nama = $req -> nama;
        $new -> tempatlahir = $req -> tempatlahir;
        $new -> tgllahir = $req -> tgllahir;
        $new -> jeniskelamin = $req -> jeniskelamin;
        $new -> alamat = $req -> alamat;
        $new -> telp = $req -> telp;
        $new -> email = $req -> email;
        $new -> password = Hash::make($req -> password);
        $new -> level = $req -> level;
        $new -> save();
        
        $req->session()->flash('message', 'Tambah Data Sukses');
        $req->session()->flash('timeout', 5000);

        return redirect('/dataPegawai');

        // dd($req->all());
    }

    public function editdatapegawai($id){

        $data = User::findOrFail($id);
        return view ('editdatapegawai', compact('data'));

    }

    public function edit_prosesdatapegawai(Request $req, $id){

        $req->validate([
            "nama" => 'required|min:3|max:30',
            "tempatlahir" => 'required|min:3|max:30',
            "tgllahir" => 'required',
            "jeniskelamin" => 'required',
            "alamat" => 'required|min:3|max:50',
            "telp" => 'required|max:15',
            "email" => 'required|min:5|max:50|email',
            "level" => 'required',
        ]);

        $new =  User::findOrFail($id);
        $new -> nama = $req -> nama;
        $new -> tempatlahir = $req -> tempatlahir;
        $new -> tgllahir = $req -> tgllahir;
        $new -> jeniskelamin = $req -> jeniskelamin;
        $new -> alamat = $req -> alamat;
        $new -> telp = $req -> telp;
        $new -> email = $req -> email;
        $new -> level = $req -> level;
        $new -> save();
    
        // dd($req->all());
        $req->session()->flash('message', 'Update Data Sukses');
        $req->session()->flash('timeout', 5000);

        return redirect('/dataPegawai');
    
    }

    public function deletedatapegawai($id){

        $delete = User::findOrFail($id);
        $delete -> delete();

        return back();
        
    }

    public function lihatdatapegawai($id){

        $data = User::findOrFail($id);
        
        return view('viewdatapegawai', compact('data'));

    }
   

}
