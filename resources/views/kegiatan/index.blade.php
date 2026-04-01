@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6 text-green-800">
    Semua Kegiatan Masjid
</h1>

<div class="grid md:grid-cols-3 gap-6">
    @forelse ($data as $item)
        <a href="{{ route('kegiatan.show', $item->id) }}" 
           class="block bg-white rounded-xl shadow p-4 hover:shadow-xl hover:-translate-y-1 transition duration-300">

            @if ($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}"
                    loading="lazy" 
                    class="h-40 w-full object-cover rounded mb-3">
            @endif

            <h3 class="font-semibold">{{ $item->judul }}</h3>

            <p class="text-sm text-gray-600">
                {{ \Illuminate\Support\Str::limit($item->deskripsi, 60) }}
            </p>

            <p class="text-xs text-green-700 mt-2">
                {{ $item->tanggal_format }}
            </p>
        </a>
    @empty
        <p class="text-gray-500">Belum ada kegiatan.</p>
    @endforelse
</div>

@endsection