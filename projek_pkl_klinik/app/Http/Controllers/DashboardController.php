<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Pasien;
use App\Models\observasiawal;
use App\Models\observasilanjut;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    // public function index(Request $request) {
    //     $selectedDate = $request->input('tanggal');
    //     $selectedMonth = $request->input('bulan');
    
    //     if (!$selectedDate) {
    //         $selectedDate = date('Y-m-d');
    //     }
    
    //     if (!$selectedMonth) {
    //         $selectedMonth = date('Y-m');
    //     }
    
    //     $totalPasien = Pasien::count();
    //     $totalObservasiAwal = ObservasiAwal::count();
    //     $totalObservasiLanjutan = ObservasiLanjut::count();
    
    //     $observasiAwalPerHari = ObservasiAwal::select(DB::raw("DATE_FORMAT(tglhadir, '%d-%m-%Y') as tanggal"), DB::raw('COUNT(*) as total'))
    //         ->whereDate('tglhadir', $selectedDate)
    //         ->groupBy('tanggal')
    //         ->get();
    
    //     $observasiAwalPerBulan = ObservasiAwal::select(DB::raw("DATE_FORMAT(tglhadir, '%m-%Y') as bulan"), DB::raw('COUNT(*) as total'))
    //         ->whereMonth('tglhadir', '=', date('m', strtotime($selectedMonth)))
    //         ->whereYear('tglhadir', '=', date('Y', strtotime($selectedMonth)))
    //         ->groupBy('bulan')
    //         ->get();
    
    //     $jumlahPasienLakiLaki = Pasien::where('jeniskelamin', 'L')->count();
    //     $jumlahPasienPerempuan = Pasien::where('jeniskelamin', 'P')->count();
    
    //     $pasienAda = count($observasiAwalPerHari) > 0;
    
    //     return view('dashboard', compact(
    //         'totalPasien',
    //         'totalObservasiAwal',
    //         'totalObservasiLanjutan',
    //         'observasiAwalPerHari',
    //         'observasiAwalPerBulan',
    //         'jumlahPasienLakiLaki',
    //         'jumlahPasienPerempuan',
    //         'pasienAda',
    //         'selectedDate',
    //         'selectedMonth'
    //     ));
    // }
    
    // public function index(){

    //     $totalPasien = Pasien::count();
    //     $totalObservasiAwal = observasiawal::count();
    //     $totalObservasiLanjutan = observasilanjut::count();

    //     $observasiAwalPerHari = ObservasiAwal::select(DB::raw("DATE_FORMAT(tglhadir, '%d-%m-%Y') as tanggal"), DB::raw('COUNT(*) as total'))
    //     ->where('tglhadir', '>=', date('Y-m-d'))
    //     ->groupBy('tanggal')
    //     ->get();

    //     $jumlahPasienLakiLaki = Pasien::where('jeniskelamin', 'L')->count();
    //     $jumlahPasienPerempuan = Pasien::where('jeniskelamin', 'P')->count();


    //     return view('dashboard', 
    //         compact(
    //             'totalPasien', 
    //             'totalObservasiAwal', 
    //             'totalObservasiLanjutan',
    //             'observasiAwalPerHari',
    //             'jumlahPasienLakiLaki',
    //             'jumlahPasienPerempuan',
    //         )
    //     );

    // }



    public function index(Request $request) {
        $selectedDate = $request->input('tanggal'); // Mendapatkan tanggal yang dipilih oleh pengguna

        if (!$selectedDate) {
            $selectedDate = date('Y-m-d'); // Jika tidak ada tanggal yang dipilih, gunakan tanggal hari ini
        }

        $totalPasien = Pasien::count();
        $totalObservasiAwal = ObservasiAwal::count();
        $totalObservasiLanjutan = ObservasiLanjut::count();

        $observasiAwalPerHari = ObservasiAwal::select(DB::raw("DATE_FORMAT(tglhadir, '%d-%m-%Y') as tanggal"), DB::raw('COUNT(*) as total'))
            ->whereDate('tglhadir', $selectedDate) // Menggunakan tanggal yang dipilih oleh pengguna
            ->groupBy('tanggal')
            ->get();

        $jumlahPasienLakiLaki = Pasien::where('jeniskelamin', 'L')->count();
        $jumlahPasienPerempuan = Pasien::where('jeniskelamin', 'P')->count();

        $pasienAda = count($observasiAwalPerHari) > 0;

        return view('dashboard',
            compact(
                'totalPasien',
                'totalObservasiAwal',
                'totalObservasiLanjutan',
                'observasiAwalPerHari',
                'jumlahPasienLakiLaki',
                'jumlahPasienPerempuan',
                'pasienAda',
            )
        );

    }
}
