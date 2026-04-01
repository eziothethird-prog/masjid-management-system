<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
{
    $data = Kegiatan::latest()->get();
    return view('admin.kegiatan.index', compact('data'));
}

public function create()
{
    return view('admin.kegiatan.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|max:255',
        'deskripsi' => 'required',
        'tanggal' => 'nullable|date',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $path = $file->store('kegiatan', 'public');

        $validated['gambar'] = $path;
    }

    Kegiatan::create($validated);

    return redirect('/admin/kegiatan')->with('success', 'Kegiatan berhasil ditambahkan');
}

public function edit($id)
{
    $item = Kegiatan::findOrFail($id);
    return view('admin.kegiatan.edit', compact('item'));
}

public function update(Request $request, $id)
{
    $item = Kegiatan::findOrFail($id);

    $validated = $request->validate([
        'judul' => 'required|max:255',
        'deskripsi' => 'required',
        'tanggal' => 'nullable|date',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $path = $file->store('kegiatan', 'public');

        $validated['gambar'] = $path;
    }

    $item->update($validated);

    return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diupdate');
}

public function destroy($id)
{
    $item = Kegiatan::findOrFail($id);

    $item->delete();

    return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
}

public function show($id)
{
    $item = Kegiatan::findOrFail($id);
    return view('kegiatan.show', compact('item'));
}

public function publicIndex()
{
    $data = Kegiatan::latest()->get();
    return view('kegiatan.index', compact('data'));
}

public function galeri()
{
    $data = Kegiatan::whereNotNull('gambar')->latest()->get();
    return view('galeri', compact('data'));
}

}
