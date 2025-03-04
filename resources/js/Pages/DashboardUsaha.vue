<template>
  <div class="min-h-screen bg-slate-50">
    <!-- Komponen Header Navigasi -->
    <NavigationHeader />

    <!-- Top Navigation -->
    <nav class="bg-white shadow-md px-6 py-4 flex items-center justify-between">
      <!-- Logo & Info Admin -->
      <div class="flex items-center gap-4">
        <h1 class="text-2xl font-bold">GWL</h1>
        <div class="hidden md:flex items-center gap-2">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/b39ee5997594ba487b8753d95697bbdcd94a88492374c214895353467ae05dd5?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
            alt="Admin icon"
            class="w-6 h-6 object-contain"
          />
          <span class="text-gray-700 text-sm">Admin /</span>
        </div>
      </div>

      <!-- Search & Kontrol Pengguna -->
      <div class="flex items-center gap-4">
        <!-- Search Bar (hanya tampil di md ke atas) -->
        <div class="hidden md:flex items-center border rounded-lg px-2 py-1">
          <input
            type="text"
            placeholder="Search"
            class="outline-none bg-transparent text-sm"
          />
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/853bee793a4e4c8ce0e8472a578a3ed552f2c56724cb541de4b52e703b23e5cc?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
            alt="Search icon"
            class="w-4 h-4 object-contain"
          />
        </div>
        <!-- Bahasa, Notifikasi & Avatar -->
        <div class="flex items-center gap-3">
          <div class="flex items-center gap-1">
            <span class="text-gray-600 text-sm">En</span>
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/498b85ee077f699661c2dbdd29b0b5369d6ec0a776260db867ee233262d95310?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
              alt="Language selector"
              class="w-6 h-6 object-contain"
            />
          </div>
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/6e5226ea980319a1eacea0a2a091e11042caec96b9a0f4f395ed4ed3bd63b56b?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
            alt="Notification"
            class="w-5 h-5 object-contain"
          />
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/a1bdc21e5ccefefa663d8008cff3804561d2a5b0fae2ffa10310c03b2e094b97?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
            alt="User"
            class="w-10 h-10 object-contain rounded-full"
          />
        </div>
      </div>
    </nav>

    <!-- Main Container -->
    <div class="container mx-auto px-4 py-6 grid grid-cols-1 md:grid-cols-12 gap-6">
      <!-- Left Sidebar -->
      <aside class="md:col-span-3">
        <div class="bg-white p-4 rounded-lg shadow-sm">
          <div class="flex flex-col items-center space-y-4">
            <!-- Header Gambar Menu -->
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/093a563e9d032ecaee70950641daf46afc7ba211cfd56ac91bc322f9b1df7256?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
              alt="Menu header"
              class="w-24 rounded-md"
            />
            <!-- Menu Items -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
              <div
                v-for="(item, index) in menuItems"
                :key="index"
                class="flex flex-col items-center p-3 border rounded-md bg-slate-50"
              >
                <img :src="item.icon" :alt="item.text" class="w-10 h-10 mx-auto" />
                <p class="mt-2 text-xs text-center">{{ item.text }}</p>
              </div>
            </div>
            <!-- Tombol Logout -->
            <button class="mt-4 px-4 py-2 border rounded-md text-sm text-gray-700 w-full">
              Logout
            </button>
          </div>
        </div>
      </aside>

      <!-- Main Content -->
      <main class="md:col-span-6 space-y-6">
        <!-- Statistics Cards -->
        <section class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
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
        <section class="p-5 bg-white rounded-2xl shadow-sm border border-gray-100">
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
        <section class="pt-6 pb-16 bg-white rounded shadow-sm">
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
      </main>

      <!-- Right Sidebar -->
      <aside class="md:col-span-3 space-y-6">
        <!-- User Profile -->
        <section class="bg-white rounded-2xl shadow-sm p-6 flex flex-col items-center">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/ed706e44730fd72447aab31effcc8200d6f8a1e054b643bf74e3e9e2405dd89c?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
            alt="User profile"
            class="w-20 h-20 object-contain rounded-full"
          />
          <h3 class="mt-3 text-lg font-medium text-gray-900">Aditya Ikhsan</h3>
          <p class="text-sm text-gray-400">Admin</p>
        </section>

        <!-- Overall Statistics -->
        <section class="bg-white rounded-2xl shadow-sm p-4">
          <h2 class="text-xl font-medium text-black mb-4">
            <span class="font-bold">Overall</span> Statistics
          </h2>
          <!-- Chart Navigation -->
          <nav class="flex justify-around mb-6 text-sm font-medium text-violet-300">
            <button class="text-gray-600">All</button>
            <button>Monthly</button>
            <button>Weekly</button>
            <button>Today</button>
          </nav>
          <!-- Dummy Chart Content -->
          <div class="text-center text-xs text-gray-900">
            <p class="mb-4">[Chart Placeholder]</p>
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
              <div class="flex items-center gap-2">
                <span class="block w-4 h-1 bg-slate-400 rounded"></span>
                <p>Intel rebus</p>
              </div>
              <div class="flex items-center gap-2">
                <span class="block w-4 h-1 bg-purple-300 rounded"></span>
                <p>Magelangan</p>
              </div>
              <div class="flex items-center gap-2">
                <span class="block w-4 h-1 bg-violet-300 rounded"></span>
                <p>Omlet</p>
              </div>
            </div>
          </div>
        </section>
      </aside>
    </div>
  </div>
