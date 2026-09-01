<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VillageProfile;
use App\Models\PopulationStatistic;
use App\Models\PublicFacility;

class FrontEndController extends Controller
{
    public function dashboard()
    {
        // Mengambil data profil kelurahan pertama yang ada di database
        $profile = VillageProfile::first();
        
        return view('dashboard', compact('profile'));
    }

    public function penduduk(Request $request)
    {
        $query = PopulationStatistic::query();

        // Variabel baru untuk menampung data profil RT/RW
        $selected_wilayah = null;
        $all_wilayah = collect();

        // Logika untuk filter RT dan RW dari dropdown
        if ($request->filled('rt_rw')) {
            $parts = explode('-', $request->rt_rw);
            if (count($parts) == 2) {
                $query->where('rt', $parts[0])->where('rw', $parts[1]);
                
                // Ambil data detail wilayah tersebut (diambil dari data yang paling baru diupdate)
                $selected_wilayah = PopulationStatistic::where('rt', $parts[0])
                                      ->where('rw', $parts[1])
                                      ->latest('updated_at')
                                      ->first();
            }
        } 
        // Logika jika filter kosong (tampilkan semua wilayah)
        else {
            $all_wilayah = PopulationStatistic::latest('updated_at')
                            ->get()
                            ->unique(function ($item) {
                                return $item->rt . '-' . $item->rw;
                            })->sortBy(['rw', 'rt']);
        }

        // Kalkulasi total berdasarkan filter (atau total keseluruhan jika tidak difilter)
        $total_male = $query->sum('male_count');
        $total_female = $query->sum('female_count');
        $total_penduduk = $total_male + $total_female;

        // Mengambil daftar unik RT/RW untuk opsi dropdown filter
        $rtrw_list = PopulationStatistic::select('rt', 'rw')
            ->distinct()
            ->orderBy('rw')
            ->orderBy('rt')
            ->get();

        // Menambahkan selected_wilayah dan all_wilayah ke compact()
        return view('penduduk', compact('total_penduduk', 'total_male', 'total_female', 'rtrw_list', 'selected_wilayah', 'all_wilayah'));
    }

    public function kelahiran(\Illuminate\Http\Request $request)
    {
        $query = PopulationStatistic::query();

        // Logika untuk filter RT dan RW dari dropdown
        if ($request->filled('rt_rw')) {
            $parts = explode('-', $request->rt_rw);
            if (count($parts) == 2) {
                $query->where('rt', $parts[0])->where('rw', $parts[1]);
            }
        }

        // Kalkulasi total kelahiran berdasarkan filter
        $total_kelahiran = $query->sum('birth_count');

        // Mengambil daftar unik RT/RW untuk opsi dropdown filter
        $rtrw_list = PopulationStatistic::select('rt', 'rw')
            ->distinct()
            ->orderBy('rw')
            ->orderBy('rt')
            ->get();

        return view('kelahiran', compact('total_kelahiran', 'rtrw_list'));
    }

    public function kematian(\Illuminate\Http\Request $request)
    {
        $query = PopulationStatistic::query();

        // Logika untuk filter RT dan RW dari dropdown
        if ($request->filled('rt_rw')) {
            $parts = explode('-', $request->rt_rw);
            if (count($parts) == 2) {
                $query->where('rt', $parts[0])->where('rw', $parts[1]);
            }
        }

        // Kalkulasi total kematian berdasarkan filter
        $total_kematian = $query->sum('death_count');

        // Mengambil daftar unik RT/RW untuk opsi dropdown filter
        $rtrw_list = PopulationStatistic::select('rt', 'rw')
            ->distinct()
            ->orderBy('rw')
            ->orderBy('rt')
            ->get();

        return view('kematian', compact('total_kematian', 'rtrw_list'));
    }

    public function fasilitas(\Illuminate\Http\Request $request)
    {
        $query = PublicFacility::query();

        // Logika untuk filter pencarian berdasarkan nama fasilitas
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Mengambil data fasilitas (sesuai pencarian jika ada)
        $fasilitas = $query->get();
        
        return view('fasilitas', compact('fasilitas'));
    }
}