@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="text-white mb-4">Statistik Jumlah Kelahiran</h3>
    <div class="card card-modern p-5 text-center" style="max-width: 500px;">
        <span class="text-muted mb-2">TOTAL AKUMULASI KELAHIRAN</span>
        <h1 class="display-4 text-success fw-bold">{{ number_format($total_kelahiran) }}</h1>
        <p class="text-muted small mt-2">Data dihitung dari pencatatan seluruh wilayah RT/RW di Kelurahan Kartasura.</p>
    </div>
</div>
@endsection