<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Ucok - Selamat Ulang Tahun!</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-900 via-purple-800 to-pink-700 min-h-screen text-white flex flex-col justify-between font-sans antialiased">

    <!-- Header Teks Berjalan / Banner -->
    <header class="bg-black/30 backdrop-blur-md border-b border-white/10 py-4 shadow-lg">
        <marquee behavior="scroll" direction="left" class="text-2xl md:text-4xl font-extrabold tracking-wider text-yellow-300 drop-shadow-md">
            🎉 🎂 SELAMAT ULANG TAHUN UCOK! SEMOGA PANJANG UMUR & SEHAT SELALU! 🥳 🎈
        </marquee>
    </header>

    <!-- Konten Utama -->
    <main class="container mx-auto px-6 py-12 max-w-3xl text-center flex-grow flex flex-col items-center justify-center">
        
        <!-- Kartu Ucapan -->
        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-8 md:p-12 shadow-2xl hover:shadow-pink-500/20 transition duration-500">
            
            <!-- Avatar / Icon Hiasan -->
            <div class="w-24 h-24 mx-auto mb-6 rounded-full shadow-lg animate-bounce overflow-hidden border-4 border-yellow-400">
    <img src="{{ asset('images/ucok.jpeg') }}" alt="Foto Ucok" class="w-full h-full object-cover">
</div>

            <h1 class="text-3xl md:text-5xl font-black mb-6 bg-gradient-to-r from-yellow-300 via-pink-300 to-white bg-clip-text text-transparent">
                HBD UCOK!
            </h1>

            <!-- Pesan Ucapan Ulang Tahun -->
            <p class="text-base md:text-lg text-gray-200 leading-relaxed mb-8">
                Selamat ulang tahun untuk Ucok! Semoga di usia yang baru ini selalu diberkahi dengan kesehatan, kebahagiaan, kemudahan dalam setiap urusan, dan kesuksesan yang melimpah. Terima kasih sudah menjadi sosok teman yang luar biasa! Tetap semangat dan jadilah yang terbaik! 🚀✨
            </p>

            <!-- Tombol Kontak Ucok -->
            <div>
                <a href="/kontak-ucok">
                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 overflow-hidden text-sm font-medium rounded-full group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white text-white focus:ring-4 focus:outline-none focus:ring-pink-300 shadow-lg shadow-pink-500/50 transform hover:-translate-y-1 transition duration-300">
                        <span class="relative px-8 py-3.5 transition-all ease-in duration-75 bg-gray-900/40 rounded-full group-hover:bg-opacity-0 font-bold text-base tracking-wide flex items-center gap-2">
                            📱 Kontak Ucok
                        </span>
                    </button>
                </a>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer class="text-center py-6 text-sm text-gray-300/60">
        <p>Dibuat khusus untuk perayaan hari ulang tahun Ucok 🎉</p>
    </footer>

</body>
</html>