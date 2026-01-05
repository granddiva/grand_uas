@extends('layouts.app')
<style>

.slideshow-container {
position: relative;
width: 100%;
height: 480;
overflow: hidden;
border-radius: 20px;
}

.slideshow-image {
position: absolute;
width: 100%;
height: 100%;
object-fit: cover;
animation: fadeSlide 15s infinite;
opacity: 0;
}

.slideshow-image:nth-child(1) { animation-delay: 0s; }
.slideshow-image:nth-child(2) { animation-delay: 5s; }
.slideshow-image:nth-child(3) { animation-delay: 10s; }

@keyframes fadeSlide {
0% { opacity: 0; }
10% { opacity: 1; }
30% { opacity: 1; }
40% { opacity: 0; }
100% { opacity: 0; }
}

/* Overlay gelap */
.slideshow-overlay {
position: absolute;
inset: 0;
background: rgba(0, 0, 0, 0.45);
z-index: 5;
border-radius: 20px;
}
</style>

@section('content')
    <header class="relative rounded-2xl mb-8">

        {{-- Slideshow --}}
        <div class="slideshow-container">
            <img src="{{ asset('assets/images/slideshow/posyandu1.jpg') }}" class="slideshow-image">
            <img src="{{ asset('assets/images/slideshow/posyandu2.jpg') }}" class="slideshow-image">
            <img src="{{ asset('assets/images/slideshow/sposyandu3.jpg') }}" class="slideshow-image">
            <div class="slideshow-overlay"></div>
        </div>

        {{-- Teks Hero --}}
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white z-10 p-10 md:p-12">
            <i class="fas fa-heartbeat text-4xl mb-2 d-inline-block animate-pulse-slow"></i>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-2 text-shadow-hero">
                POSYANDU DIGITAL
            </h1>
            <h2 class="text-md md:text-lg font-light mb-4">
                Pencatatan Layanan Balita Modern dan Real-Time.
            </h2>
            <a href="{{ route('layanan.create') }}"
                class="appvilla-btn rounded-full shadow-xl hover:scale-105 transform transition duration-300">
                <i class="fas fa-plus-circle mr-2"></i> Tambah Data Pengukuran Baru
            </a>
        </div>

    </header>

    <div id="dashboard-view">
        <main>
            <section id="widgets-section" class="mb-12">
                <h3 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2 border-pink-100">
                    <i class="fas fa-chart-line mr-2 text-pink-500"></i> Ringkasan Statistik Kesehatan
                </h3>
                <div id="widget-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="widget-card bg-white p-6 rounded-xl shadow-lg border-b-4 border-pink-400">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <div class="text-sm font-semibold uppercase mb-1 text-gray-400">Total Data</div>
                                <div class="text-4xl font-extrabold text-gray-800">{{ $total }}</div>
                            </div>
                            <div class="icon-circle bg-pink-100 text-pink-500"><i class="fas fa-notes-medical"></i></div>
                        </div>
                    </div>
                    <div class="widget-card bg-white p-6 rounded-xl shadow-lg border-b-4 border-blue-400">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <div class="text-sm font-semibold uppercase mb-1 text-gray-400">Rata-rata Berat (Kg)</div>
                                <div class="text-4xl font-extrabold text-gray-800">{{ number_format($rataBerat, 1) }}</div>
                            </div>
                            <div class="icon-circle bg-blue-100 text-blue-500"><i class="fas fa-weight"></i></div>
                        </div>
                    </div>
                    <div class="widget-card bg-white p-6 rounded-xl shadow-lg border-b-4 border-green-400">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <div class="text-sm font-semibold uppercase mb-1 text-gray-400">Rata-rata Tinggi (Cm)</div>
                                <div class="text-4xl font-extrabold text-gray-800">{{ number_format($rataTinggi, 1) }}</div>
                            </div>
                            <div class="icon-circle bg-green-100 text-green-500"><i class="fas fa-ruler-vertical"></i></div>
                        </div>
                    </div>
                    <div class="widget-card bg-white p-6 rounded-xl shadow-lg border-b-4 border-yellow-400">
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <div class="text-sm font-semibold uppercase mb-1 text-gray-400">Vitamin Diberikan</div>
                                <div class="text-4xl font-extrabold text-gray-800">{{ $totalVitamin }}</div>
                            </div>
                            <div class="icon-circle bg-yellow-100 text-yellow-500"><i class="fas fa-capsules"></i></div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="list-section" class="mb-12">
                <h3 id="list-title" class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2 border-pink-100">
                    <i class="fas fa-notes-medical mr-2 text-pink-500"></i> Catatan Layanan Terbaru
                    ({{ $layanans->count() }} Data)
                </h3>

                @if ($layanans->isEmpty())
                    <div id="empty-state" class="text-center bg-pink-100 text-pink-700 p-12 rounded-xl shadow-lg mt-8">
                        <i class="fas fa-box-open text-6xl mb-4"></i>
                        <h4 class="text-2xl font-bold">Oopss! Data Belum Ada</h4>
                        <p class="mt-2 text-lg">Belum ada data layanan Posyandu yang tercatat. Saatnya mencatat data
                            pertama Anda!</p>
                        <a href="{{ route('layanan.create') }}"
                            class="mt-5 px-6 py-3 bg-pink-600 text-white rounded-full shadow-lg hover:bg-pink-700 transition">
                            Tambah Data Pertama
                        </a>
                    </div>
                @else
                    <div id="layanan-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($layanans as $item)
                            <div
                                class="bg-white rounded-xl shadow-lg p-6 border-l-8 border-pink-400 hover:shadow-xl transition">
                                <h4 class="text-xl font-bold text-gray-800 mb-2">
                                    <i class="fas fa-child text-pink-500 mr-2"></i>{{ $item->warga_id }}
                                </h4>
                                <p class="text-gray-600 mb-1">
                                    <i class="fas fa-weight mr-1 text-gray-400"></i>
                                    Berat: <strong>{{ $item->berat }} Kg</strong>
                                </p>
                                <p class="text-gray-600 mb-1">
                                    <i class="fas fa-ruler-vertical mr-1 text-gray-400"></i>
                                    Tinggi: <strong>{{ $item->tinggi }} Cm</strong>
                                </p>
                                <p class="text-gray-600 mb-1">
                                    <i class="fas fa-capsules mr-1 text-gray-400"></i>
                                    Vitamin: <strong>{{ $item->vitamin }}</strong>
                                </p>
                                <p class="text-gray-600 mb-3">
                                    <i class="fas fa-comments mr-1 text-gray-400"></i>
                                    Konseling: {{ $item->konseling ?: '-' }}
                                </p>
                                <p class="text-xs text-gray-400 mb-4">
                                    Dicatat pada: {{ $item->created_at->format('d M Y, H:i') }}
                                </p>
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('layanan.edit', $item->id) }}"
                                        class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 text-sm transition">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('layanan.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600 text-sm transition">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        </main>
    </div>
@endsection
