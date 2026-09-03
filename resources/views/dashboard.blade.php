@extends('layouts.app')

@section('content')
<style>
    /* Mengunci layar HANYA di layar besar (Desktop/Laptop) */
    @media (min-width: 992px) {
        body {
            overflow: hidden; 
        }
    }

    /* Memaksa background memenuhi sisa layar */
    .hero-section {
        position: relative;
        background-image: url('{{ asset('images/bg-kartasura.jpg') }}');
        background-size: cover;
        background-position: center;
        /* Menggunakan min-height agar di HP bisa melar jika teksnya panjang */
        min-height: calc(100vh - 75px); 
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Efek gelap transparan agar teks mudah dibaca */
    .hero-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(90deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 40%, rgba(0,0,0,0.1) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 0 4rem;
    }

    .hero-title {
        font-family: 'Georgia', serif;
        font-size: 4rem;
        font-weight: 700;
        color: #00ff33;
        line-height: 1.1;
        margin-bottom: 1rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
        color: #ffffff;
        max-width: 650px;
        line-height: 1.6;
    }

    /* Penyesuaian jarak dan ukuran font khusus layar HP */
    @media (max-width: 768px) {
        .hero-title { font-size: 2.5rem; margin-top: 2rem; }
        .hero-content { padding: 0 1.5rem; padding-bottom: 3rem; }
        .hero-subtitle { font-size: 1rem; }
    }
</style>

<div class="hero-section">
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="hero-title">Selamat Datang di<br>Kartasura</h1>
                <p class="hero-subtitle mt-3">
                    Kartasura merupakan kelurahan bersejarah yang dulunya menjadi pusat pemerintahan Keraton Mataram Islam. Kini, Kartasura berkembang menjadi wilayah dinamis yang memadukan pelestarian peninggalan budaya luhur dengan kemajuan tata kelola administrasi masyarakat.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection