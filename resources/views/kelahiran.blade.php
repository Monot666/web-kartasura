@extends('layouts.app')

@section('content')
<div class="p-2 p-md-4">
    
    <div class="mb-4">
        <h2 class="text-white fw-bold mb-1">Jumlah Kelahiran</h2>
        <p class="text-secondary">Statistik angka kelahiran di Kelurahan Kartasura</p>
    </div>

    <!-- Bagian Filter RT/RW -->
    <div class="card bg-dark border-0 shadow-sm mb-5" style="border-radius: 12px; border: 1px solid rgba(255,255,255,0.1) !important;">
        <div class="card-body p-4">
            <form action="{{ route('kelahiran') }}" method="GET" class="d-flex align-items-center gap-3 flex-wrap">
                <label for="rt_rw" class="fw-bold text-light mb-0">Filter Wilayah:</label>
                <select name="rt_rw" id="rt_rw" class="form-select w-auto bg-dark text-white shadow-none" style="border-color: rgba(255,255,255,0.2);">
                    <option value="">Semua Wilayah (Kelurahan)</option>
                    @foreach($rtrw_list as $item)
                        <option value="{{ $item->rt }}-{{ $item->rw }}" {{ request('rt_rw') == $item->rt.'-'.$item->rw ? 'selected' : '' }}>
                            RT {{ str_pad($item->rt, 2, '0', STR_PAD_LEFT) }} / RW {{ str_pad($item->rw, 2, '0', STR_PAD_LEFT) }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary px-4">Terapkan Filter</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-4">
            <!-- Kartu Statistik -->
            <div class="card bg-dark border-0 shadow-sm h-100" style="border-radius: 16px; border: 1px solid rgba(255,255,255,0.05) !important;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <!-- Ikon Kelahiran (Warna Hijau/Success) -->
                        <div class="bg-success bg-opacity-25 p-3 rounded-3 text-success me-3 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </div>
                        <div>
                            <h6 class="text-secondary fw-bold mb-0" style="letter-spacing: 0.5px;">TOTAL KELAHIRAN</h6>
                        </div>
                    </div>
                    <h2 class="text-success fw-bold display-5 mb-0">{{ number_format($total_kelahiran, 0, ',', '.') }} <span class="fs-5 text-secondary fw-normal">Jiwa</span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <p class="text-muted small">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle me-1" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
              <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
            </svg>
            Data dihitung dari pencatatan seluruh wilayah RT/RW di Kelurahan Kartasura.
        </p>
    </div>

</div>
@endsection