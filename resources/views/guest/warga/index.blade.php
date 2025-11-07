@extends('layouts.guest.app')

@section('content')
    {{-- Container Utama: Background Abu-abu Muda dan Padding Top 24 --}}
    <div class="w-full bg-gray-50 min-h-screen px-6 py-6 mx-auto pt-24">

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-white bg-pink-600 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-xl rounded-2xl bg-clip-border">

                    {{-- HEADER --}}
                    <!-- 1. HEADER HALAMAN (PINK) -->
                    <header class="appvilla-hero rounded-2xl mb-8 p-8 md:p-10 bg-pink-600/90 shadow-xl">
                        <div class="text-center relative z-10 text-white">
                            <!-- Menggunakan Font Awesome (simulasi) -->
                            <i class="fas fa-users-cog text-4xl mb-2 d-inline-block"></i>
                            <h1 class="text-3xl md:text-4xl font-extrabold mb-1 text-shadow-hero">
                                Manajemen Akun Warga
                            </h1>
                            <h2 class="text-md font-light">
                                Kelola semua akun warga sistem Posyandu di sini.
                            </h2>

                            <!-- Catatan: 'text-shadow-hero' adalah kelas kustom yang mungkin didefinisikan di CSS utama Anda -->
                        </div>
                    </header>
                    {{-- Tombol Tambah Warga (Diubah ke Pink) --}}
                    <a href="{{ route('warga.create') }}"
                        class="px-4 py-2 text-xs font-bold text-white uppercase bg-pink-600 rounded-lg shadow-md hover:bg-pink-700 hover:-translate-y-px transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-4 h-4 mr-1 inline-block align-middle">
                            <path
                                d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                        </svg>
                        Tambah Warga
                    </a>
                </div>

                {{-- GRID CARD --}}
                <div class="flex-auto p-6">
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                        @forelse ($wargas as $warga)
                            <div
                                class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 ease-in-out border border-gray-100 hover:-translate-y-1">
                                <div class="p-6">
                                    {{-- Avatar + Info Utama --}}
                                    <div class="flex items-center mb-4 space-x-4">
                                        {{-- Avatar Background (Pink Gradient) --}}
                                        <div
                                            class="h-14 w-14 rounded-full bg-gradient-to-br from-pink-500 to-pink-700 flex items-center justify-center text-white text-lg font-bold shadow-md">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-base font-semibold text-slate-800">{{ $warga->nama }}</h4>
                                            <p class="text-xs text-gray-500">NIK: {{ $warga->nik }}</p>
                                        </div>
                                    </div>

                                    {{-- Detail Kecil seperti Tag --}}
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        {{-- Jenis Kelamin Tag (Light Pink) --}}
                                        <span
                                            class="px-2 py-0.5 text-xs font-medium rounded-full bg-pink-100 text-pink-800">
                                            {{ $warga->jenis_kelamin }}
                                        </span>

                                        @if ($warga->no_hp)
                                            {{-- No HP Tag (Fuchsia/Magenta) --}}
                                            <span
                                                class="px-2 py-0.5 text-xs font-medium rounded-full bg-fuchsia-100 text-fuchsia-800">
                                                <i class="fa fa-phone mr-1"></i> {{ $warga->no_hp }}
                                            </span>
                                        @endif

                                        {{-- Alamat Tag (Rose/Warm Pink) --}}
                                        <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-rose-100 text-rose-800"
                                            title="{{ $warga->alamat }}">
                                            <i class="fa fa-map-marker mr-1"></i>
                                            {{ Str::limit($warga->alamat, 25, '...') }}
                                        </span>
                                    </div>

                                    {{-- Tombol Aksi --}}
                                    <div class="flex justify-between pt-3 border-t border-gray-100">
                                        {{-- Tombol Edit (Diubah ke Pink) --}}
                                        <a href="{{ route('warga.edit', $warga->id) }}"
                                            class="text-xs font-semibold text-pink-600 hover:text-pink-800 transition-colors">
                                            <i class="fa fa-edit mr-1"></i> Edit
                                        </a>
                                        <form action="{{ route('warga.destroy', $warga->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data warga {{ $warga->nama }}?')">
                                            @csrf
                                            @method('DELETE')
                                            {{-- Tombol Hapus (Merah) --}}
                                            <button type="submit"
                                                class="text-xs font-semibold text-red-600 hover:text-red-800 transition-colors">
                                                <i class="fa fa-trash mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="w-full text-center py-10 sm:col-span-2 lg:col-span-3">
                                <p class="text-base text-slate-500">Belum ada data Warga yang tercatat.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
@endsection
