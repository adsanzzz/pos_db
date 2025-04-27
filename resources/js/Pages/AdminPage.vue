<template>
  <!-- Gunakan komponen Header -->
  <Header
      :showSidebar="showSidebar"
      @toggle-sidebar="showSidebar = !showSidebar"
      @toggle-profile="showProfile = !showProfile"
    />

  <!-- Sidebar -->
  <div
    :class="[
      'bg-gray-300 h-screen flex flex-col items-center pt-5 fixed left-0 top-16 z-40 transition-all duration-300',
      showSidebar ? 'w-48' : 'w-0 lg:w-48',
      showSidebar ? 'opacity-100' : 'opacity-0 lg:opacity-100'
    ]"
  >
    <div class="w-full flex flex-col gap-4 px-4 overflow-hidden">
      <a href="/AdminPage">
        <div
          :class="[
            'bg-purple-400 p-4 rounded-lg flex flex-col items-center cursor-pointer hover:bg-purple-300 transition-all duration-300',
            showSidebar ? 'transform-none' : 'transform -translate-x-full lg:transform-none'
          ]"
        >
          <img src="/images/stok.png" alt="Stok barang" class="w-8 h-8" />
          <span class="font-bold text-sm mt-2">Stok barang</span>
        </div>
      </a>

      <a href="Setting">
        <div
          :class="[
            'bg-purple-400 p-4 rounded-lg flex flex-col items-center cursor-pointer hover:bg-purple-300 transition-all duration-300',
            showSidebar ? 'transform-none' : 'transform -translate-x-full lg:transform-none'
          ]"
        >
          <img src="/images/sett.png" alt="Pengaturan" class="w-8 h-8">
          <span class="font-bold text-sm mt-2">Pengaturan</span>
        </div>
      </a>
    </div>
    <div 
      :class="[
        'mt-auto mb-20 bg-white p-4 rounded-lg flex flex-col items-center cursor-pointer hover:bg-gray-100 transition-all duration-300 mx-4',
        showSidebar ? 'transform-none' : 'transform -translate-x-full lg:transform-none',
        'transition-transform delay-200'
      ]"
    >
      <svg class="w-5 h-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg>
      <span class="font-bold text-sm mt-1">Logout</span>
    </div>
  </div>

  <!-- MAIN CONTENT -->
  <!-- Ditambahkan margin-top untuk menghindari header dan margin-left untuk menghindari sidebar (pada layar besar) -->
  <main class="p-6 flex-1 overflow-y-auto mt-16 lg:ml-48">
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
</template>

<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from "vue";
import Header from '../Components/Header.vue';

// Data menu (jika diperlukan)
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

// Checkbox: untuk menyimpan indeks item yang dipilih per section
const selectedItems = ref<number[][]>(sections.map(() => []));

// Fungsi untuk mengecek apakah semua item dalam satu section terpilih
const isAllSelected = (items: any[]) => {
  const sectionIndex = sections.findIndex((section) => section.items === items);
  return items.length === selectedItems.value[sectionIndex].length;
};

// Fungsi untuk toggle semua item dalam section
const toggleAll = (items: any[]) => {
  const sectionIndex = sections.findIndex((section) => section.items === items);
  if (isAllSelected(items)) {
    selectedItems.value[sectionIndex] = [];
  } else {
    selectedItems.value[sectionIndex] = items.map((_, index) => index);
  }
};

// Event Edit dan Delete
const editItem = (sectionIndex: number, itemIndex: number) => {
  console.log("Edit item:", sectionIndex, itemIndex);
};

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

// State untuk toggle sidebar dan profile
const showSidebar = ref(false);
const showProfile = ref(false);

// Fungsi untuk mengatur tampilan sidebar berdasarkan ukuran layar
const handleResize = () => {
  if (window.innerWidth < 1024) {
    showSidebar.value = false;
  } else {
    showSidebar.value = true;
  }
};

onMounted(() => {
  handleResize();
  window.addEventListener("resize", handleResize);
});

onBeforeUnmount(() => {
  window.removeEventListener("resize", handleResize);
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
