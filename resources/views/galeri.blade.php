@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-green-800 mb-6">
    Galeri Kegiatan Masjid
</h1>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

    @forelse ($data as $item)
        <div class="group relative overflow-hidden rounded-lg shadow">

            <img src="{{ asset('storage/' . $item->gambar) }}" 
                loading="lazy"
                class="w-full h-40 object-cover group-hover:scale-110 transition duration-300">

            <!-- overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                <p class="text-white text-sm font-semibold text-center px-2">
                    {{ $item->judul }}
                </p>
            </div>

        </div>
    @empty
        <p class="text-gray-500 col-span-full text-center">
            Belum ada galeri.
        </p>
    @endforelse

</div>

@endsection