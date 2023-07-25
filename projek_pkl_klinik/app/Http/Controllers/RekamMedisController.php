<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\observasiawal;
use App\Models\observasilanjut;
use App\Models\rekmed;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


class RekamMedisController extends Controller
{
    
    public function view_RekamMedis(Request $r){
        $search = $r->search; // Simpan parameter pencarian
    
        if ($search) {
            $data = Pasien::where('id', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%")
                    ->paginate(50)
                    ->appends(['search' => $search]); // Tambahkan parameter pencarian ke URL
    
            $count = $data->count(); // Hitung jumlah data yang sesuai dengan pencarian
        } else {
            $data = collect(); // Inisialisasi koleksi kosong jika tidak ada pencarian
            $count = 0; // Set jumlah data menjadi 0
        }
    
        return view('datarekmed', compact('data', 'count'));
    }
    

    public function lihatrekmed($id){

        $data = Pasien::findOrFail($id);
        $observasiawal = ObservasiAwal::where('pasien_id', $id)->orderBy('tglhadir', 'desc')->get();
        $observasilanjutan = ObservasiLanjut::where('pasien_id', $id)->orderBy('tglhadir', 'desc')->get();
        $rekammedis = rekmed::where('pasien_id', $id)->orderBy('tglinput', 'desc')->get();

        foreach ($observasiawal as $item) {
            $item->tglhadir = Carbon::parse($item->tglhadir)->format('d-m-Y');
        }
    
        foreach ($observasilanjutan as $item) {
            $item->tglhadir = Carbon::parse($item->tglhadir)->format('d-m-Y');
        }
    
        foreach ($rekammedis as $item) {
            $item->tglinput = Carbon::parse($item->tglinput)->format('d-m-Y');
        }

        return view('viewdatarekmed', compact('data', 'observasiawal', 'observasilanjutan', 'rekammedis'));
    }

    public function lihatdata_ObservasiAwal($id){

        $data = Observasiawal::with('pasien')->find($id);
        $namaPasien = $data->pasien->nama;
    
        return view('view_rekmed_observasiAwal', compact('data', 'namaPasien'));

    }

    public function lihatdata_Observasilanjutan($id){

        $data = observasilanjut::with('pasien')->find($id);
        $namaPasien = $data->pasien->nama;

        $observasiAwal = observasiawal::where('pasien_id', $data->pasien_id)->first();

        return view('view_rekmed_observasiLanjutan', compact('data', 'namaPasien', 'observasiAwal'));

    }

    public function lihatdata_riwayatrekammedis($id){

        $data = rekmed::with('pasien')->find($id);
        $namaPasien = $data->pasien->nama;

        return view('view_rekmed_pasien', compact('data', 'namaPasien'));


    }

    public function tambah_RekamMedis_Proses(Request $req, $id){

        $req->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'tglinput' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png,pdf',
            'catatan' => 'required'

        ]);

        $photo = $req -> file('photo');
        $new_photo_name = uniqid().".".$photo->getClientOriginalExtension();
        $photo -> move('images',$new_photo_name);

        $new = new rekmed();
        $new -> pasien_id = $req-> pasien_id;
        $new -> user_id = Auth::id();
        $new -> tglinput = $req -> tglinput;
        $new -> photo = $new_photo_name;
        $new -> catatan = $req -> catatan;
        $new -> save();

        $req -> session()->flash('message', 'Tambah Data Berhasil');
        
        return redirect ('/rekammedis');

    }
    


    public function tambah_RekamMedis($id){

        $data = Pasien::findOrFail($id);
        return view('addrekmed', compact('data'));
    }

    public function delete_Rekam_Medis($id){
        $rekamMedis = rekmed::findOrFail($id);

        $filePath = public_path('images/' . $rekamMedis->photo);

        // Check if the file exists before deleting
        if (File::exists($filePath)) {
            // Delete the file
            File::delete($filePath);
        }

        // Delete the data rekam medis
        $rekamMedis->delete();

        return back();
    }

}
