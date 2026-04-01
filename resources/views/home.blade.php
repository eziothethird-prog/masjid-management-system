@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('content')

<!-- HERO -->
<div class="bg-green-800 text-white rounded-2xl p-10 mb-10 shadow-lg">
    <h1 class="text-4xl font-bold mb-4">
        Masjid Al-Ikhlas
    </h1>
    <p class="mb-6 text-lg">
        Pusat kegiatan ibadah, kajian, dan kebersamaan umat.
    </p>

    <a href="/donasi" class="bg-white text-green-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">
        Donasi Sekarang
    </a>
</div>

<!-- JADWAL SHOLAT -->
<div class="mb-10">
    <h2 class="text-2xl font-bold mb-4 text-green-800">Jadwal Sholat Hari Ini</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        @foreach ($map as $nama => $key)
            <div class="bg-white p-4 rounded-xl shadow text-center">
                <p class="font-semibold">{{ $nama }}</p>
                <p class="text-green-700 font-bold">
                    {{ $jadwal[$key] ?? '--:--' }}
                </p>
            </div>
        @endforeach
    </div>
</div>

<!-- KEGIATAN -->
<div>
    <h2 class="text-2xl font-bold mb-4 text-green-800">Kegiatan Terbaru</h2>
    @if (!empty($kegiatan) && $kegiatan->count())
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($kegiatan as $item)
                <div class="bg-white rounded-xl shadow p-4 group hover:shadow-xl hover:-translate-y-1 transition duration-300 cursor-pointer overflow-hidden">
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" 
                            loading="lazy"
                            class="h-40 w-full object-cover object-center rounded mb-3">
                    @else
                        <div class="h-40 bg-gray-200 rounded mb-3"></div>
                    @endif

                    <h3 class="font-semibold mb-1">
                        {{ $item->judul }}
                    </h3>

                    <p class="text-sm text-gray-600 mb-2">
                        {{ Str::limit($item->deskripsi, 50, '...') }}
                    </p>

                    <p class="text-xs text-green-700 font-semibold">
                        {{ $item->tanggal_format }}
                    </p>

                    <a href="{{ route('kegiatan.show', $item->id) }}" 
                        class="block bg-white rounded-xl shadow p-4 group hover:shadow-xl hover:-translate-y-1 transition duration-300 cursor-pointer overflow-hidden">
                        <span class="text-green-700 text-sm font-semibold mt-2 inline-block group-hover:underline group-hover:translate-x-1 transition">
                            Lihat Detail →
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Belum ada kegiatan.</p>
    @endif
</div>

@endsection