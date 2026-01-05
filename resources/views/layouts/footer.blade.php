<footer class="mt-10 py-6 border-t border-gray-200 bg-gray-50">
    <div class="max-w-4xl mx-auto text-center">

        <!-- Identitas Pengembang -->
        <div class="flex flex-col items-center mb-4">

            <!-- Foto -->
            <img src="{{ asset('assets/images/foto.png') }}"
                 class="w-24 h-24 rounded-full shadow-md mb-3 object-cover"
                 alt="Foto Pengembang">

            <!-- Data Diri -->
            <h3 class="text-lg font-semibold text-gray-700">Granddiva Inmonent</h3>
            <p class="text-gray-600 text-sm">NIM: 2457301064</p>
            <p class="text-gray-600 text-sm">Program Studi: Sistem Informasi</p>

            <!-- Sosial Media -->
            <div class="flex gap-4 mt-3">
                <a href="https://linkedin.com/in/username" target="_blank"
                   class="text-blue-600 hover:text-blue-800 text-xl">
                   <i class="fab fa-linkedin"></i>
                </a>

                <a href="https://github.com/username" target="_blank"
                   class="text-gray-800 hover:text-black text-xl">
                   <i class="fab fa-github"></i>
                </a>

                <a href="https://instagram.com/username" target="_blank"
                   class="text-pink-600 hover:text-pink-800 text-xl">
                   <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>

        <!-- Credit Aplikasi -->
        <p class="text-xs text-gray-500 mt-4">
            Aplikasi Sistem Informasi Posyandu &copy; {{ date('Y') }}
        </p>
        <p class="text-xs text-gray-400">Dikembangkan untuk keperluan pembelajaran dan pengabdian masyarakat.</p>
    </div>
</footer>

<!-- Tombol WhatsApp -->
<a href="https://wa.me/6282184244159?text=Halo%2C%20saya%20punya%20pertanyaan%20mengenai%20Aplikasi%20Posyandu."
   target="_blank"
   class="fixed bottom-6 right-6 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center text-3xl shadow-lg hover:bg-green-600 transition">
    <i class="fab fa-whatsapp"></i>
</a>
