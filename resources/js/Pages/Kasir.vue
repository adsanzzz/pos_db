<template>
    <div class="flex min-h-screen bg-slate-50 max-md:flex-col">
      <!-- Mobile Header untuk toggle sidebar -->
      <div class="md:hidden p-5 bg-white flex items-center justify-between">
        <button @click="toggleSidebar" class="text-2xl">
          <i :class="`ti ti-${showSidebar ? 'close' : 'menu'}`"></i>
        </button>
        <h1 class="text-xl font-bold">GWL</h1>
        <div></div>
      </div>
  
      <!-- Sidebar -->
      <nav
        :class="[
          'flex flex-col gap-5 p-5 bg-white w-[250px] max-md:p-2.5 max-md:w-full',
          isMobile ? (showSidebar ? 'block' : 'hidden') : 'block'
        ]"
      >
        <h1 class="mb-10 text-3xl">GWL</h1>
        <button
          v-for="item in navItems"
          :key="item.id"
          class="flex flex-col items-center p-5 rounded-md cursor-pointer hover:bg-slate-50"
          :class="{ 'bg-slate-50': activeNav === item.id }"
          @click="activeNav = item.id"
        >
          <i :class="`ti ti-${item.icon} text-2xl`"></i>
          <span class="mt-2.5 text-sm font-medium text-neutral-700">{{ item.label }}</span>
        </button>
      </nav>
  
      <!-- Main Content -->
      <main class="flex-1 p-5">
        <!-- Header -->
        <header class="flex items-center p-5 mb-5 bg-white max-sm:flex-col max-sm:gap-2.5 max-sm:items-start">
          <nav class="mr-5 text-sm text-neutral-700">Admin /</nav>
          <div class="flex-1 mx-5 my-0">
            <input
              type="text"
              placeholder="Search"
              class="px-5 py-0 rounded-xl bg-stone-50 border-none h-[46px] w-[359px] max-sm:w-full"
            />
          </div>
          <div class="flex gap-5 items-center">
            <div class="flex gap-1.5 items-center text-base text-zinc-500">
              <span>En</span>
              <i class="ti ti-chevron-down"></i>
            </div>
            <div class="relative">
              <i class="ti ti-bell"></i>
              <div class="absolute top-0 right-0 w-1.5 h-1.5 bg-green-500 rounded-full border-white border-solid border-[0.7px]"></div>
            </div>
            <div class="w-12 h-12 bg-blue-300 rounded-full opacity-20"></div>
          </div>
        </header>
  
        <!-- Dashboard Cards -->
        <section class="flex gap-5 mb-5 max-sm:flex-col">
          <article
            v-for="card in dashboardCards"
            :key="card.title"
            class="flex-1 p-5 bg-white rounded-2xl border border-solid shadow-sm border-zinc-100"
          >
            <i :class="`ti ti-${card.icon} text-2xl mb-3`"></i>
            <h3 class="mb-5 text-sm font-semibold text-neutral-700">{{ card.title }}</h3>
            <p v-if="card.subtitle" class="text-sm text-gray-500">{{ card.subtitle }}</p>
            <p
              v-if="card.value"
              :class="[ 'text-xl font-bold', card.valueType && `text-${card.valueType}` ]"
            >
              {{ card.value }}
            </p>
            <div class="flex flex-col gap-2.5">
              <div v-for="(item, index) in card.items" :key="index" class="flex justify-between text-xs">
                <span class="text-neutral-700">{{ item.name }}</span>
                <span :class="[ 'text-gray-700 text-opacity-70', item.status && `text-${item.status}` ]">
                  {{ item.value }}
                </span>
              </div>
            </div>
          </article>
        </section>
  
        <!-- Order Table -->
        <section class="p-5 bg-white rounded-2xl">
          <h2 class="mb-5 text-2xl text-slate-950">Order List</h2>
          <div class="overflow-x-auto">
            <div class="min-w-[600px]">
              <div class="grid px-0 py-4 border-b border-solid border-b-zinc-100 grid-cols-6 max-sm:text-xs">
                <div v-for="header in tableHeaders" :key="header" class="text-sm text-zinc-800">
                  {{ header }}
                </div>
              </div>
              <div
                v-for="order in orders"
                :key="order.id"
                class="grid px-0 py-4 border-b border-solid border-b-zinc-100 grid-cols-6 max-sm:text-xs"
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
        </section>
      </main>
  
      <!-- Right Sidebar (Hanya tampil pada layar besar) -->
      <aside class="p-5 ml-5 bg-white rounded-2xl w-[300px] max-md:mt-5 max-md:w-full hidden lg:block">
        <!-- Profile Card -->
        <section class="p-5 text-center">
          <div class="mx-auto mt-0 mb-5 bg-violet-200 rounded-full h-[84px] w-[87px]"></div>
          <h2 class="mb-1.5 text-lg text-neutral-950">Aditya Ikhsan</h2>
          <p class="text-sm text-zinc-400">Admin</p>
        </section>
  
        <!-- Statistics Section -->
        <section class="mt-5">
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
  
          <div class="mb-5 h-[200px] bg-gray-100 rounded">
            <!-- Donut chart placeholder -->
            <p class="text-center pt-20 text-gray-500">Donut Chart</p>
          </div>
  
          <div class="flex flex-col gap-2.5">
            <div v-for="item in legendItems" :key="item.text" class="flex gap-2.5 items-center">
              <div :class="['h-[7px] rounded-full w-[19px]', item.colorClass]"></div>
              <div>{{ item.text }}</div>
            </div>
          </div>
  
          <div class="mt-8">
            <div class="flex gap-2.5 items-center mb-5">
              <i class="ti ti-soup text-xl"></i>
              <h3 class="text-xs">Makanan</h3>
            </div>
            <div class="mb-5 h-[150px] bg-gray-100 rounded">
              <!-- Bar chart placeholder -->
              <p class="text-center pt-10 text-gray-500">Bar Chart</p>
            </div>
            <div class="flex flex-col gap-2.5">
              <div v-for="item in foodItems" :key="item" class="flex gap-2.5 items-center">
                <div class="h-1 rounded bg-slate-400 w-[29px]"></div>
                <div>{{ item }}</div>
              </div>
            </div>
          </div>
  
          <div class="mt-8">
            <div class="flex gap-2.5 items-center mb-5">
              <i class="ti ti-ice-cream text-xl"></i>
              <h3 class="text-xs">Desserts</h3>
            </div>
            <div class="mb-5 h-[150px] bg-gray-100 rounded">
              <!-- Bar chart placeholder -->
              <p class="text-center pt-10 text-gray-500">Bar Chart</p>
            </div>
            <div class="flex flex-col gap-2.5">
              <div v-for="item in dessertItems" :key="item" class="flex gap-2.5 items-center">
                <div class="h-1 rounded bg-slate-400 w-[29px]"></div>
                <div>{{ item }}</div>
              </div>
            </div>
          </div>
        </section>
      </aside>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  import NavigationHeader from "../Components/NavigationHeader.vue";
  
  // Navigation
  const activeNav = ref("dashboard");
  const navItems = [
    { id: "dashboard", icon: "dashboard", label: "Dashboard" },
    { id: "transaction", icon: "receipt", label: "Transaksi" },
    { id: "payment", icon: "credit-card", label: "Payment" },
    { id: "logout", icon: "logout", label: "Logout" },
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
  
  // Order Table
  const tableHeaders = [
    "Order ID",
    "Date/Time",
    "Order Type",
    "Employee",
    "Status",
    "Amount",
  ];
  const orders = [
    {
      id: "01015",
      datetime: "10:00 PM",
      type: "Regular",
      employee: "Masud Rana",
      status: "Complete",
      amount: "$ 250",
    },
    {
      id: "01016",
      datetime: "17 May 2022",
      type: "Regular",
      employee: "",
      status: "Pending",
      amount: "$ 250",
    },
    {
      id: "01017",
      datetime: "17 May 2022",
      type: "Regular",
      employee: "",
      status: "Complete",
      amount: "$ 250",
    },
    {
      id: "01018",
      datetime: "17 May 2022",
      type: "Regular",
      employee: "",
      status: "Complete",
      amount: "$ 250",
    },
    {
      id: "01015",
      datetime: "17 May 2022",
      type: "Regular",
      employee: "",
      status: "Complete",
      amount: "$ 250",
    },
    {
      id: "01015",
      datetime: "17 May 2022",
      type: "Regular",
      employee: "",
      status: "Complete",
      amount: "$ 250",
    },
  ];
  
  // Statistics
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
  
  // Mobile Sidebar Toggle
  const showSidebar = ref(false);
  const isMobile = ref(false);
  
  const checkScreenSize = () => {
    isMobile.value = window.innerWidth < 768;
    if (!isMobile.value) {
      showSidebar.value = true;
    }
  };
  
  const toggleSidebar = () => {
    showSidebar.value = !showSidebar.value;
  };
  
  onMounted(() => {
    checkScreenSize();
    window.addEventListener("resize", checkScreenSize);
  });
  </script>
  