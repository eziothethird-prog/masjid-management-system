@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Kegiatan</h1>

<form action="{{ route('kegiatan.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1">Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $item->judul) }}" class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-1">Deskripsi</label>
        <textarea name="deskripsi" class="w-full border rounded p-2">{{ old('deskripsi', $item->deskripsi) }}</textarea>
    </div>

    <div>
        <label class="block mb-1">Tanggal</label>
        <input type="date" name="tanggal" value="{{ old('tanggal', $item->tanggal) }}" class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block mb-1">Gambar</label>
        <input type="file" name="gambar" class="w-full border rounded p-2">
    </div>

    <button class="bg-green-700 text-white px-4 py-2 rounded">
        Update
    </button>
</form>

@endsection