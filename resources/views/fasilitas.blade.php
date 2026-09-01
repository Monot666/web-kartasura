@extends('layouts.app')

@section('content')
<div class="container-fluid p-2 p-md-4">
    
    <div class="mb-4">
        <h2 class="text-white fw-bold mb-1">Fasilitas Umum</h2>
        <p class="text-secondary">Daftar fasilitas publik di Kelurahan Kartasura</p>
    </div>

    <!-- Bagian Filter Pencarian (Diubah menjadi Grid System agar tidak mendobrak sidebar) -->
    <div class="card bg-dark border-0 shadow-sm mb-5" style="border-radius: 12px; border: 1px solid rgba(255,255,255,0.1) !important;">
        <div class="card-body p-4">
            <form action="{{ route('fasilitas') }}" method="GET">
                <div class="row align-items-center g-3">
                    <div class="col-auto">
                        <label for="search" class="fw-bold text-light col-form-label">Cari Fasilitas:</label>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <input type="text" name="search" id="search" class="form-control bg-dark text-white shadow-none" style="border-color: rgba(255,255,255,0.2);" placeholder="Masukkan nama fasilitas..." value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary px-4">Cari</button>
                        @if(request('search'))
                            <a href="{{ route('fasilitas') }}" class="btn btn-outline-secondary px-3">Reset</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Grid Fasilitas -->
    <div class="row g-4">
        @forelse($fasilitas as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card bg-dark border-0 shadow-sm h-100 overflow-hidden" style="border-radius: 16px; border: 1px solid rgba(255,255,255,0.05) !important;">
                    @if($item->photo_path)
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->photo_path) }}" class="card-img-top" style="height: 200px; object-fit: cover; width: 100%;" alt="{{ $item->name }}">
                    @else
                        <div class="bg-secondary bg-opacity-10 text-center d-flex align-items-center justify-content-center text-secondary" style="height: 200px; width: 100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                              <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                              <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                            </svg>
                        </div>
                    @endif
                    
                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                            <!-- Memotong judul langsung dari PHP jika terlalu panjang -->
                            <h5 class="card-title text-white fw-bold mb-2">{{ \Illuminate\Support\Str::limit($item->name, 40) }}</h5>
                            
                            <!-- Memotong deskripsi langsung dari PHP ke 80 karakter -->
                            <p class="card-text text-secondary small mb-0">
                                {{ \Illuminate\Support\Str::limit($item->description, 80) }}
                            </p>
                        </div>
                        
                        <button type="button" class="btn btn-outline-light btn-sm w-100 mt-4" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}" style="border-color: rgba(255,255,255,0.2);">
                            Lihat Lokasi & Detail
                        </button>
                    </div>
                </div>

                <!-- Modal Pop-up (Menampilkan teks utuh tanpa dipotong) -->
                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark text-white shadow-lg" style="border-radius: 16px; border: 1px solid rgba(255,255,255,0.1) !important;">
                            <div class="modal-header border-0 pb-0">
                                <h5 class="modal-title fw-bold">{{ $item->name }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                @if($item->photo_path)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->photo_path) }}" class="img-fluid rounded-3 mb-4 shadow-sm" style="max-height: 250px; width: 100%; object-fit: cover;" alt="{{ $item->name }}">
                                @endif
                                <p class="text-secondary small mb-4" style="line-height: 1.6;">{{ $item->description }}</p>
                                <div class="d-grid">
                                    <a href="{{ $item->google_maps_link }}" target="_blank" class="btn btn-primary shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                                          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                        </svg>
                                        Buka di Google Maps
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert bg-dark border-0 text-secondary" style="border-radius: 12px; border: 1px solid rgba(255,255,255,0.05) !important;">
                    Tidak ada fasilitas yang ditemukan.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection