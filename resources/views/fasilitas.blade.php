@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="text-white mb-4">Fasilitas Umum Kelurahan Kartasura</h3>

    <div class="row g-4">
        @forelse($fasilitas as $item)
            <div class="col-md-3">
                <!-- Card Produk / Olshop Style -->
                <div class="card card-modern h-100 overflow-hidden">
                    @if($item->photo_path)
                        <img src="{{ asset('storage/' . $item->photo_path) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $item->name }}">
                    @else
                        <div class="bg-secondary text-center d-flex align-items-center justify-content-center text-white" style="height: 180px;">Tidak Ada Foto</div>
                    @endif
                    
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-white fs-6 fw-bold mb-2">{{ $item->name }}</h5>
                            <p class="card-text text-muted small" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item->description }}
                            </p>
                        </div>
                        
                        <!-- Tombol Interaktif memunculkan modal detail -->
                        <button type="button" class="btn btn-outline-light btn-sm w-15 mt-3" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                            Lihat Lokasi & Detail
                        </button>
                    </div>
                </div>

                <!-- Modal Pop-up untuk Detail dan Google Maps -->
                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark text-white border-secondary">
                            <div class="modal-header border-secondary">
                                <h5 class="modal-title">{{ $item->name }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-content-body p-3">
                                @if($item->photo_path)
                                    <img src="{{ asset('storage/' . $item->photo_path) }}" class="img-fluid rounded mb-3" style="max-height: 250px; width: 100%; object-fit: cover;" alt="">
                                @endif
                                <p class="text-muted small mb-3">{{ $item->description }}</p>
                                <div class="d-grid">
                                    <a href="{{ $item->google_maps_link }}" target="_blank" class="btn btn-primary btn-sm">
                                        <i class="bi bi-geo-alt-fill me-1"></i> Buka di Google Maps
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-dark text-muted">Belum ada data fasilitas umum yang ditambahkan oleh Staff Kelurahan.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection