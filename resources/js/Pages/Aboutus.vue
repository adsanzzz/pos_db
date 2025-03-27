<template>
  <div class="min-h-screen bg-gray-50 flex flex-col">
    <NavigationHeader />

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex-1">
      <h2 class="text-3xl font-bold mb-6 text-center">About Us</h2>
      <div class="bg-white border rounded-lg shadow-lg p-8">
        <p class="text-gray-700 mb-6">
          Kami adalah perusahaan teknologi yang menyediakan solusi POS inovatif untuk mempermudah operasional bisnis Anda. Dengan pengalaman bertahun-tahun, kami berkomitmen memberikan layanan dan dukungan terbaik.
        </p>
        <h3 class="text-xl font-semibold mb-2">Visi Kami</h3>
        <p class="text-gray-700 mb-6">
          Menjadi penyedia solusi POS terdepan yang membantu bisnis tumbuh secara efisien dan efektif.
        </p>
        <h3 class="text-xl font-semibold mb-2">Misi Kami</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
          <li>Inovasi berkelanjutan untuk fitur-fitur terbaru.</li>
          <li>Peningkatan layanan pelanggan 24/7.</li>
          <li>Keamanan data dan integritas transaksi yang tinggi.</li>
          <li>Integrasi mudah dengan sistem lainnya.</li>
        </ul>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-inner py-4">
      <div class="container mx-auto text-center text-sm text-gray-600">
        &copy; 2025 Kasir GWL. All rights reserved.
      </div>
    </footer>
  </div>
</template>

<script setup>
import NavigationHeader from "../Components/NavigationHeader.vue";
</script>
