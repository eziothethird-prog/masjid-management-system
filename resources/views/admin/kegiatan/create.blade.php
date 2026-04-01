@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Tambah Kegiatan</h1>

<form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block mb-1">Judul</label>
        <input type="text" name="judul" value="{{ old('judul') }}" class="w-full border rounded p-2" required>
        @error('judul')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-1">Deskripsi</label>
        <textarea name="deskripsi" class="w-full border rounded p-2" required>{{ old('deskripsi') }}</textarea>
@error('deskripsi')
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror
    </div>

    <div>
        <label class="block mb-1">Tanggal</label>
        <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="w-full border rounded p-2">
@error('tanggal')
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror
    </div>

    <div>
        <label class="block mb-1">Gambar</label>
        <input type="file" name="gambar" class="w-full border rounded p-2">
@error('gambar')
    <p class="text-red-500 text-sm">{{ $message }}</p>
@enderror
    </div> 

    <button class="bg-green-700 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>

@endsection