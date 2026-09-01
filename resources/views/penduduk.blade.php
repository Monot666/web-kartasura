@extends('layouts.app')

@section('content')
<div class="container-fluid p-2 p-md-4">
    
    <div class="mb-4">
        <h2 class="text-white fw-bold mb-1">Total Penduduk</h2>
        <p class="text-secondary">Statistik kependudukan Kelurahan Kartasura</p>
    </div>

    <!-- Bagian Filter RT/RW -->
    <div class="card bg-dark border-0 shadow-sm mb-4" style="border-radius: 12px; border: 1px solid rgba(255,255,255,0.1) !important;">
        <div class="card-body p-4">
            <form action="{{ route('penduduk') }}" method="GET" class="d-flex align-items-center gap-3 flex-wrap">
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

    <!-- MUNCUL DI ATAS STATISTIK JIKA FILTER RT/RW DIPILIH -->
    @if(request()->filled('rt_rw') && $selected_wilayah)
        <div class="row g-4 mb-4">
            <!-- Profil RT -->
            <div class="col-md-6">
                <div class="card bg-dark border-0 shadow-sm d-flex flex-row align-items-center p-3 h-100" style="border-radius: 12px; border: 1px solid rgba(255,255,255,0.05) !important;">
                    @if($selected_wilayah->rt_photo_path)
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($selected_wilayah->rt_photo_path) }}" class="rounded-3 me-4 shadow-sm" style="width: 90px; height: 90px; object-fit: cover;" alt="Foto RT">
                    @else
                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-3 d-flex align-items-center justify-content-center me-4" style="width: 90px; height: 90px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </div>
                    @endif
                    <div>
                        <h6 class="text-secondary mb-1">Ketua RT {{ str_pad($selected_wilayah->rt, 2, '0', STR_PAD_LEFT) }}</h6>
                        <h5 class="text-white fw-bold mb-0">{{ $selected_wilayah->rt_name ?: 'Belum ada data' }}</h5>
                    </div>
                </div>
            </div>
            
            <!-- Profil RW -->
            <div class="col-md-6">
                <div class="card bg-dark border-0 shadow-sm d-flex flex-row align-items-center p-3 h-100" style="border-radius: 12px; border: 1px solid rgba(255,255,255,0.05) !important;">
                    @if($selected_wilayah->rw_photo_path)
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($selected_wilayah->rw_photo_path) }}" class="rounded-3 me-4 shadow-sm" style="width: 90px; height: 90px; object-fit: cover;" alt="Foto RW">
                    @else
                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-3 d-flex align-items-center justify-content-center me-4" style="width: 90px; height: 90px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </div>
                    @endif
                    <div>
                        <h6 class="text-secondary mb-1">Ketua RW {{ str_pad($selected_wilayah->rw, 2, '0', STR_PAD_LEFT) }}</h6>
                        <h5 class="text-white fw-bold mb-0">{{ $selected_wilayah->rw_name ?: 'Belum ada data' }}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Bagian Kartu Statistik Utama -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card bg-dark border-0 shadow-sm h-100" style="border-radius: 16px; border: 1px solid rgba(255,255,255,0.05) !important;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary bg-opacity-25 p-3 rounded-3 text-primary me-3 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/></svg>
                        </div>
                        <h6 class="text-secondary fw-bold mb-0" style="letter-spacing: 0.5px;">TOTAL WARGA</h6>
                    </div>
                    <h2 class="text-white fw-bold display-5 mb-0">{{ number_format($total_penduduk, 0, ',', '.') }} <span class="fs-5 text-secondary fw-normal">Jiwa</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-dark border-0 shadow-sm h-100" style="border-radius: 16px; border: 1px solid rgba(255,255,255,0.05) !important;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-info bg-opacity-25 p-3 rounded-3 text-info me-3 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8"/></svg>
                        </div>
                        <h6 class="text-secondary fw-bold mb-0" style="letter-spacing: 0.5px;">LAKI-LAKI</h6>
                    </div>
                    <h2 class="text-info fw-bold display-5 mb-0">{{ number_format($total_male, 0, ',', '.') }} <span class="fs-5 text-secondary fw-normal">Jiwa</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-dark border-0 shadow-sm h-100" style="border-radius: 16px; border: 1px solid rgba(255,255,255,0.05) !important;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-warning bg-opacity-25 p-3 rounded-3 text-warning me-3 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8M3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2v-2.025A5 5 0 0 1 3 5"/></svg>
                        </div>
                        <h6 class="text-secondary fw-bold mb-0" style="letter-spacing: 0.5px;">PEREMPUAN</h6>
                    </div>
                    <h2 class="text-warning fw-bold display-5 mb-0">{{ number_format($total_female, 0, ',', '.') }} <span class="fs-5 text-secondary fw-normal">Jiwa</span></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- MUNCUL DI BAWAH STATISTIK JIKA FILTER TIDAK AKTIF (SEMUA WILAYAH) -->
    @if(!request()->filled('rt_rw') && $all_wilayah->count() > 0)
        <div class="mt-5">
            <h4 class="text-white fw-bold mb-4 border-bottom pb-3" style="border-color: rgba(255,255,255,0.1) !important;">Daftar Pengurus RT & RW</h4>
            
            <div class="row g-4">
                @foreach($all_wilayah as $wilayah)
                    <div class="col-md-6 col-lg-4">
                        <div class="card bg-dark border-0 shadow-sm overflow-hidden h-100" style="border-radius: 16px; border: 1px solid rgba(255,255,255,0.05) !important;">
                            <div class="card-header bg-dark border-bottom-0 pt-4 pb-2 text-center">
                                <h5 class="fw-bold text-primary mb-0">Wilayah RT {{ str_pad($wilayah->rt, 2, '0', STR_PAD_LEFT) }} / RW {{ str_pad($wilayah->rw, 2, '0', STR_PAD_LEFT) }}</h5>
                            </div>
                            <div class="card-body p-4 pt-2">
                                
                                <!-- Baris RT -->
                                <div class="d-flex align-items-center mb-4 p-3 rounded-3" style="background-color: rgba(255,255,255,0.02);">
                                    @if($wilayah->rt_photo_path)
                                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($wilayah->rt_photo_path) }}" class="rounded-circle me-3 shadow-sm" style="width: 55px; height: 55px; object-fit: cover;" alt="RT">
                                    @else
                                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>
                                        </div>
                                    @endif
                                    <div>
                                        <small class="text-secondary fw-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">KETUA RT</small>
                                        <span class="text-white fw-semibold">{{ $wilayah->rt_name ?: 'Belum diisi' }}</span>
                                    </div>
                                </div>
                                
                                <!-- Baris RW -->
                                <div class="d-flex align-items-center p-3 rounded-3" style="background-color: rgba(255,255,255,0.02);">
                                    @if($wilayah->rw_photo_path)
                                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($wilayah->rw_photo_path) }}" class="rounded-circle me-3 shadow-sm" style="width: 55px; height: 55px; object-fit: cover;" alt="RW">
                                    @else
                                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 55px; height: 55px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>
                                        </div>
                                    @endif
                                    <div>
                                        <small class="text-secondary fw-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">KETUA RW</small>
                                        <span class="text-white fw-semibold">{{ $wilayah->rw_name ?: 'Belum diisi' }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>
@endsection