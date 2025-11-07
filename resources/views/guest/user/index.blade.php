@extends('layouts.guest.app')

@section('content')
    <!-- KONTEN UTAMA -->
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3">

                <!-- 1. HEADER HALAMAN (PINK) -->
                <header class="appvilla-hero rounded-2xl mb-8 p-8 md:p-10 bg-pink-600/90 shadow-xl">
                    <div class="text-center relative z-10 text-white">
                        <!-- Menggunakan Font Awesome (simulasi) -->
                        <i class="fas fa-users-cog text-4xl mb-2 d-inline-block"></i>
                        <h1 class="text-3xl md:text-4xl font-extrabold mb-1 text-shadow-hero">
                            Manajemen Akun Pengguna
                        </h1>
                        <h2 class="text-md font-light">
                            Kelola semua akun pengguna sistem Posyandu di sini.
                        </h2>

                        <!-- Catatan: 'text-shadow-hero' adalah kelas kustom yang mungkin didefinisikan di CSS utama Anda -->
                    </div>
                </header>

                <!-- 2. BAGIAN NOTIFIKASI & TOMBOL AKSI -->
                <div class="mb-6 flex justify-between items-center">

                    @if (session('success'))
                        <!-- Notifikasi sukses tetap hijau agar kontras dan standar UI -->
                        <div class="relative px-4 py-3 text-sm flex-grow mr-4 text-green-800 bg-green-100 border border-green-400 rounded-lg shadow-md"
                            role="alert">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="block sm:inline font-semibold">{{ session('success') }}</span>
                        </div>
                    @else
                        <!-- Spacer jika tidak ada notifikasi -->
                        <div></div>
                    @endif

                    <!-- Tombol Tambah User (Aksen Pink/Merah Jambu) -->
                    <a href="{{ route('user.create') }}"
                        class="appvilla-btn bg-pink-600 text-white font-semibold py-2.5 px-5 rounded-full shadow-lg hover:bg-pink-700 hover:shadow-xl transition duration-300 transform hover:scale-105 flex items-center whitespace-nowrap">
                        <i class="fa fa-plus-circle mr-2"></i> Tambah User Baru
                    </a>
                </div>

                <!-- 3. CARD UTAMA UNTUK TABEL -->
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-2xl rounded-2xl border-t-4 border-pink-500 bg-clip-border">
                    <div class="flex-auto p-6">
                        <div class="overflow-x-auto rounded-xl">
                            <table class="w-full min-w-full table-auto border-collapse">
                                <!-- Table Head (PINK) -->
                                <thead class="bg-pink-500 text-white shadow-md">
                                    <tr>
                                        <th
                                            class="py-3 px-4 text-sm font-bold text-left uppercase rounded-tl-xl border-b-2 border-pink-400">
                                            No</th>
                                        <th
                                            class="py-3 px-4 text-sm font-bold text-left uppercase border-b-2 border-pink-400">
                                            Nama</th>
                                        <th
                                            class="py-3 px-4 text-sm font-bold text-left uppercase border-b-2 border-pink-400">
                                            Email</th>
                                        <th
                                            class="py-3 px-4 text-sm font-bold text-center uppercase rounded-tr-xl border-b-2 border-pink-400">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr
                                            class="border-b border-gray-200 hover:bg-pink-50/50 transition-colors duration-200 ease-in-out">
                                            <td class="py-3 px-4 text-sm text-gray-700 font-medium">
                                                {{ $index + 1 }}</td>
                                            <td class="py-3 px-4 text-sm text-gray-900 font-semibold">
                                                {{ $user->name }}</td>
                                            <td class="py-3 px-4 text-sm text-gray-600">
                                                {{ $user->email }}</td>

                                            <!-- Kolom Aksi -->
                                            <td class="py-3 px-4 text-center text-sm">
                                                <div class="flex justify-center items-center space-x-3">


                                                    <!-- Tombol Edit (Diubah dari Biru ke Fuchsia) -->
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-white bg-fuchsia-500 rounded-full shadow-md hover:bg-fuchsia-600 transition duration-150 ease-in-out transform hover:scale-105">
                                                        <i class="fa fa-edit mr-1"></i> Edit
                                                    </a>


                                                    <!-- Tombol Hapus (Tetap Merah untuk aksi destruktif) -->
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                        class="inline-block"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus user: {{ $user->name }}? Aksi ini tidak dapat dibatalkan.')">
                                                        @csrf

                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 text-xs font-semibold text-white bg-red-600 rounded-full shadow-md hover:bg-red-700 transition duration-150 ease-in-out transform hover:scale-105">
                                                            <i class="fas fa-trash-alt mr-1"></i> Hapus

                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if ($users->isEmpty())
                                        <tr>
                                            <td colspan="4"
                                                class="py-8 text-center text-base font-medium text-gray-500 bg-pink-50 rounded-b-xl">
                                                <i class="fas fa-box-open mr-2"></i> Data user belum tersedia. Silahkan
                                                tambahkan user baru.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- AKHIR KONTEN UTAMA -->
@endsection
