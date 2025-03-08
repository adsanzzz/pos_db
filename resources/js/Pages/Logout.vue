<template>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
      <div class="bg-white rounded-lg shadow-lg p-6 w-80">
        <h2 class="text-xl font-bold mb-4">Konfirmasi Logout</h2>
        <p class="mb-6">Apakah Anda Ingin Logout?</p>
        <div class="flex justify-end space-x-4">
          <button @click="cancelLogout" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">
            Tidak
          </button>
          <button @click="confirmLogout" class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600">
            Iya
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineEmits } from 'vue';
  const emit = defineEmits(['confirm', 'cancel']);
  
  const confirmLogout = () => {
    emit('confirm');
  };
  
  const cancelLogout = () => {
    emit('cancel');
  };
  </script>
  