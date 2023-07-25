<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\observasilanjut;
use App\Models\observasiawal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ObservasiLanjutController extends Controller
{
    public function view_ObservasiLanjutan(){

        $datasend = observasilanjut::orderBy('tglhadir', 'desc')->paginate(5);
        
        foreach ($datasend as $data) {
            $data->tglhadir = Carbon::parse($data->tglhadir)->format('d-m-Y');
        }
        
        return view('observasilanjutan',compact('datasend'));

    }

    public function cari_ObservasiLanjutan(Request $r){

        $keyword = '%' . $r->nama . '%';

        $datasend = observasilanjut::with('pasien')->whereHas('pasien', function ($query) use ($keyword) {
            $query->where('nama', 'LIKE', $keyword)
            ->orwhere('id', 'LIKE', $keyword);

        })->orderBy('tglhadir', 'desc') ->paginate();


        foreach ($datasend as $data) {
            $data->tglhadir = Carbon::parse($data->tglhadir)->format('d-m-Y');
        }

        // dd($r->all());
        return view('observasilanjutan', compact('datasend'));

    }

    public function add_ObservasiLanjutan($id){

        $data = observasiawal::findOrFail($id);
        $datapasien = Pasien::where('id',  $data->pasien_id)->first();
        // dd($id->all());
        return view('adddataobservasilanjutan', compact('data', 'datapasien'));

    }
    

    public function add_ProsesObservasiLanjutan(Request $req){

        $req->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            "tglhadir" => 'required',
            "subjective" => 'required',
            "assesment" => 'required',
            "planing" => 'required',
        ]);
        $new = new observasilanjut();
        $new -> pasien_id = $req-> pasien_id;
        $new -> user_id = Auth::id();
        $new -> tglhadir = $req -> tglhadir;
        $new -> subjective = $req -> subjective;
        $new -> assesment = $req -> assesment;
        $new -> planing = $req -> planing;
        $new -> save();

        $req->session()->flash('message', 'Tambah Data Sukses');
        $req->session()->flash('timeout', 5000);
        // dd($req->all());
        return redirect('/observasilanjutan');
        
    }

    public function delete_ObservasiLanjutan($id){

        $delete = observasilanjut::findOrFail($id);
        $delete -> delete();

        return back();

    }

    public function lihatdata_ObservasiLanjutan($id){

        $data = observasilanjut::with('pasien')->find($id);
        $namaPasien = $data->pasien->nama;

        $observasiAwal = observasiawal::where('pasien_id', $data->pasien_id)->first();

        return view('viewobservasilanjut', compact('data', 'namaPasien', 'observasiAwal'));

    }



}
