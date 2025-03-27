<template>
  <div class="min-h-screen bg-gray-100 flex flex-col">
    <NavigationHeader />

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex-1">
      <h2 class="text-3xl font-bold mb-4 text-center">Blog</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <article class="bg-white border rounded-lg shadow-md p-6 transition-transform duration-300 hover:scale-105">
          <h3 class="text-2xl font-semibold mb-3">Manfaat Aplikasi Kasir untuk UMKM</h3>
          <p class="text-sm text-gray-500 mb-3">By Admin | 20 Maret 2023</p>
          <p class="text-gray-700 mb-4">
            Aplikasi kasir dapat meningkatkan efisiensi transaksi serta membantu mengelola inventaris dengan lebih baik. Pelajari lebih lanjut mengenai manfaatnya...
          </p>
          <a href="#" class="text-blue-600 hover:underline font-medium">Baca Selengkapnya</a>
        </article>
        <article class="bg-white border rounded-lg shadow-md p-6 transition-transform duration-300 hover:scale-105">
          <h3 class="text-2xl font-semibold mb-3">Tips Memaksimalkan Penjualan dengan POS Modern</h3>
          <p class="text-sm text-gray-500 mb-3">By Admin | 15 Maret 2023</p>
          <p class="text-gray-700 mb-4">
            POS modern memberikan solusi terintegrasi untuk penjualan dan inventaris. Berikut beberapa tips untuk memaksimalkan penggunaan sistem POS dalam bisnis Anda...
          </p>
          <a href="#" class="text-blue-600 hover:underline font-medium">Baca Selengkapnya</a>
        </article>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-inner py-4">
      <div class="container mx-auto text-center text-sm text-gray-600">
        &copy;2025 Kasir GWL. All rights reserved.
      </div>
    </footer>
  </div>
</template>

<script setup>
import NavigationHeader from "../Components/NavigationHeader.vue";
</script>
