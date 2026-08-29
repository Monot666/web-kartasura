@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="text-white mb-4">Total Penduduk Kelurahan Kartasura</h3>

    <!-- Filter Pilihan RT/RW -->
    <div class="card card-modern p-3 mb-4">
        <form method="GET" action="{{ route('penduduk') }}" class="row g-3 align-items-center">
            <div class="col-auto">
                <label class="text-white fw-bold">Pilih Filter RT/RW:</label>
            </div>
            <div class="col-auto">
                <select name="rt_rw" class="form-select bg-dark text-white border-secondary">
                    <option value="">Semua Wilayah (Kelurahan)</option>
                    @foreach($rtrw_list as $item)
                        <option value="{{ $item->rt }}-{{ $item->rw }}" {{ request('rt_rw') == $item->rt.'-'.$item->rw ? 'selected' : '' }}>
                            RT {{ $item->rt }} / RW {{ $item->rw }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-sm px-4">Tampilkan</button>
            </div>
        </form>
    </div>

    <!-- Kotak Angka Total (Tanpa Data Diri/Privasi Aman) -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card card-modern p-4">
                <span class="text-muted small">TOTAL KESELURUHAN WARGA</span>
                <h2 class="text-white fw-bold mt-2">{{ number_format($total_penduduk) }} Jiwa</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-modern p-4">
                <span class="text-muted small">WARGA LAKI-LAKI</span>
                <h2 class="text-info fw-bold mt-2">{{ number_format($total_male) }} Jiwa</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-modern p-4">
                <span class="text-muted small">WARGA PEREMPUAN</span>
                <h2 class="text-warning fw-bold mt-2">{{ number_format($total_female) }} Jiwa</h2>
            </div>
        </div>
    </div>
</div>
@endsection