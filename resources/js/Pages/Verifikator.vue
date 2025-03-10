<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-white shadow-md p-3 md:p-4 flex items-center justify-between z-50">
      <!-- Left section dengan toggle dan logo -->
      <div class="flex items-center gap-x-2 md:gap-x-4">
        <!-- Mobile Sidebar Toggle (dipindah ke header) -->
        <button
          @click="showSidebar = !showSidebar"
          class="lg:hidden flex items-center justify-center text-gray-700 p-1 rounded-md hover:bg-gray-100"
        >
          <svg v-if="!showSidebar" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg v-else class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        
        <!-- Logo GWL -->
        <div class="text-xl md:text-2xl font-extrabold text-purple-600 tracking-wide">GWL</div>
        <!-- Image X (Hidden on mobile) -->
        <img class="hidden md:block w-8 md:w-10" src="/images/x.png" alt="Dropdown" />
        <!-- Text Admin / (Hidden on small screens) -->
        <span class="hidden sm:inline text-gray-600">Admin /</span>
      </div>

      <!-- Search Bar (Tampil pada semua ukuran layar) -->
      <div class="flex relative items-center">
        <input
          type="text"
          placeholder="Search..."
          class="bg-gray-100 rounded-md pl-4 pr-10 py-2 text-gray-500 w-40 lg:w-64 focus:outline-none"
        />
        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>

      <!-- Right Section (EN, Bell, Profile) -->
      <div class="flex items-center gap-x-2 md:gap-x-6">
        <!-- Language Selector (Hidden on mobile) -->
        <div class="hidden md:flex items-center gap-x-2 cursor-pointer">
          <span class="text-gray-500">En</span>
        </div>

        <!-- Notification Bell -->
        <div class="relative cursor-pointer">
          <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="absolute top-0 right-0 bg-green-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
        </div>

        <!-- Profile Toggle (Untuk mobile) -->
        <div 
          @click="showProfile = !showProfile"
          class="lg:hidden cursor-pointer"
        >
          <svg class="w-5 h-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>

        <!-- Profile Picture -->
        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-200 overflow-hidden">
          <img class="w-full h-full object-cover" src="/images/profile.png" alt="Profile" />
        </div>
      </div>
    </header>

    <!-- Main Container -->
    <div class="flex pt-3">
      <!-- Sidebar (Responsive) -->
      <div
        :class="[
          'bg-gray-300 h-screen flex flex-col items-center pt-5 fixed left-0 top-16 z-40 transition-all duration-300',
          showSidebar ? 'w-48' : 'w-0 lg:w-48',
          showSidebar ? 'opacity-100' : 'opacity-0 lg:opacity-100'
        ]"
      >
        <div class="w-full flex flex-col gap-4 px-4 overflow-hidden">
          <div
            :class="[
              'bg-purple-400 p-4 rounded-lg flex flex-col items-center cursor-pointer hover:bg-purple-300 transition-all duration-300',
              showSidebar ? 'transform-none' : 'transform -translate-x-full lg:transform-none'
            ]"
          >
            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <span class="font-bold text-sm mt-2">Dashboard</span>
          </div>
          <div
            :class="[
              'bg-purple-400 p-4 rounded-lg flex flex-col items-center cursor-pointer hover:bg-purple-300 transition-all duration-300',
              showSidebar ? 'transform-none' : 'transform -translate-x-full lg:transform-none',
              'transition-transform delay-100'
            ]"
          >
            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="font-bold text-sm mt-2">Helpdesk</span>
          </div>
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

      <!-- Main Content -->
      <div class="w-full transition-all duration-300" :class="{'lg:ml-48': true, 'ml-0': !showSidebar}">
        <div class="px-6 lg:mr-64 mt-1 pb-6 flex-1 overflow-auto">
          <!-- Tab Navigation -->
          <div class="sticky top-10 bg-white py-9 z-10 flex gap-2 overflow-x-auto border-b-5 mb-6">
            <button
              @click="selectedTab = 'request'"
              :class="[
                'px-3 py-2 rounded-md font-bold whitespace-nowrap',
                selectedTab === 'request' ? 'bg-purple-700 text-white' : 'bg-gray-200'
              ]"
            >
              Request
            </button>
            <button
              @click="selectedTab = 'accepted'"
              :class="[
                'px-3 py-2 rounded-md font-bold whitespace-nowrap',
                selectedTab === 'accepted' ? 'bg-purple-700 text-white' : 'bg-gray-200'
              ]"
            >
              Accepted
            </button>
            <button
              @click="selectedTab = 'rejected'"
              :class="[
                'px-3 py-2 rounded-md font-bold whitespace-nowrap',
                selectedTab === 'rejected' ? 'bg-purple-700 text-white' : 'bg-gray-200'
              ]"
            >
              Rejected
            </button>
          </div>

          <!-- Biodata List -->
          <div class="bg-white p-4 rounded-lg shadow max-h-[calc(100vh-180px)] overflow-y-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              <div
                v-for="(biodata, index) in filteredBiodataList"
                :key="index"
                class="bg-gray-100 p-4 rounded-lg shadow text-center transition-all duration-200 hover:shadow-md"
              >
                <img src="/images/profile.png" class="w-12 h-12 rounded-full mx-auto mb-3" alt="Profile" />
                <h3 class="font-bold">{{ biodata.nama }}</h3>
                <p class="text-sm"><strong>NIK:</strong> {{ biodata.nik }}</p>
                <p class="text-sm">
                  <strong>Email:</strong>
                  <a :href="'mailto:' + biodata.email" class="text-blue-500">{{ biodata.email }}</a>
                </p>
                <p class="text-sm"><strong>Nomor HP:</strong> {{ biodata.hp }}</p>
                <p class="text-sm text-gray-700 truncate" :title="biodata.alamat"><strong>Alamat:</strong> {{ biodata.alamat }}</p>
                <div class="flex gap-2 justify-center mt-3">
                  <button
                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 text-sm transition-colors"
                    @click="acceptRequest(index)"
                  >
                    ✅ Accept
                  </button>
                  <button
                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm transition-colors"
                    @click="rejectRequest(index)"
                  >
                    ❌ Reject
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Empty state ketika tidak ada data -->
            <div v-if="filteredBiodataList.length === 0" class="text-center py-8">
              <svg class="w-16 h-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="text-gray-500 mt-4">No items to display in this category</p>
            </div>
          </div>
        </div>

        <!-- Admin Profile (Responsive) -->
        <div class="hidden lg:block w-64 bg-gray-200 rounded-lg p-4 text-center fixed right-3 top-24">
          <img
            src="/images/profile.png"
            class="w-20 h-20 rounded-full mx-auto border-4 border-white mb-3"
            alt="Profile Petugas"
          />
          <h3 class="font-bold text-lg">{{ petugas.nama }}</h3>
          <p class="text-gray-600">{{ petugas.role }}</p>
        </div>

        <!-- Mobile Profile (Hidden by default) -->
        <div
          :class="[
            'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center transition-opacity duration-300',
            showProfile ? 'opacity-100' : 'opacity-0 pointer-events-none'
          ]"
          @click="showProfile = false"
        >
          <div 
            class="bg-white p-6 rounded-lg w-64 text-center transform transition-transform duration-300"
            :class="[showProfile ? 'scale-100' : 'scale-90']"
            @click.stop
          >
            <img
              src="/images/profile.png"
              class="w-24 h-24 rounded-full mx-auto border-4 border-purple-200 mb-4"
              alt="Profile Petugas"
            />
            <h3 class="font-bold text-xl">{{ petugas.nama }}</h3>
            <p class="text-gray-600 mb-4">{{ petugas.role }}</p>
            <button @click="showProfile = false" class="bg-purple-600 text-white px-4 py-2 rounded-lg w-full">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdminDashboard",
  data() {
    return {
      selectedTab: "request",
      showSidebar: false,
      showProfile: false,
      allBiodata: Array(12)
        .fill()
        .map((_, index) => ({
          id: index + 1,
          nama: `Ahmed ${index + 1}`,
          nik: `33012165020${index.toString().padStart(4, "0")}`,
          email: `ahmed${index + 1}@gmail.com`,
          hp: `08544153095${index % 10}`,
          // Mengatur status default. Contoh: semua data awalnya memiliki status 'request'
          status: "request"
        })),
      petugas: {
        nama: "Aditya Ikhsan",
        role: "Admin"
      }
    };
  },
  computed: {
    filteredBiodataList() {
      return this.allBiodata.filter(item => item.status === this.selectedTab);
    }
  },
  methods: {
    toggleSidebar() {
      this.isSidebarOpen = !this.isSidebarOpen;
    },
    acceptRequest(index) {
      this.biodataList[index].status = "accepted";
      alert(`Permohonan ${this.biodataList[index].nama} diterima!`);
    },
    rejectRequest(index) {
      this.biodataList[index].status = "rejected";
      alert(`Permohonan ${this.biodataList[index].nama} ditolak!`);
    },
    logout() {
      alert("Anda telah logout!");
      // Tambahkan logika logout di sini, misalnya redirect ke halaman login
    },
  },
  mounted() {
    // Set sidebar berdasarkan lebar layar awal
    this.showSidebar = window.innerWidth >= 1024;
    window.addEventListener("resize", this.handleResize);
  },
  beforeDestroy() { // Gunakan beforeUnmount() jika memakai Vue 3
    window.removeEventListener("resize", this.handleResize);
  }
};
</script>

<style scoped>
/* Aturan khusus tambahan (jika diperlukan) */
/* Contoh: Mengatur tampilan tab aktif */
.tabs button.active {
  background: #6a0dad;
  color: #fff;
}
</style>
