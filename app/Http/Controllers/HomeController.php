<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Http;




class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('http://api.aladhan.com/v1/timingsByCity', [
            'city' => 'Makassar',
            'country' => 'Indonesia',
            'method' => 2
        ]);

        $data = $response->json();

        $jadwal = $data['data']['timings'];
        
        // 🔥 TAMBAHKAN INI
        $kegiatan = Kegiatan::latest()->take(3)->get();

        $map = [
                'Subuh' => 'Fajr',
                'Dzuhur' => 'Dhuhr',
                'Ashar' => 'Asr',
                'Maghrib' => 'Maghrib',
                'Isya' => 'Isha',
            ];

        return view('home', compact('jadwal', 'kegiatan', 'map'));

    }

    public function jadwal()
{
    $response = Http::get('http://api.aladhan.com/v1/timingsByCity', [
        'city' => 'Makassar',
        'country' => 'Indonesia',
        'method' => 2
    ]);

    $data = $response->json();
    $jadwal = $data['data']['timings'] ?? [];

    $map = [
        'Subuh' => 'Fajr',
        'Dzuhur' => 'Dhuhr',
        'Ashar' => 'Asr',
        'Maghrib' => 'Maghrib',
        'Isya' => 'Isha',
    ];

    return view('jadwal', compact('jadwal', 'map'));
}
}