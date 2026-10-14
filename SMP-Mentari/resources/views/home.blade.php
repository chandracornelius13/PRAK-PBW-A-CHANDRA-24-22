@extends('layouts.app')

@section('title', 'Selamat Datang di SMP Mentari')

@section('content')
    <!-- ================= HERO SECTION ================= -->
    <div class="relative w-screen left-1/2 -translate-x-1/2 -mt-4 sm:-mt-8 bg-cover bg-center h-[400px] md:h-[500px] shadow-xl overflow-hidden mb-16" style="background-image: url('{{ asset('images/sekolah.jpg') }}');">
        <!-- Overlay Gelap -->
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        
        <!-- Konten Text Hero -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 tracking-tight drop-shadow-lg">
                Selamat Datang di SMP Mentari
            </h1>
            <p class="text-lg md:text-xl text-gray-200 max-w-2xl drop-shadow-md">
                Mewujudkan generasi berprestasi, berkarakter, dan siap menghadapi tantangan masa depan. Berikut adalah beberapa kegiatan yang telah kami laksanakan.
            </p>
        </div>
    </div>

    <!-- ================= KONTEN CARD KEGIATAN ================= -->
    <div class="container mx-auto px-4 max-w-7xl mb-16">
        
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Kegiatan Terbaru</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-4 rounded"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($kegiatan_terbaru as $kegiatan)
                <!-- Card Item -->
                <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col group border border-gray-100">
                    
                    <!-- Area Gambar / Header Card -->
                    <div class="h-48 bg-blue-50 overflow-hidden relative border-b border-gray-100">
                        <div class="w-full h-full flex flex-col items-center justify-center text-blue-300 group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20"></path>
                            </svg>
                        </div>
                        
                        <!-- Label Tanggal -->
                        <div class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-md">
                            {{ $kegiatan->created_at ? $kegiatan->created_at->format('d M Y') : 'Baru' }}
                        </div>
                    </div>
                    
                    <!-- Isi Text Card -->
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
                            {{ $kegiatan->judul }}
                        </h3>
                        
                        <p class="text-gray-600 mb-6 line-clamp-3 flex-1 text-sm leading-relaxed">
                            {{ $kegiatan->deskripsi }}
                        </p>
                        
                        <!-- Tombol Interaktif -->
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <a href="#" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors text-sm">
                                Baca Selengkapnya 
                                <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <!-- Tampilan Jika Belum Ada Kegiatan -->
                <div class="col-span-1 md:col-span-2 lg:col-span-3 flex justify-center py-12">
                    <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 px-6 py-5 rounded-xl shadow-sm text-center max-w-md w-full" role="alert">
                        <svg class="w-12 h-12 mx-auto mb-3 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <p class="font-bold text-lg mb-1">Belum Ada Kegiatan</p>
                        <p class="text-sm opacity-90">Belum ada kegiatan yang dipublikasikan. Silakan cek kembali nanti.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        @if($kegiatan_terbaru->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $kegiatan_terbaru->links() }}
            </div>
        @endif

    </div>
@endsection