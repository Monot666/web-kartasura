<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan Kartasura</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons untuk ikon menu -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Memanggil CSS Terpisah dari folder public -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="d-flex align-items-start">
        
        <!-- Sidebar Modern (Dibuat Sticky dan Tinggi 100vh) -->
        <div class="sidebar p-3 d-flex flex-column justify-content-between sticky-top vh-100" style="overflow-y: auto; overflow-x: hidden;">
            <div>
                <!-- Brand / Logo -->
                <div class="d-flex align-items-center justify-content-between mb-4 px-2 pt-2">
                    <span class="sidebar-brand d-flex align-items-center gap-2">
                        <i class="bi bi-building-fill text-indigo"></i> Kel. Kartasura
                    </span>
                </div>

                <!-- Menu Utama -->
                <div class="sidebar-menu">
                    <div class="sidebar-section-title">Menu Utama</div>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-door me-2"></i> Dashboard
                    </a>
                    <a href="{{ route('penduduk') }}" class="{{ request()->routeIs('penduduk') ? 'active' : '' }}">
                        <i class="bi bi-people me-2"></i> Total Penduduk
                    </a>
                    <a href="{{ route('kelahiran') }}" class="{{ request()->routeIs('kelahiran') ? 'active' : '' }}">
                        <i class="bi bi-emoji-smile me-2"></i> Jumlah Kelahiran
                    </a>
                    <a href="{{ route('kematian') }}" class="{{ request()->routeIs('kematian') ? 'active' : '' }}">
                        <i class="bi bi-heartbreak me-2"></i> Jumlah Kematian
                    </a>
                    <a href="{{ route('fasilitas') }}" class="{{ request()->routeIs('fasilitas') ? 'active' : '' }}">
                        <i class="bi bi-shop me-2"></i> Fasilitas Umum
                    </a>
                </div>
            </div>

            <!-- Bagian Bawah Sidebar (Info Akses Staff) -->
            <div class="mt-4">
                <div class="p-3 rounded-3 mb-3" style="background-color: #181b22; border: 1px solid #1f242d;">
                    <div class="text-white fw-bold small mb-1"><i class="bi bi-shield-lock text-warning me-1"></i> Area Staff</div>
                    <p class="text-muted" style="font-size: 0.8rem;">Kelola data desa melalui Panel Admin khusus staff.</p>
                    <a href="{{ url('/admin') }}" target="_blank" class="btn btn-sm btn-outline-light w-100 py-1" style="font-size: 0.8rem;">Login Staff</a>
                </div>
                <div class="text-muted px-2" style="font-size: 0.75rem;">
                    Sistem Informasi Kelurahan
                </div>
            </div>
        </div>

        <!-- Area Konten Utama -->
        <div class="flex-grow-1 p-4 w-100" style="background-color: #0d0f12; min-height: 100vh;">
            @yield('content')
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>