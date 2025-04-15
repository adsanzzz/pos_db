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
            <img src="/images/setting.png" alt="Pengaturan" class="w-8 h-8" />
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
  </template>
  
  <script>
  import { ref, onMounted, onBeforeUnmount } from "vue";
  import Header from "../Components/Header.vue";

  export default {
    components: {
      Header
    }
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
  