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
        <!-- Tombol hamburger untuk mobile -->
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
      </div>
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