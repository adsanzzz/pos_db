<template>
    <div class="flex min-h-screen bg-gray-50 text-[14px] font-sans">
      <!-- MOBILE SIDEBAR -->
      <transition name="slide">
        <div v-if="isSidebarOpen" class="fixed inset-0 z-50 flex lg:hidden">
          <!-- Overlay background -->
          <div class="fixed inset-0 bg-black opacity-50" @click="isSidebarOpen = false"></div>
          <!-- Sidebar Mobile -->
          <aside class="relative flex flex-col w-64 bg-white border-r border-gray-200">
            <!-- Header Mobile Sidebar -->
            <div class="flex items-center justify-between h-16 border-b border-gray-200 px-4">
              <h1 class="text-3xl font-bold text-purple-600">GWL</h1>
              <button @click="isSidebarOpen = false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <!-- Menu Mobile -->
            <nav class="flex-1 px-4 py-6 overflow-auto">
              <ul class="space-y-2">
                <li
                  v-for="(item, index) in menuItems"
                  :key="index"
                  class="flex items-center gap-3 p-3 rounded-lg cursor-pointer hover:bg-gray-50"
                  :class="{'bg-purple-50': item.active}"
                >
                  <div
                    class="flex items-center justify-center w-10 h-10 rounded-full"
                    :class="item.active ? 'bg-purple-100' : 'bg-gray-100'"
                  >
                    <img
                      v-if="!item.isLogout"
                      :src="item.icon"
                      :alt="item.label"
                      class="w-6 h-6"
                    />
                    <svg
                      v-else
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                    >
                      <path
                        d="M23.4664 24.243C23.1857 23.9202 23.0453 23.5538 23.0453 23.1437C23.0453 22.7345 23.1857 22.3934 23.4664 22.1203L26.2992 19.3646H15.3125C14.8786 19.3646 14.5152 19.2216 14.2222 18.9356C13.9283 18.6506 13.7812 18.297 13.7812 17.875C13.7812 17.453 13.9283 17.0989 14.2222 16.8129C14.5152 16.5279 14.8786 16.3854 15.3125 16.3854H26.2992L23.4664 13.6297C23.1602 13.3318 23.007 12.9782 23.007 12.5691C23.007 12.159 23.1602 11.8049 23.4664 11.507C23.7471 11.2091 24.0983 11.0602 24.5199 11.0602C24.9405 11.0602 25.2911 11.1967 25.5719 11.4698L31.0844 16.8323C31.2375 16.9813 31.3462 17.1426 31.4105 17.3164C31.4738 17.4902 31.5055 17.6764 31.5055 17.875C31.5055 18.0736 31.4738 18.2598 31.4105 18.4336C31.3462 18.6074 31.2375 18.7688 31.0844 18.9177L25.5719 24.2802C25.2401 24.603 24.8767 24.7455 24.4816 24.7077C24.0855 24.671 23.7471 24.5161 23.4664 24.243Z"
                        fill="#EB3223"
                      />
                    </svg>
                  </div>
                  <span
                    class="font-medium text-gray-700"
                    :class="item.isLogout ? 'text-red-500' : ''"
                  >
                    {{ item.label }}
                  </span>
                </li>
              </ul>
            </nav>
          </aside>
        </div>
      </transition>
  
      <!-- DESKTOP SIDEBAR -->
      <aside class="hidden lg:flex flex-col w-64 bg-white border-r border-gray-200">
        <div class="flex items-center justify-center h-16 border-b border-gray-200">
          <h1 class="text-3xl font-bold text-purple-600">GWL</h1>
        </div>
        <nav class="flex-1 px-4 py-6 overflow-auto">
          <ul class="space-y-2">
            <li
              v-for="(item, index) in menuItems"
              :key="index"
              class="flex items-center gap-3 p-3 rounded-lg cursor-pointer hover:bg-gray-50"
              :class="{'bg-purple-50': item.active}"
            >
              <div
                class="flex items-center justify-center w-10 h-10 rounded-full"
                :class="item.active ? 'bg-purple-100' : 'bg-gray-100'"
              >
                <img
                  v-if="!item.isLogout"
                  :src="item.icon"
                  :alt="item.label"
                  class="w-6 h-6"
                />
                <svg
                  v-else
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <path
                    d="M23.4664 24.243C23.1857 23.9202 23.0453 23.5538 23.0453 23.1437C23.0453 22.7345 23.1857 22.3934 23.4664 22.1203L26.2992 19.3646H15.3125C14.8786 19.3646 14.5152 19.2216 14.2222 18.9356C13.9283 18.6506 13.7812 18.297 13.7812 17.875C13.7812 17.453 13.9283 17.0989 14.2222 16.8129C14.5152 16.5279 14.8786 16.3854 15.3125 16.3854H26.2992L23.4664 13.6297C23.1602 13.3318 23.007 12.9782 23.007 12.5691C23.007 12.159 23.1602 11.8049 23.4664 11.507C23.7471 11.2091 24.0983 11.0602 24.5199 11.0602C24.9405 11.0602 25.2911 11.1967 25.5719 11.4698L31.0844 16.8323C31.2375 16.9813 31.3462 17.1426 31.4105 17.3164C31.4738 17.4902 31.5055 17.6764 31.5055 17.875C31.5055 18.0736 31.4738 18.2598 31.4105 18.4336C31.3462 18.6074 31.2375 18.7688 31.0844 18.9177L25.5719 24.2802C25.2401 24.603 24.8767 24.7455 24.4816 24.7077C24.0855 24.671 23.7471 24.5161 23.4664 24.243Z"
                    fill="#EB3223"
                  />
                </svg>
              </div>
              <span
                class="font-medium text-gray-700"
                :class="item.isLogout ? 'text-red-500' : ''"
              >
                {{ item.label }}
              </span>
            </li>
          </ul>
        </nav>
      </aside>
  
      <!-- MAIN CONTENT -->
      <div class="flex-1 flex flex-col">
        <!-- HEADER -->
        <header class="flex items-center h-16 px-4 md:px-6 bg-white border-b border-gray-200">
          <!-- Hamburger untuk mobile -->
          <button class="lg:hidden mr-4" @click="isSidebarOpen = true">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
          <span class="text-sm font-medium text-neutral-700 mr-4">Admin /</span>
          <!-- Search (hanya tampil di desktop) -->
          <div class="relative max-w-sm w-full hidden md:block">
            <input
              type="text"
              placeholder="Search"
              class="w-full h-10 px-4 bg-gray-100 rounded-md text-sm font-medium text-neutral-700 outline-none"
            />
            <svg
              class="absolute right-3 top-1/2 transform -translate-y-1/2"
              width="16"
              height="16"
              viewBox="0 0 16 16"
              fill="none"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10.442 9.146a5.5 5.5 0 1 1-1.296-1.296l3.797 3.797a.917.917 0 0 0 1.296-1.296l-3.797-3.797zM9.5 5.5a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"
                fill="#BDBDBD"
              />
            </svg>
          </div>
          <!-- Ikon Kanan -->
          <div class="flex items-center gap-6 ml-auto">
            <!-- Bahasa -->
            <div class="flex items-center gap-1 text-base text-zinc-500">
              <span>En</span>
              <svg width="25" height="24" viewBox="0 0 25 24" fill="none">
                <path
                  opacity="0.8"
                  d="M11.4614 15.8744C11.3418 15.8744 11.2261 15.852 11.1143 15.8072C11.0019 15.7623 10.9084 15.7025 10.8336 15.6278L6.70806 11.5022C6.54364 11.3378 6.46143 11.1285 6.46143 10.8744C6.46143 10.6203 6.54364 10.4111 6.70806 10.2466C6.87249 10.0822 7.08175 10 7.33587 10C7.58998 10 7.79924 10.0822 7.96367 10.2466L11.4614 13.7444L14.9592 10.2466C15.1236 10.0822 15.3329 10 15.587 10C15.8411 10 16.0504 10.0822 16.2148 10.2466C16.3792 10.4111 16.4614 10.6203 16.4614 10.8744C16.4614 11.1285 16.3792 11.3378 16.2148 11.5022L12.0892 15.6278C11.9995 15.7175 11.9024 15.7809 11.7977 15.8179C11.6931 15.8556 11.581 15.8744 11.4614 15.8744Z"
                  fill="#828282"
                />
              </svg>
            </div>
            <!-- Notifikasi -->
            <div class="relative">
              <img
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/180dad359c3d1c7280ef3ed80196856f0d64ea11"
                alt="Notification"
                class="w-6 h-6 object-cover"
              />
              <span class="absolute top-0 right-0 w-2 h-2 bg-green-500 border border-white rounded-full"></span>
            </div>
            <!-- Avatar -->
            <button class="relative w-10 h-10 flex items-center justify-center bg-gray-200 rounded-full overflow-hidden">
              <svg width="49" height="48" viewBox="0 0 49 48" fill="none">
                <circle cx="24.8726" cy="24" r="24" fill="#9CC4F3" fill-opacity="0.2" />
              </svg>
            </button>
          </div>
        </header>
  
        <!-- Tampilan Form Input Pembayaran -->
        <div v-if="stage === 'input'" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <form @submit.prevent="handleSubmit">
            <div class="mb-4">
              <label class="block text-gray-700 mb-1" for="transactionId">ID Transaksi</label>
              <input
                id="transactionId"
                v-model="payment.id"
                type="text"
                placeholder="Masukkan ID Transaksi"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                required
              />
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 mb-1" for="amount">Jumlah Bayar</label>
              <input
                id="amount"
                v-model="payment.amount"
                type="number"
                placeholder="Masukkan jumlah bayar"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                required
              />
            </div>
            <div class="mb-6">
              <label class="block text-gray-700 mb-1">Metode Pembayaran</label>
              <div class="flex items-center space-x-4">
                <!-- Opsi metode pembayaran -->
                <label class="flex items-center">
                  <input
                    type="radio"
                    value="QRIS"
                    v-model="payment.method"
                    class="form-radio text-blue-500"
                  />
                  <span class="ml-2">QRIS</span>
                </label>
                <label class="flex items-center">
                  <input
                    type="radio"
                    value="Cash"
                    v-model="payment.method"
                    class="form-radio text-blue-500"
                  />
                  <span class="ml-2">Cash</span>
                </label>
              </div>
            </div>
            <div class="flex justify-end">
              <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
              >
                Lanjutkan Pembayaran
              </button>
            </div>
          </form>
        </div>
  
        <!-- Tampilan QR Code Payment (QRIS) -->
        <div v-else-if="stage === 'qris'" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <h2 class="text-xl font-bold mb-4 text-center">Scan QR Code untuk Pembayaran</h2>
          <div class="flex justify-center mb-4">
            <!-- Komponen QR Code -->
            <qrcode-vue :value="qrData" :size="200" />
          </div>
          <div class="flex justify-center space-x-4">
            <button
              @click="confirmPayment"
              class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
            >
              Konfirmasi Pembayaran
            </button>
            <button
              @click="goBack"
              class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400"
            >
              Kembali
            </button>
          </div>
        </div>
  
        <!-- Tampilan Struk Nota (Receipt) -->
        <div v-else-if="stage === 'receipt'" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <h2 class="text-xl font-bold mb-4 text-center">Struk Nota Pembayaran</h2>
          <div class="mb-6">
            <p><strong>ID Transaksi:</strong> {{ payment.id }}</p>
            <p><strong>Jumlah Bayar:</strong> Rp {{ payment.amount }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ payment.method }}</p>
            <p><strong>Tanggal:</strong> {{ receiptDate }}</p>
          </div>
          <div class="flex justify-center space-x-4">
            <button
              @click="printReceipt"
              class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            >
              Cetak Nota
            </button>
            <button
              @click="resetForm"
              class="bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-400"
            >
              Selesai
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed } from 'vue';
  import QrcodeVue from 'qrcode.vue';
  
  const isSidebarOpen = ref(false);
  const stage = ref('input'); // stage: input, qris, receipt
  
  const payment = ref({
    id: '',
    amount: '',
    method: 'QRIS' // default metode pembayaran
  });
  
  // Data QR dihasilkan berdasarkan data pembayaran
  const qrData = computed(() => {
    return JSON.stringify({
      transactionId: payment.value.id,
      amount: payment.value.amount,
      method: payment.value.method
    });
  });
  
  const receiptDate = ref('');
  
  const handleSubmit = () => {
    // Untuk metode QRIS, tampilkan QR Code
    if (payment.value.method === 'QRIS') {
      stage.value = 'qris';
    } else {
      // Untuk metode lain, langsung tampilkan struk (simulasi)
      receiptDate.value = new Date().toLocaleString();
      stage.value = 'receipt';
    }
  };
  
  const confirmPayment = () => {
    // Simulasi konfirmasi pembayaran setelah QRIS discan
    receiptDate.value = new Date().toLocaleString();
    stage.value = 'receipt';
  };
  
  const goBack = () => {
    // Kembali ke form input
    stage.value = 'input';
  };
  
  const resetForm = () => {
    // Reset form dan kembali ke stage awal
    payment.value = {
      id: '',
      amount: '',
      method: 'QRIS'
    };
    stage.value = 'input';
  };
  
  const printReceipt = () => {
    window.print();
  };

  const menuItems = ref([
    { id: 'dashboard', icon: 'https://via.placeholder.com/24', label: 'Dashboard', active: true },
    { id: 'transaction', icon: 'https://via.placeholder.com/24', label: 'Transaksi', active: false },
    { id: 'payment', icon: 'https://via.placeholder.com/24', label: 'Payment', active: false },
    { id: 'logout', icon: 'https://via.placeholder.com/24', label: 'Logout', active: false, isLogout: true },
  ]);
  
  </script>
  
  <style scoped>
  /* Anda dapat menambahkan styling tambahan jika diperlukan */
  </style>
  