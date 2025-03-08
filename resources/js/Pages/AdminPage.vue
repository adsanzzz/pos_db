<template>
  <div class="flex min-h-screen bg-gray-50 text-[14px] font-sans">
    <!-- MOBILE SIDEBAR -->
    <transition name="slide">
      <div v-if="isSidebarOpen" class="fixed inset-0 z-50 flex lg:hidden">
        <!-- Overlay background -->
        <div class="fixed inset-0 bg-black opacity-50" @click="isSidebarOpen = false"></div>
        <!-- Sidebar mobile -->
        <aside class="relative flex flex-col w-64 bg-white border-r border-gray-200">
          <!-- Header mobile sidebar -->
          <div class="flex items-center justify-between h-16 border-b border-gray-200 px-4">
            <h1 class="text-3xl font-bold text-purple-600">GWL</h1>
            <button @click="isSidebarOpen = false">
              <!-- Ikon close (X) -->
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <!-- Menu mobile -->
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

    <!-- SIDEBAR DESKTOP -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden lg:flex flex-col">
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

    <!-- MAIN CONTENT (TERMASUK HEADER) -->
    <div class="flex-1 flex flex-col">
      <!-- HEADER / TOPBAR -->
      <header class="flex items-center h-16 px-6 bg-white border-b border-gray-200 w-full">
        <!-- Tombol hamburger hanya untuk mobile -->
        <button class="lg:hidden mr-4" @click="isSidebarOpen = true">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
        <!-- Breadcrumb -->
        <span class="text-sm font-medium text-neutral-700 mr-4">
          Admin /
        </span>
        <!-- Search (disembunyikan di mobile) -->
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
        <!-- Header Right Icons -->
        <div class="flex items-center gap-6 ml-auto">
          <!-- Language -->
          <div class="flex items-center gap-1 text-base text-zinc-500">
            <span>En</span>
            <svg
              width="25"
              height="24"
              viewBox="0 0 25 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                opacity="0.8"
                d="M11.4614 15.8744C11.3418 15.8744 11.2261 15.852 11.1143 15.8072C11.0019 15.7623 10.9084 15.7025 10.8336 15.6278L6.70806 11.5022C6.54364 11.3378 6.46143 11.1285 6.46143 10.8744C6.46143 10.6203 6.54364 10.4111 6.70806 10.2466C6.87249 10.0822 7.08175 10 7.33587 10C7.58998 10 7.79924 10.0822 7.96367 10.2466L11.4614 13.7444L14.9592 10.2466C15.1236 10.0822 15.3329 10 15.587 10C15.8411 10 16.0504 10.0822 16.2148 10.2466C16.3792 10.4111 16.4614 10.6203 16.4614 10.8744C16.4614 11.1285 16.3792 11.3378 16.2148 11.5022L12.0892 15.6278C11.9995 15.7175 11.9024 15.7809 11.7977 15.8179C11.6931 15.8556 11.581 15.8744 11.4614 15.8744Z"
                fill="#828282"
              />
            </svg>
          </div>
          <!-- Notification -->
          <div class="relative">
            <img
              :src="'https://cdn.builder.io/api/v1/image/assets/TEMP/180dad359c3d1c7280ef3ed80196856f0d64ea11'"
              alt="Notification"
              class="w-6 h-6 object-cover"
            />
            <span
              class="absolute top-0 right-0 w-2 h-2 bg-green-500 border border-white rounded-full"
            ></span>
          </div>
          <!-- User Avatar -->
          <button class="relative w-10 h-10 flex items-center justify-center bg-gray-200 rounded-full overflow-hidden">
            <svg
              width="49"
              height="48"
              viewBox="0 0 49 48"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="24.8726" cy="24" r="24" fill="#9CC4F3" fill-opacity="0.2" />
            </svg>
          </button>
        </div>
      </header>

      <!-- MAIN CONTENT -->
      <main class="p-6 flex-1 overflow-y-auto">
        <section
          v-for="(section, index) in sections"
          :key="index"
          class="mb-8"
        >
          <!-- Title & Action Buttons -->
          <div class="flex items-center mb-4">
            <h2 class="text-xl font-semibold text-zinc-900">
              {{ section.title }}
            </h2>
            <!-- Tombol Tambah & Export hanya di section pertama -->
            <div v-if="index === 0" class="ml-auto flex gap-4">
              <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                Tambah
              </button>
              <button class="flex items-center gap-2 px-4 py-2 bg-gray-200 text-zinc-900 rounded hover:bg-gray-300 transition">
                <span>Export</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <path
                    d="M3.35225 5.97725C3.55195 5.77755 3.86445 5.7594 4.08466 5.92279L4.14775 5.97725L9 10.8293L13.8523 5.97725C14.052 5.77755 14.3645 5.7594 14.5847 5.92279L14.6477 5.97725C14.8474 6.17695 14.8656 6.48945 14.7022 6.70966L14.6477 6.77275L9.39775 12.0227C9.19805 12.2224 8.88555 12.2406 8.66534 12.0772L8.60225 12.0227L3.35225 6.77275C3.13258 6.55308 3.13258 6.19692 3.35225 5.97725Z"
                    fill="#1A1D1F"
                    stroke="#1A1D1F"
                    stroke-width="0.6"
                  />
                </svg>
              </button>
            </div>
          </div>

          <!-- Tabel Data -->
          <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full table-auto">
              <thead class="bg-gray-100 text-gray-700">
                <tr>
                  <th class="p-4 w-10 text-left">
                    <input
                      type="checkbox"
                      @change="toggleAll(section.items)"
                      :checked="isAllSelected(section.items)"
                      class="form-checkbox"
                    />
                  </th>
                  <th
                    v-for="header in section.headers"
                    :key="header"
                    class="p-4 text-sm font-semibold text-left"
                  >
                    {{ header }}
                  </th>
                  <th class="p-4 w-24"></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr
                  v-for="(item, itemIndex) in section.items"
                  :key="itemIndex"
                  class="hover:bg-gray-50 transition"
                >
                  <td class="p-4">
                    <input
                      type="checkbox"
                      v-model="selectedItems[index]"
                      :value="itemIndex"
                      class="form-checkbox"
                    />
                  </td>
                  <td class="p-4 text-sm text-gray-700">{{ item.name }}</td>
                  <td class="p-4 text-sm text-gray-700">{{ item.amount }}</td>
                  <td class="p-4 text-sm text-gray-700">
                    <div class="flex gap-2">
                      <button
                        class="text-blue-500 hover:text-blue-700"
                        @click="editItem(index, itemIndex)"
                      >
                        <i class="ti ti-edit"></i>
                      </button>
                      <button
                        class="text-red-500 hover:text-red-700"
                        @click="deleteItem(index, itemIndex)"
                      >
                        <i class="ti ti-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <!-- Pagination -->
            <div class="p-4 flex items-center justify-between text-sm text-gray-700">
              <span>
                {{ currentPage }} of {{ totalPages }}
              </span>
              <div class="flex items-center gap-4">
                <button
                  :disabled="currentPage === 1"
                  @click="prevPage"
                  class="disabled:opacity-30 hover:text-gray-900"
                >
                  <i class="ti ti-chevron-left"></i>
                </button>
                <button
                  :disabled="currentPage === totalPages"
                  @click="nextPage"
                  class="disabled:opacity-30 hover:text-gray-900"
                >
                  <i class="ti ti-chevron-right"></i>
                </button>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

