@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <h2 class="mb-4">Profil Kelurahan Kartasura</h2>

        @if($profile)
            @if($profile->photo_path)
                <img src="{{ asset('storage/' . $profile->photo_path) }}" class="img-fluid rounded mb-4 shadow-sm" alt="Foto Kelurahan Kartasura" style="max-height: 450px; width: 100%; object-fit: cover;">
            @endif
            
            <h5 class="fw-bold text-primary">Apa itu Kartasura?</h5>
            <p style="text-align: justify; line-height: 1.8;">{{ $profile->description }}</p>

            <h5 class="fw-bold text-primary mt-4">Asal Usul Kartasura</h5>
            <p style="text-align: justify; line-height: 1.8;">{{ $profile->history }}</p>
        @else
            <div class="alert alert-warning">
                Data profil kelurahan belum diisi. Silakan minta Staff Kelurahan untuk login dan mengisi data pada panel Admin.
            </div>
        @endif
    </div>
</div>
@endsection