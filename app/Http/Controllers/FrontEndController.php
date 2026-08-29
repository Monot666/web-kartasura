<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use App\Models\PopulationStatistic;
use App\Models\PublicFacility;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function dashboard()
    {
        $profile = VillageProfile::first();
        return view('dashboard', compact('profile'));
    }

    public function penduduk(Request $request)
    {
        $rtrw_list = PopulationStatistic::select('rt', 'rw')->get();
        $query = PopulationStatistic::query();

        if ($request->has('rt_rw') && $request->rt_rw != '') {
            $parts = explode('-', $request->rt_rw);
            $query->where('rt', $parts[0])->where('rw', $parts[1]);
        }

        $total_male = $query->sum('male_count');
        $total_female = $query->sum('female_count');
        $total_penduduk = $total_male + $total_female;

        return view('penduduk', compact('total_penduduk', 'total_male', 'total_female', 'rtrw_list'));
    }

    public function kelahiran()
    {
        $total_kelahiran = PopulationStatistic::sum('birth_count');
        return view('kelahiran', compact('total_kelahiran'));
    }

    public function kematian()
    {
        $total_kematian = PopulationStatistic::sum('death_count');
        return view('kematian', compact('total_kematian'));
    }

    public function fasilitas()
    {
        $fasilitas = PublicFacility::all();
        return view('fasilitas', compact('fasilitas'));
    }
}