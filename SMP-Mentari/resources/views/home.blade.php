@extends('layouts.app')

@section('title', 'Selamat Datang di SMP Mentari')

@section('content')
    <!-- ================= HERO SECTION ================= -->
    <div class="relative w-screen left-1/2 -translate-x-1/2 -mt-4 sm:-mt-8 bg-cover bg-center h-[380px] md:h-[460px] overflow-hidden mb-16" style="background-image: url('{{ asset('images/sekolah.jpg') }}');">
        <!-- Overlay netral -->
        <div class="absolute inset-0 bg-gray-900 bg-opacity-70"></div>

        <!-- Konten Hero -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
            <span class="text-xs md:text-sm font-medium uppercase tracking-[0.25em] text-gray-300 mb-4">
                SMP Mentari
            </span>
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-5 tracking-tight">
                Selamat Datang di SMP Mentari
            </h1>
            <p class="text-base md:text-lg text-gray-300 max-w-2xl leading-relaxed">
                Mewujudkan generasi berprestasi, berkarakter, dan siap menghadapi tantangan masa depan. Berikut beberapa kegiatan yang telah kami laksanakan.
            </p>
        </div>
    </div>

    <!-- ================= KEGIATAN TERBARU ================= -->
    <div class="container mx-auto px-4 max-w-7xl mb-16">

        <div class="mb-10 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Kegiatan Terbaru</h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">Dokumentasi kegiatan terbaru dari sekolah kami.</p>
            <div class="w-12 h-0.5 bg-gray-900 mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @forelse ($kegiatan_terbaru as $kegiatan)
                <!-- Card -->
                <article class="group bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition duration-300 overflow-hidden flex flex-col">

                    <!-- Header card -->
                    <div class="h-44 bg-gray-100 flex items-center justify-center border-b border-gray-200">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20"></path>
                        </svg>
                    </div>

                    <!-- Isi card -->
                    <div class="p-6 flex flex-col flex-1">
                        <time class="text-xs font-medium uppercase tracking-wider text-gray-500 mb-2">
                            {{ $kegiatan->created_at ? $kegiatan->created_at->format('d M Y') : 'Baru' }}
                        </time>

                        <h3 class="text-lg font-semibold text-gray-900 mb-3 line-clamp-2">
                            {{ $kegiatan->judul }}
                        </h3>

                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 flex-1">
                            {{ $kegiatan->deskripsi }}
                        </p>

                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-gray-600 transition-colors">
                                Baca selengkapnya
                                <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

            @empty
                <!-- Kosong -->
                <div class="col-span-1 md:col-span-2 lg:col-span-3 flex justify-center py-12">
                    <div class="bg-gray-50 border border-gray-200 text-gray-600 px-6 py-8 rounded-xl text-center max-w-md w-full" role="alert">
                        <svg class="w-10 h-10 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <p class="font-semibold text-gray-900 mb-1">Belum Ada Kegiatan</p>
                        <p class="text-sm">Belum ada kegiatan yang dipublikasikan. Silakan cek kembali nanti.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($kegiatan_terbaru->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $kegiatan_terbaru->links() }}
            </div>
        @endif

    </div>
@endsection