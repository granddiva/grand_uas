@extends('layouts.app')

@section('content')
<div class="w-full px-6 py-6 mx-auto">

    <a href="{{ route('posyandu.index') }}" class="text-blue-600 hover:underline">&larr; Kembali</a>

    <div class="mt-4 bg-white p-6 rounded-xl shadow-lg">

        <h2 class="text-3xl font-bold text-pink-600 mb-2">
            Detail Posyandu
        </h2>

        <p class="text-gray-600 mb-6">Informasi lengkap Posyandu beserta media.</p>

        <div class="grid md:grid-cols-2 gap-6">

            {{-- INFO POSYANDU --}}
            <div>
                <h3 class="text-lg font-bold mb-2">Informasi</h3>
                <p><strong>Nama:</strong> {{ $posyandu->nama }}</p>
                <p><strong>Alamat:</strong> {{ $posyandu->alamat }}</p>
                <p><strong>RT/RW:</strong> {{ $posyandu->rt ?? '-' }} / {{ $posyandu->rw ?? '-' }}</p>
                <p><strong>Kontak:</strong> {{ $posyandu->kontak ?? '-' }}</p>
            </div>

            {{-- MEDIA --}}
            <div>
                <h3 class="text-lg font-bold mb-2">Media</h3>

                @if (!is_array($mediaFiles) || count($mediaFiles) === 0)
                    <p class="text-gray-500">Tidak ada media.</p>
                @else
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($mediaFiles as $file)
                            @php
                                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            @endphp

                            {{-- Gambar --}}
                            @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset($file) }}" class="rounded shadow">
                            @endif

                            {{-- Video --}}
                            @if ($ext == 'mp4')
                                <video controls class="rounded shadow w-full">
                                    <source src="{{ asset($file) }}">
                                </video>
                            @endif

                            {{-- PDF --}}
                            @if ($ext == 'pdf')
                                <a href="{{ asset($file) }}" target="_blank"
                                    class="block p-3 border rounded text-center text-blue-600">
                                    📄 Lihat PDF
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

        </div>

        {{-- ACTION BUTTONS --}}
        <div class="mt-6 flex gap-3">

            {{-- EDIT --}}
            <a href="{{ route('posyandu.edit', $posyandu) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Edit
            </a>

            {{-- DELETE --}}
            <form action="{{ route('posyandu.destroy', $posyandu) }}" method="POST"
                  onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Hapus
                </button>
            </form>

        </div>

    </div>
</div>
@endsection