</template>

<script setup>
import NavigationHeader from "../Components/NavigationHeader.vue";

const orders = [
  {
    id: "01015",
    time: "10:00 PM",
    type: "Regular",
    employee: "Masud Rana",
    status: "Complete",
    amount: "$ 250",
  },
  {
    id: "01016",
    time: "17 May 2022",
    type: "Regular",
    employee: "Masud Rana",
    status: "Pending",
    amount: "$ 250",
  },
  {
    id: "01017",
    time: "17 May 2022",
    type: "Regular",
    employee: "Masud Rana",
    status: "Complete",
    amount: "$ 250",
  },
  {
    id: "01018",
    time: "17 May 2022",
    type: "Regular",
    employee: "Masud Rana",
    status: "Complete",
    amount: "$ 250",
  },
  {
    id: "01015",
    time: "17 May 2022",
    type: "Regular",
    employee: "Masud Rana",
    status: "Complete",
    amount: "$ 250",
  },
  {
    id: "01015",
    time: "17 May 2022",
    type: "Regular",
    employee: "Masud Rana",
    status: "Complete",
    amount: "$ 250",
  },
];

const menuItems = [
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/56b0dab2fae9e5c2bee47511642d1921285906074f2a74a7be2d02f5eb54314f?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966",
    text: "Stok barang",
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/3c8137bac5e83c30be588fdbf9ffc900201014ba5977bca44f8a29fd71da6c75?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966",
    text: "Produk",
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/d3891460ce1f8ea9bea86006dfd2f08e454a1f65bc367dbbb7d34c4ba33079b8?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966",
    text: "Diskon",
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/498ed4bbb4fcc3c867ff7c04d7822fc364cfdbc972c7e30ce6f3cab50070aec1?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966",
    text: "Pajak",
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/2564728ca62db7e08aba2fedfc0e32368cc1b129078f71bf63303f74826bbb08?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966",
    text: "Karyawan",
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/313f2d092fb9fe072098c4bf4373994be0cb8a240e40a91a936ed3afda6b50ed?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966",
    text: "Cabang",
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/7aadf90a2cfbf5b8e0ccaa4ee7c5b5fe1706767c0f1ff90b2c98a89e14912a4d?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966",
    text: "Laporan",
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/09bb9e47549b13f0d4fe2f6d8e83b10cdb35b846839adbc0885f3264fb8090d9?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966",
    text: "Pengaturan",
  },
];
</script>