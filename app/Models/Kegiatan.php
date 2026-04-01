<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'tanggal'];

    public function getTanggalFormatAttribute()
{
    return $this->tanggal 
        ? Carbon::parse($this->tanggal)->translatedFormat('d M Y')
        : '-';
}
}
