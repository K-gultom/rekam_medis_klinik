<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\observasiawal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ObservasiAwalController extends Controller
{

    public function view_ObservasiAwal(){
        
        $datasend = observasiawal::orderBy('tglhadir', 'desc')->paginate(5);
        // dd($r->all());
        foreach ($datasend as $data) {
            $data->tglhadir = Carbon::parse($data->tglhadir)->format('d-m-Y');
        }
        
        return view('observasiawal', compact('datasend'));
        
    }

    public function cari_ObservasiAwal(Request $r){
    
        $keyword = '%' . $r->nama . '%';

        $datasend = Observasiawal::with('pasien')->whereHas('pasien', function ($query) use ($keyword) {
            $query->where('nama', 'LIKE', $keyword)
            ->orwhere('id', 'LIKE', $keyword);

        })->orderBy('tglhadir', 'desc')->paginate();


        foreach ($datasend as $data) {
            $data->tglhadir = Carbon::parse($data->tglhadir)->format('d-m-Y');
        }

        // dd($r->all());
        return view('observasiawal', compact('datasend'));

    }

    public function add_ObservasiAwal($id){

        $data = Pasien::findOrFail($id);
        return view('adddataobservasiawal', compact('data'));

    }

    public function add_ProsesObservasiAwal(Request $req){
        // dd($req ->all());
        
        $req->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            "tglhadir" => 'required',
            "suhutubuh" => 'required|max:5',
            "sistole" => 'required|max:5',
            "diastole" => 'required|max:5',
            "beratbadan" => 'required|max:5',
            "tinggibadan" => 'required|max:5',
        ]);

        // , compact('data')
        $new = new observasiawal();
        $new -> pasien_id = $req-> pasien_id;
        $new -> user_id = Auth::id();
        $new -> tglhadir = $req -> tglhadir;
        $new -> suhutubuh = $req -> suhutubuh;
        $new -> sistole = $req -> sistole;
        $new -> diastole = $req -> diastole;
        $new -> beratbadan = $req -> beratbadan;
        $new -> tinggibadan = $req -> tinggibadan;
        $new -> save();

        $req -> session()->flash('message', 'Tambah Data Berhasil');
        
        return redirect ('/observasiawal');

    }

    public function delete_ObservasiAwal($id){

        $delete = observasiawal::findorFail($id);
        $delete -> delete();
        // $req->session()->flash('message', 'Data Berhasil Dihapus');
        // $req->session()->flash('timeout', 5000);
        return back();

    }

    public function lihatdata_ObservasiAwal($id){

        $data = Observasiawal::with('pasien')->find($id);
        $namaPasien = $data->pasien->nama;
    
        return view('viewobservasiawal', compact('data', 'namaPasien'));

    }
}