@extends('layouts.app')

@section('content')
<div class="hero-section shadow">
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <!-- Bagian Teks Utama (Kiri) -->
        <div class="row">
            <div class="col-lg-8">
                <h1 class="hero-title">Selamat datang di<br>Kartasura</h1>
                <p class="hero-subtitle">
                    Kartasura merupakan kelurahan bersejarah yang dulunya menjadi pusat pemerintahan Keraton Mataram Islam. Kini, Kartasura berkembang menjadi wilayah dinamis yang memadukan pelestarian peninggalan budaya luhur dengan kemajuan tata kelola administrasi masyarakat.
                </p>
            </div>
        </div>

        <!-- Bagian 3 Kolom Fitur -->
        <div class="hero-features d-flex justify-content-between">
            
            <div class="feature-item flex-fill">
                <div class="d-flex gap-3 align-items-start">
                    <i class="bi bi-file-earmark-text feature-icon"></i>
                    <div>
                        <div class="feature-title">Pelayanan Terpadu</div>
                        <div class="feature-desc">Mendukung pengelolaan data administrasi kependudukan yang cepat, akurat, dan transparan.</div>
                    </div>
                </div>
            </div>

            <div class="feature-item flex-fill">
                <div class="d-flex gap-3 align-items-start">
                    <i class="bi bi-bank feature-icon"></i>
                    <div>
                        <div class="feature-title">Pusat Sejarah</div>
                        <div class="feature-desc">Memiliki ragam peninggalan situs bersejarah penting seperti peninggalan Keraton Kartasura.</div>
                    </div>
                </div>
            </div>

            <div class="feature-item flex-fill">
                <div class="d-flex gap-3 align-items-start">
                    <i class="bi bi-people feature-icon"></i>
                    <div>
                        <div class="feature-title">Potensi Warga</div>
                        <div class="feature-desc">Menjadi pusat pergerakan aktivitas masyarakat dan UMKM yang menopang ekonomi wilayah sekitar.</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection