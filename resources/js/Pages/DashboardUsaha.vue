<template>
  <div class="flex min-h-screen bg-gray-50 text-[14px] font-sans">
    <!-- MOBILE SIDEBAR -->
    <transition name="slide">
      <div v-if="showSidebar" class="fixed inset-0 z-50 flex lg:hidden">
        <div class="fixed inset-0 bg-black opacity-50" @click="showSidebar = false"></div>
        <aside class="relative flex flex-col w-64 bg-white border-r border-gray-200">
          <div class="flex items-center justify-between h-16 border-b border-gray-200 px-4">
            <h1 class="text-3xl font-bold text-purple-600">GWL</h1>
            <button @click="showSidebar = false">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <nav class="flex-1 px-4 py-6 overflow-auto">
            <ul class="space-y-2">
              <li v-for="(item, idx) in menuItems" :key="idx" class="flex items-center gap-3 p-3 rounded-lg cursor-pointer hover:bg-gray-50" :class="{'bg-purple-50': item.active}">
                <div class="flex items-center justify-center w-10 h-10 rounded-full" :class="item.active ? 'bg-purple-100' : 'bg-gray-100'">
                  <img v-if="!item.isLogout" :src="item.icon" :alt="item.label" class="w-6 h-6" />
                  <svg v-else width="24" height="24" viewBox="0 0 24 24" fill="none">[...]</svg>
                </div>
                <span class="font-medium text-gray-700" :class="item.isLogout ? 'text-red-500' : ''">{{ item.label }}</span>
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
          <li v-for="(item, idx) in menuItems" :key="idx" class="flex items-center gap-3 p-3 rounded-lg cursor-pointer hover:bg-gray-50" :class="{'bg-purple-50': item.active}">
            <div class="flex items-center justify-center w-10 h-10 rounded-full" :class="item.active ? 'bg-purple-100' : 'bg-gray-100'">
              <img v-if="!item.isLogout" :src="item.icon" :alt="item.label" class="w-6 h-6" />
              <svg v-else width="24" height="24" viewBox="0 0 24 24" fill="none">[...]</svg>
            </div>
            <span class="font-medium text-gray-700" :class="item.isLogout ? 'text-red-500' : ''">{{ item.label }}</span>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- CONTENT AND RIGHT SIDEBAR WRAPPER -->
    <div class="flex-1 flex flex-col lg:flex-row">
      <!-- MAIN CONTENT -->
      <div class="flex-1 flex flex-col">
        <Header 
          :showSidebar="showSidebar"
          @toggle-sidebar="showSidebar = !showSidebar"
          @toggle-profile="showProfile = !showProfile"
        />
        <main class="flex-1 p-6 md:p-8 overflow-auto mt-20 md:mt-16">
          <div class="max-w-6xl mx-auto space-y-6">
            <!-- Statistics Cards -->
            <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
              <div class="flex flex-col md:flex-row gap-6">
            <!-- Lokasi Cabang -->
            <div class="flex items-center gap-4 p-3 bg-green-100 rounded-lg flex-1">
              <div class="flex items-center justify-center w-10 h-10 bg-emerald-200 rounded">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/978dd4790d82144aee361363dad2e1455881e544e84deaf04e164d00064bc8d3?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
                  alt="Location icon"
                  class="w-6 h-6 object-contain"
                />
              </div>
              <div>
                <h3 class="text-xs font-medium text-gray-800">Lokasi Cabang</h3>
                <p class="text-xs text-gray-500 mt-1">Cabang Jebres</p>
              </div>
            </div>
            <!-- Profil Usaha -->
            <div class="flex items-center gap-4 p-3 bg-violet-100 rounded-lg flex-1">
              <div class="flex items-center justify-center w-10 h-10 bg-purple-200 rounded">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ca7bd9aa4cc1b9f325b7f1d31e5272d39bb1d38ebbc30b2da009e4d9a3d3308?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
                  alt="Business icon"
                  class="w-6 h-6 object-contain"
                />
              </div>
              <div>
                <h3 class="text-xs font-medium text-gray-800">Profil Usaha</h3>
                <p class="text-xs text-gray-500 mt-1">Warmindo sk</p>
              </div>
            </div>
          </div>
            </section>

            <!-- Business Stats Section -->
            <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
              <div class="flex flex-col md:flex-row gap-6">
            <!-- Promosi Berjalan -->
            <article class="bg-white rounded-xl border border-gray-200 p-4 flex-1">
              <div class="flex justify-between items-start">
                <div class="flex items-start gap-3">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/afa94f0c7d0de096a571c62f7fafef680cac94b2f4a0bec533af8f81a521521c?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
                    alt="Promotion icon"
                    class="w-8 h-8 object-contain"
                  />
                  <div>
                    <h3 class="text-sm font-semibold text-gray-700">
                      Promosi berjalan
                    </h3>
                    <p class="text-xs mt-2 font-medium">Nasgor ayam</p>
                  </div>
                </div>
                <p class="text-xs text-gray-700 self-end">5%</p>
              </div>
              <div class="flex justify-between mt-3 text-xs">
                <p class="font-medium text-gray-700">Magelangan</p>
                <p class="text-gray-700">3%</p>
              </div>
            </article>

            <!-- Order Stats -->
            <article class="bg-white rounded-xl border border-gray-200 p-4 flex-1">
              <div class="flex justify-between items-center">
                <div class="flex items-center gap-3 text-sm font-semibold text-gray-700">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6567ac50754f58e2dd3ea4f6586fd5cb1457ef1214876f6b8a90679919f22172?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
                    alt="Order icon"
                    class="w-8 h-8 object-contain"
                  />
                  <h3>Jumlah order</h3>
                </div>
                <p class="text-sm font-medium text-green-500">300</p>
              </div>
              <div class="flex justify-between mt-4 text-xs">
                <div class="flex flex-col font-medium text-gray-700">
                  <p>Jumlah pendapatan</p>
                  <p class="mt-2">Uang awal</p>
                </div>
                <div class="text-right text-gray-700">
                  <p>$ 150</p>
                  <p class="mt-2">$ 150</p>
                </div>
              </div>
            </article>

            <!-- Status Stok -->
            <article class="bg-white rounded-xl border border-gray-200 p-4 flex-1">
              <div class="flex justify-between">
                <div class="flex items-start gap-3 text-sm font-semibold text-gray-700">
                  <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/5bd524fdabdf78dae5464719d443e78303751f595aca2056794f8052d817d2dd?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
                    alt="Stock icon"
                    class="w-7 h-7 object-contain"
                  />
                  <h3>Status stok</h3>
                </div>
                <p class="text-xs text-gray-700 self-end">Aug 21, 2022</p>
              </div>
              <div class="mt-3 text-xs">
                <p>All Item</p>
                <p class="mt-2">Kopi item</p>
                <p class="mt-2">Gula</p>
              </div>
              <div class="flex flex-col items-end mt-4 text-sm font-semibold">
                <p class="text-green-500">Aman</p>
                <p class="mt-2 text-amber-500">Hampir Habis</p>
                <p class="mt-2 text-red-600">Habis</p>
              </div>
            </article>
          </div>
            </section>

            <!-- Order List Section -->
            <section class="bg-white rounded shadow-sm p-6">
              <header class="px-6 flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
              <h2 class="text-2xl font-medium text-slate-950">Order List</h2>
              <p class="mt-2 text-sm text-gray-800">Order ID</p>
            </div>
            <div class="hidden md:flex gap-6 text-sm text-gray-800">
              <p>Date/Time</p>
              <p>Order Type</p>
              <p>Employee</p>
              <p>Status</p>
              <p>Amount</p>
            </div>
          </header>
          <div class="mt-4 border-t border-gray-100"></div>
          <!-- Order Items -->
          <div class="px-6 space-y-4">
            <article
              v-for="(order, index) in orders"
              :key="index"
              class="flex flex-col md:flex-row gap-2 md:items-center text-sm text-gray-500"
            >
              <div class="flex-1 flex justify-between md:justify-start md:gap-6">
                <p class="font-medium text-gray-700">{{ order.id }}</p>
                <p>{{ order.time }}</p>
                <p>{{ order.type }}</p>
                <p>{{ order.employee }}</p>
              </div>
              <div>
                <span
                  :class="[
                    'px-3 py-1 text-xs font-medium rounded-full',
                    order.status === 'Complete'
                      ? 'text-green-500 bg-green-100'
                      : order.status === 'Pending'
                      ? 'text-amber-500 bg-orange-100'
                      : 'text-gray-500 bg-gray-100'
                  ]"
                >
                  {{ order.status }}
                </span>
              </div>
              <p class="text-right">{{ order.amount }}</p>
            </article>
          </div>
            </section>
          </div>
        </main>
      </div>

      <!-- RIGHT SIDEBAR -->
      <aside class="w-full lg:w-64 bg-gray-50 border-l border-gray-200 p-6 space-y-6 mt-20 md:mt-20`">
        <!-- User Profile -->
        <section class="bg-white rounded-2xl shadow-sm p-6 flex flex-col items-center">
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ed706e44730fd72447aab31effcc8200d6f8a1e054b643bf74e3e9e2405dd89c?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966" alt="User profile" class="w-20 h-20 object-contain rounded-full" />
          <h3 class="mt-3 text-lg font-medium text-gray-900">Aditya Ikhsan</h3>
          <p class="text-sm text-gray-400">Admin</p>
        </section>

        <!-- Overall Statistics -->
        <section class="bg-white rounded-2xl shadow-sm p-4">
          <h2 class="text-xl font-medium text-black mb-4"><span class="font-bold">Overall</span> Statistics</h2>
          <nav class="flex justify-around mb-6 text-sm font-medium text-violet-300">
            <button class="text-gray-600">All</button>
            <button>Monthly</button>
            <button>Weekly</button>
            <button>Today</button>
          </nav>
          <div class="text-center text-xs text-gray-900">
            <!-- Chart Placeholder -->
            <div class="flex justify-between items-end h-32">
              <div class="flex flex-col items-center">
                <div class="w-4 bg-slate-400 h-12 rounded"></div>
                <p class="mt-2 font-bold text-slate-400">Week 1</p>
              </div>
              <div class="flex flex-col items-center">
                <div class="w-4 bg-purple-300 h-20 rounded"></div>
                <p class="mt-2 font-bold text-slate-400">Week 2</p>
              </div>
              <div class="flex flex-col items-center">
                <div class="w-4 bg-violet-300 h-16 rounded"></div>
                <p class="mt-2 font-bold text-slate-400">Week 3</p>
              </div>
              <div class="flex flex-col items-center">
                <div class="w-4 bg-slate-400 h-8 rounded"></div>
                <p class="mt-2 font-bold text-slate-400">Week 4</p>
              </div>
            </div>
            <!-- Legend -->
            <div class="flex flex-col gap-2 mt-4">
              <div class="flex items-center gap-2"><span class="block w-4 h-1 bg-slate-400 rounded"></span><p>Intel rebus</p></div>
              <div class="flex items-center gap-2"><span class="block w-4 h-1 bg-purple-300 rounded"></span><p>Magelangan</p></div>
              <div class="flex items-center gap-2"><span class="block w-4 h-1 bg-violet-300 rounded"></span><p>Omlet</p></div>
            </div>
          </div>
        </section>
      </aside>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Header from "../Components/Header.vue";