// Data menu
const menuItems = [
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/ad33659c33381eac40061641b81f19d65a13ad9f",
    label: "Stok barang",
    active: true,
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/d7312a633a422067156b1c1a7fd72f177cf68f4d",
    label: "Produk",
    active: false,
  },
  {
    icon: "https://cdn.builder.io/api/v1/image/assets/TEMP/180dad359c3d1c7280ef3ed80196856f0d64ea11",
    label: "Pengaturan",
    active: false,
  },
  {
    icon: "logout",
    label: "Logout",
    active: false,
    isLogout: true,
  },
];

// Data sections & table
const sections = [
  {
    title: "Kategori makanan",
    headers: ["Nama Barang", "Jumlah"],
    items: [
      { name: "Smirnoff Ice", amount: 3 },
      { name: "Rosewood Origin", amount: 2 },
      { name: "Jack Daniels", amount: 2 },
      { name: "Belvedere", amount: 5 },
      { name: "Gulder", amount: 5 },
      { name: "Heineken", amount: 6 },
    ],
  },
  {
    title: "Kategori minuman",
    headers: ["Nama Barang", "Jumlah"],
    items: [
      { name: "Smirnoff Ice", amount: 3 },
      { name: "Rosewood Origin", amount: 2 },
      { name: "Jack Daniels", amount: 2 },
    ],
  },
];

// Pagination
const currentPage = ref(1);
const totalPages = 1;

// Untuk checkbox
const selectedItems = ref<number[][]>(sections.map(() => []));

// Cek apakah semua item di satu section terpilih
const isAllSelected = (items: any[]) => {
  const sectionIndex = sections.findIndex((section) => section.items === items);
  return items.length === selectedItems.value[sectionIndex].length;
};

// Toggle semua item
const toggleAll = (items: any[]) => {
  const sectionIndex = sections.findIndex((section) => section.items === items);
  if (isAllSelected(items)) {
    selectedItems.value[sectionIndex] = [];
  } else {
    selectedItems.value[sectionIndex] = items.map((_, index) => index);
  }
};

// Event Edit
const editItem = (sectionIndex: number, itemIndex: number) => {
  console.log("Edit item:", sectionIndex, itemIndex);
};

// Event Delete
const deleteItem = (sectionIndex: number, itemIndex: number) => {
  console.log("Delete item:", sectionIndex, itemIndex);
};

// Event pagination
const prevPage = () => {
  if (currentPage.value > 1) currentPage.value--;
};
const nextPage = () => {
  if (currentPage.value < totalPages) currentPage.value++;
};

// Mobile sidebar toggle
const isSidebarOpen = ref(false);

onMounted(() => {
  window.addEventListener("resize", () => {
    // Logika khusus saat resize jika diperlukan
  });
});
</script>

<style scoped>
/* Tailwind sudah meng-handle styling utama */
/* Transition untuk mobile sidebar */
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease;
}
.slide-enter-from,
.slide-leave-to {
  transform: translateX(-100%);
}
</style>
