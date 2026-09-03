<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Kartasura</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Memanggil CSS Terpisah -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar Full Width Hitam -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid px-3 px-md-4">
            
            <!-- Logo & Judul -->
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/SIPEKA.png') }}" alt="Logo SIPEKA" style="height: 40px; width: 40px; object-fit: cover;">
            </a>

            <!-- Tombol Menu HP -->
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <i class="bi bi-list text-white fs-1"></i>
            </button>

            <!-- Daftar Menu Utama -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center text-lg-start gap-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('penduduk') ? 'active' : '' }}" href="{{ route('penduduk') }}">Total Penduduk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kelahiran') ? 'active' : '' }}" href="{{ route('kelahiran') }}">Kelahiran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kematian') ? 'active' : '' }}" href="{{ route('kematian') }}">Kematian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('fasilitas') ? 'active' : '' }}" href="{{ route('fasilitas') }}">Fasilitas Umum</a>
                    </li>
                </ul>
                
                <!-- Tombol Login Kanan (Sesuai Foto) -->
                <div class="d-flex justify-content-center mt-3 mt-lg-0">
                    <a href="{{ url('/admin') }}" target="_blank" class="btn btn-login-staff d-flex align-items-center gap-2">
                        Login Staff <i class="bi bi-person-circle"></i>
                    </a>
                </div>
            </div>
            
        </div>
    </nav>

    <!-- Area Konten Utama (Tanpa Padding agar gambar full) -->
    <main class="w-100">
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>