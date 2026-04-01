@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold text-green-800 mb-6 text-center">
    Jadwal Sholat Hari Ini
</h1>
<p class="text-gray-500 text-center mb-6">
    Berdasarkan wilayah Makassar
</p>

<div class="grid grid-cols-2 md:grid-cols-5 gap-4 max-w-4xl mx-auto">

    @foreach ($map as $nama => $key)
        <div class="bg-white p-6 rounded-xl shadow text-center hover:shadow-lg transition">
            <p class="font-semibold text-lg">{{ $nama }}</p>
            <p class="text-green-700 font-bold text-xl mt-2">
                {{ $jadwal[$key] ?? '--:--' }}
            </p>
        </div>
    @endforeach

</div>

@endsection