const showSidebar = ref(false);
const showProfile = ref(false);

const orders = [ 
  { id: '01015', time: '10:00 PM', type: 'Regular', employee: 'Masud Rana', status: 'Complete', amount: '$ 250' },
  { id: '01016', time: '17 May 2022', type: 'Regular', employee: 'Masud Rana', status: 'Pending', amount: '$ 250' },
  { id: '01017', time: '17 May 2022', type: 'Regular', employee: 'Masud Rana', status: 'Complete', amount: '$ 250' },
  { id: '01018', time: '17 May 2022', type: 'Regular', employee: 'Masud Rana', status: 'Complete', amount: '$ 250' },
  { id: '01019', time: '18 May 2022', type: 'Regular', employee: 'Masud Rana', status: 'Complete', amount: '$ 250' },
];
const menuItems = [ 
  { icon:'https://cdn.builder.io/api/v1/image/assets/TEMP/56b0dab2fae9e5c2bee47511642d1921285906074f2a74a7be2d02f5eb54314f?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966', label: 'Stok barang', active: false },
  { icon: 'https://cdn.builder.io/api/v1/image/assets/TEMP/3c8137bac5e83c30be588fdbf9ffc900201014ba5977bca44f8a29fd71da6c75?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966', label: 'Produk', active: false },
  { icon: 'https://cdn.builder.io/api/v1/image/assets/TEMP/d3891460ce1f8ea9bea86006dfd2f08e454a1f65bc367dbbb7d34c4ba33079b8?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966', label: 'Diskon', active: false },
  { icon: 'https://cdn.builder.io/api/v1/image/assets/TEMP/498ed4bbb4fcc3c867ff7c04d7822fc364cfdbc972c7e30ce6f3cab50070aec1?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966', label: 'Pajak', active: false },
  { icon: 'https://cdn.builder.io/api/v1/image/assets/TEMP/2564728ca62db7e08aba2fedfc0e32368cc1b129078f71bf63303f74826bbb08?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966', label: 'Karyawan', active: false },
  { icon: 'https://cdn.builder.io/api/v1/image/assets/TEMP/313f2d092fb9fe072098c4bf4373994be0cb8a240e40a91a936ed3afda6b50ed?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966', label: 'Cabang', active: false },
  { icon: 'https://cdn.builder.io/api/v1/image/assets/TEMP/7aadf90a2cfbf5b8e0ccaa4ee7c5b5fe1706767c0f1ff90b2c98a89e14912a4d?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966', label: 'Laporan', active: false },
  { icon: 'https://cdn.builder.io/api/v1/image/assets/TEMP/09bb9e47549b13f0d4fe2f6d8e83b10cdb35b846839adbc0885f3264fb8090d9?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966', label: 'Pengaturan', active: false }, ];
</script>
