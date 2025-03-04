<template>
    <div class="min-h-screen bg-gray-50">
        <NavigationHeader />
  
      <!-- Main Content -->
      <main class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">FAQs</h2>
        <div class="space-y-4">
          <div class="p-4 border rounded">
            <h3 class="font-semibold">Apa itu Aplikasi Kasir?</h3>
            <p>
              Aplikasi kasir adalah sistem untuk memproses transaksi penjualan, mengelola stok barang, dan membuat laporan penjualan secara otomatis.
            </p>
          </div>
          <div class="p-4 border rounded">
            <h3 class="font-semibold">Bagaimana Cara Kerja Aplikasi Kasir?</h3>
            <p>
              Sistem kami mengintegrasikan perangkat keras dengan perangkat lunak untuk memproses transaksi secara real-time.
            </p>
          </div>
          <div class="p-4 border rounded">
            <h3 class="font-semibold">Apa Saja Fitur Unggulan dari Aplikasi Kami?</h3>
            <p>
              Fitur unggulan meliputi manajemen inventaris, laporan penjualan, integrasi berbagai metode pembayaran, dan antarmuka yang user-friendly.
            </p>
          </div>
          <div class="p-4 border rounded">
            <h3 class="font-semibold">Bagaimana Keamanan Data Transaksi Dijaga?</h3>
            <p>
              Kami menggunakan enkripsi data dan backup berkala untuk menjaga keamanan serta integritas data transaksi.
            </p>
          </div>
        </div>
      </main>
  
      <!-- Footer -->
      <footer class="bg-white shadow p-4 mt-8">
        <div class="container mx-auto text-center text-sm text-gray-600">
          &copy; 2025 Aplikasi Kasir. All rights reserved.
        </div>
      </footer>
    </div>
  </template>
  
  <script setup>
import NavigationHeader from "../Components/NavigationHeader.vue";

  </script>

