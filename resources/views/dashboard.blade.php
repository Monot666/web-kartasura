@extends('layouts.app')

@section('content')
<div class="p-2 p-md-4">
    
    <div class="mb-4">
        <h2 class="text-white fw-bold mb-1">Profil Kelurahan</h2>
        <p class="text-secondary">Informasi dan sejarah singkat Kelurahan Kartasura</p>
    </div>

    @if($profile)
        <div class="card bg-dark border-0 shadow-sm overflow-hidden mb-4" style="border-radius: 16px; border: 1px solid rgba(255,255,255,0.05) !important;">
            
            @if($profile->photo_path)
                <!-- Foto diletakkan di atas tanpa padding agar menyatu dengan border radius kartu -->
                <img src="{{ asset('storage/' . $profile->photo_path) }}" class="card-img-top border-bottom" alt="Foto Kelurahan Kartasura" style="max-height: 450px; width: 100%; object-fit: cover; border-color: rgba(255,255,255,0.05) !important;">
            @endif
            
            <div class="card-body p-4 p-md-5">
                
                <div class="mb-5">
                    <h5 class="fw-bold text-primary mb-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-square-fill me-3" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                        </svg>
                        Apa itu Kartasura?
                    </h5>
                    <p class="text-light" style="text-align: justify; line-height: 1.8; font-size: 1.05rem;">
                        {{ $profile->description }}
                    </p>
                </div>

                <div>
                    <h5 class="fw-bold text-primary mb-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history me-3" viewBox="0 0 16 16">
                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.9zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                        Asal Usul Kartasura
                    </h5>
                    <p class="text-light" style="text-align: justify; line-height: 1.8; font-size: 1.05rem;">
                        {{ $profile->history }}
                    </p>
                </div>

            </div>
        </div>
    @else
        <div class="alert bg-dark border-0 text-warning d-flex align-items-center" style="border-radius: 12px; border: 1px solid rgba(255,255,255,0.05) !important;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-3" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div>
                Data profil kelurahan belum diisi. Silakan minta Staff Kelurahan untuk login dan mengisi data pada panel Admin.
            </div>
        </div>
    @endif
</div>
@endsection