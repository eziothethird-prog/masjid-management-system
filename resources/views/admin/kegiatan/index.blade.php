@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<h1 class="text-2xl font-bold mb-6">Data Kegiatan</h1>

<div class="mb-4">
    <a href="{{ route('kegiatan.create') }}" 
       class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded inline-block font-semibold shadow">
        + Tambah Kegiatan
    </a>
</div>

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="bg-gray-100">
            <th class="p-3 text-left">Judul</th>
            <th class="p-3 text-left">Tanggal</th>
            <th class="p-3 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($data as $item)
        <tr class="border-t hover:bg-gray-50 transition">
            <td class="p-2">{{ $item->judul }}</td>
            <td class="p-2">{{ $item->tanggal_format }}</td>
            <td class="p-2 space-x-2">

    <!-- EDIT -->
    <a href="{{ route('kegiatan.edit', $item->id) }}" 
       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
        Edit
    </a>

    <!-- DELETE -->
    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')

        <button onclick="return confirm('Yakin mau hapus?')" 
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
            Hapus
        </button>
    </form>

</td>
        </tr>
    @empty
        <tr>
            <td colspan="2" class="p-4 text-center text-gray-500">
                Belum ada kegiatan.
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

@endsection