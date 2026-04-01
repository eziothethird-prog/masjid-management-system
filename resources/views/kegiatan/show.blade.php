@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow rounded p-6">

    @if ($item->gambar)
        <img src="{{ asset('storage/' . $item->gambar) }}" 
            loading="lazy"
            class="w-full h-64 object-cover rounded mb-4">
    @endif

    <h1 class="text-3xl font-bold mb-2">
        {{ $item->judul }}
    </h1>

    <p class="text-green-700 text-sm mb-4">
        {{ $item->tanggal_format }}
    </p>

    <p class="text-gray-700">
        {{ $item->deskripsi }}
    </p>

</div>

@endsection