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

      <!-- CONTENT -->
      <main class="flex-1 p-4 md:p-5">
        <!-- Dashboard Cards -->
        <section class="flex flex-col sm:flex-row gap-5 mb-5">
          <article
            v-for="card in dashboardCards"
            :key="card.title"
            class="flex-1 p-4 md:p-5 bg-white rounded-2xl border border-zinc-100 shadow-sm"
          >
            <i :class="`ti ti-${card.icon} text-2xl mb-3`"></i>
            <h3 class="mb-5 text-sm font-semibold text-neutral-700">{{ card.title }}</h3>
            <p v-if="card.subtitle" class="text-sm text-gray-500">{{ card.subtitle }}</p>
            <p
              v-if="card.value"
              :class="['text-xl font-bold', card.valueType && `text-${card.valueType}`]"
            >
              {{ card.value }}
            </p>
            <div class="flex flex-col gap-2.5">
              <div v-for="(item, index) in card.items" :key="index" class="flex justify-between text-xs">
                <span class="text-neutral-700">{{ item.name }}</span>
                <span
                  :class="['text-gray-700 text-opacity-70', item.status && `text-${item.status}`]"
                >
                  {{ item.value }}
                </span>
              </div>
            </div>
          </article>
        </section>

        <!-- Order List -->
        <section class="p-4 md:p-5 bg-white rounded-2xl mb-5">
          <h2 class="mb-5 text-xl text-slate-950">Order List</h2>
          <!-- Versi Desktop (Grid) -->
          <div v-if="!isMobile" class="overflow-x-auto">
            <div>
              <div class="grid px-0 py-4 border-b border-zinc-100 grid-cols-6">
                <div
                  v-for="header in tableHeaders"
                  :key="header"
                  class="text-sm text-zinc-800"
                >
                  {{ header }}
                </div>
              </div>
              <div
                v-for="order in orders"
                :key="order.id"
                class="grid px-0 py-4 border-b border-zinc-100 grid-cols-6"
              >
                <div class="text-sm text-zinc-500">{{ order.id }}</div>
                <div class="text-sm text-zinc-500">{{ order.datetime }}</div>
                <div class="text-sm text-zinc-500">{{ order.type }}</div>
                <div class="text-sm text-zinc-500">{{ order.employee }}</div>
                <div class="px-4 py-1.5 text-sm font-medium rounded-2xl text-zinc-500">
                  {{ order.status }}
                </div>
                <div class="text-sm text-zinc-500">{{ order.amount }}</div>
              </div>
            </div>
          </div>
          <!-- Versi Mobile (Kartu) -->
          <div v-else class="space-y-4">
            <div
              v-for="order in orders"
              :key="order.id"
              class="p-4 bg-gray-100 rounded-lg shadow-sm"
            >
              <div class="text-sm"><strong>Order ID:</strong> {{ order.id }}</div>
              <div class="text-sm"><strong>Date/Time:</strong> {{ order.datetime }}</div>
              <div class="text-sm"><strong>Order Type:</strong> {{ order.type }}</div>
              <div class="text-sm"><strong>Employee:</strong> {{ order.employee }}</div>
              <div class="text-sm"><strong>Status:</strong> {{ order.status }}</div>
              <div class="text-sm"><strong>Amount:</strong> {{ order.amount }}</div>
            </div>
          </div>
        </section>

        <!-- Profile Card -->
        <section class="p-4 text-center">
          <div class="mx-auto mb-5 bg-violet-200 rounded-full h-20 w-20"></div>
          <h2 class="mb-1.5 text-lg text-neutral-950">Aditya Ikhsan</h2>
          <p class="text-sm text-zinc-400">Admin</p>
        </section>

        <!-- Statistics Section -->
        <section class="mt-5 p-4 md:p-5">
          <h2 class="mb-5 text-xl">Overall Statistics</h2>
          <div class="flex gap-4 mb-5">
            <button
              v-for="tab in statisticsTabs"
              :key="tab"
              class="text-sm text-violet-300 cursor-pointer"
              :class="{ 'text-violet-600': activeTab === tab }"
              @click="activeTab = tab"
            >
              {{ tab }}
            </button>
          </div>
          <div class="mb-5 h-48 md:h-[200px] bg-gray-100 rounded flex items-center justify-center">
            <p class="text-center text-gray-500">Donut Chart</p>
          </div>
          <div class="flex flex-col gap-2.5">
            <div
              v-for="item in legendItems"
              :key="item.text"
              class="flex gap-2.5 items-center"
            >
              <div :class="['h-1 rounded-full w-6', item.colorClass]"></div>
              <div class="text-sm">{{ item.text }}</div>
            </div>
          </div>

          <!-- Chart Makanan -->
          <div class="mt-8">
            <div class="flex gap-2.5 items-center mb-5">
              <i class="ti ti-soup text-xl"></i>
              <h3 class="text-xs">Makanan</h3>
            </div>
            <div class="mb-5 h-40 md:h-[150px] bg-gray-100 rounded flex items-center justify-center">
              <p class="text-center text-gray-500">Bar Chart</p>
            </div>
            <div class="flex flex-col gap-2.5">
              <div
                v-for="item in foodItems"
                :key="item"
                class="flex gap-2.5 items-center"
              >
                <div class="h-1 rounded bg-slate-400 w-7"></div>
                <div class="text-sm">{{ item }}</div>
              </div>
            </div>
          </div>

          <!-- Chart Desserts -->
          <div class="mt-8">
            <div class="flex gap-2.5 items-center mb-5">
              <i class="ti ti-ice-cream text-xl"></i>
              <h3 class="text-xs">Desserts</h3>
            </div>
            <div class="mb-5 h-40 md:h-[150px] bg-gray-100 rounded flex items-center justify-center">
              <p class="text-center text-gray-500">Bar Chart</p>
            </div>
            <div class="flex flex-col gap-2.5">
              <div
                v-for="item in dessertItems"
                :key="item"
                class="flex gap-2.5 items-center"
              >
                <div class="h-1 rounded bg-slate-400 w-7"></div>
                <div class="text-sm">{{ item }}</div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";

