<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Al-Ikhlas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-green-800 text-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="font-bold text-lg">Masjid Al-Ikhlas</h1>

            <div class="space-x-4">
                <a href="/" class="hover:underline">Home</a>
                <a href="/tentang" class="hover:underline">Tentang</a>
                <a href="{{ route('jadwal') }}" class="hover:underline">Jadwal</a>
                <a href="{{ route('kegiatan.public') }}" class="hover:underline">Kegiatan</a>
                <a href="{{ route('galeri') }}" class="hover:underline">Galeri</a>
                <a href="/donasi" class="hover:underline">Donasi</a>
                <a href="/kontak" class="hover:underline">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>
    <!-- Footer -->
     <footer class="bg-green-800 text-white text-center p-4 mt-10">
        © {{ date('Y') }} Masjid Al-Ikhlas
    </footer>
</body>
</html>