// State untuk mengendalikan tampilan sidebar mobile
const isSidebarOpen = ref(false);

// Data menu (dengan properti 'active' dan 'isLogout')
const menuItems = [
  { id: "dashboard", icon: "dashboard", label: "Dashboard", active: true },
  { id: "transaction", icon: "receipt", label: "Transaksi", active: false },
  { id: "payment", icon: "credit-card", label: "Payment", active: false },
  { id: "logout", icon: "logout", label: "Logout", active: false, isLogout: true },
];

// Dashboard Cards
const dashboardCards = [
  {
    title: "Promosi berjalan",
    icon: "discount-2",
    items: [
      { name: "Nasgor ayam", value: "5%" },
      { name: "Magelangan", value: "3%" },
    ],
  },
  {
    title: "Jumlah order",
    icon: "shopping-cart",
    value: "300",
    valueType: "success",
    items: [
      { name: "Jumlah pendapatan", value: "$ 150" },
      { name: "Uang awal", value: "$ 150" },
    ],
  },
  {
    title: "Status stok",
    icon: "box",
    subtitle: "Aug 21, 2022",
    items: [
      { name: "All Item", value: "Aman", status: "success" },
      { name: "Kopi item", value: "Hampir Habis", status: "warning" },
      { name: "Gula", value: "Habis", status: "danger" },
    ],
  },
];

// Data Order Table
const tableHeaders = [
  "Order ID",
  "Date/Time",
  "Order Type",
  "Employee",
  "Status",
  "Amount",
];
const orders = [
  { id: "01015", datetime: "10:00 PM", type: "Regular", employee: "Masud Rana", status: "Complete", amount: "$ 250" },
  { id: "01016", datetime: "17 May 2022", type: "Regular", employee: "", status: "Pending", amount: "$ 250" },
  { id: "01017", datetime: "17 May 2022", type: "Regular", employee: "", status: "Complete", amount: "$ 250" },
  { id: "01018", datetime: "17 May 2022", type: "Regular", employee: "", status: "Complete", amount: "$ 250" },
  { id: "01015", datetime: "17 May 2022", type: "Regular", employee: "", status: "Complete", amount: "$ 250" },
  { id: "01015", datetime: "17 May 2022", type: "Regular", employee: "", status: "Complete", amount: "$ 250" },
];

// Statistics Data
const activeTab = ref("All");
const statisticsTabs = ["All", "Monthly", "Weekly", "Today"];
const legendItems = [
  { text: "Magelangan", colorClass: "bg-blue-500" },
  { text: "Omlet", colorClass: "bg-green-500" },
  { text: "Nasi goreng", colorClass: "bg-yellow-500" },
  { text: "Intel rebus", colorClass: "bg-red-500" },
];
const foodItems = ["Intel rebus", "Magelangan", "Omlet"];
const dessertItems = ["Big Mac", "Quarter Pounder with Cheese", "McDouble"];

// Responsiveness: Tentukan apakah layar mobile atau bukan
const isMobile = ref(false);
const checkScreenSize = () => {
  isMobile.value = window.innerWidth < 768;
  if (!isMobile.value) {
    isSidebarOpen.value = false;
  }
};

onMounted(() => {
  checkScreenSize();
  window.addEventListener("resize", checkScreenSize);
});
onUnmounted(() => {
  window.removeEventListener("resize", checkScreenSize);
});
</script>
