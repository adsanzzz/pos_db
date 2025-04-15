<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Gunakan komponen Header -->
    <Header
      :showSidebar="showSidebar"
      @toggle-sidebar="showSidebar = !showSidebar"
      @toggle-profile="showProfile = !showProfile"
    />
    
    <!-- Main Container -->
    <div class="flex pt-4">
      <!-- Sidebar -->
      <div
        :class="[
          'bg-gray-300 h-screen flex flex-col items-center pt-5 fixed left-0 top-16 z-40 transition-all duration-300',
          showSidebar ? 'w-48' : 'w-0 lg:w-48',
          showSidebar ? 'opacity-100' : 'opacity-0 lg:opacity-100'
        ]"
      >
        <div class="w-full flex flex-col gap-4 px-4 overflow-hidden">
          <a href="/Verifikator">
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
          </a>

          <a href="/Helpdesk">
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
          </a>
        </div>

        <!-- Tombol Logout -->
        <div 
          :class="[
            'mt-auto mb-20 bg-white p-4 rounded-lg flex flex-col items-center cursor-pointer hover:bg-gray-100 transition-all duration-300 mx-4',
            showSidebar ? 'transform-none' : 'transform -translate-x-full lg:transform-none',
            'transition-transform delay-200'
          ]"
          @click="logout"
        >
          <svg class="w-5 h-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
          <span class="font-bold text-sm mt-1">Logout</span>
        </div>
      </div>

      <!-- Konten Utama -->
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

          <!-- Daftar Biodata -->
          <div class="bg-white p-4 rounded-lg shadow max-h-[calc(100vh-180px)] overflow-y-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              <div
                v-for="(biodata, index) in filteredBiodataList"
                :key="biodata.id"
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
                <p class="text-sm text-gray-700 truncate" :title="biodata.alamat">
                  <strong>Alamat:</strong> {{ biodata.alamat }}
                </p>
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
            
            <!-- Tampilan kosong jika tidak ada data -->
            <div v-if="filteredBiodataList.length === 0" class="text-center py-8">
              <svg class="w-16 h-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <p class="text-gray-500 mt-4">No items to display in this category</p>
            </div>
          </div>
        </div>

        <!-- Profil Admin (untuk layar besar) -->
        <div class="hidden lg:block w-64 bg-gray-200 rounded-lg p-4 text-center fixed right-3 top-24">
          <img
            src="/images/profile.png"
            class="w-20 h-20 rounded-full mx-auto border-4 border-white mb-3"
            alt="Profile Petugas"
          />
          <h3 class="font-bold text-lg">{{ petugas.nama }}</h3>
          <p class="text-gray-600">{{ petugas.role }}</p>
        </div>

        <!-- Modal Profil Mobile -->
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
import Header from '../Components/Header.vue';

export default {
  name: "Verifikator",
  components: {
    Header
  },
  data() {
    return {
      selectedTab: "request",
      showSidebar: window.innerWidth >= 1024,
      showProfile: false,
      allBiodata: Array(12)
        .fill()
        .map((_, index) => ({
          id: index + 1,
          nama: `Ahmed ${index + 1}`,
          nik: `33012165020${index.toString().padStart(4, "0")}`,
          email: `ahmed${index + 1}@gmail.com`,
          hp: `08544153095${index % 10}`,
          alamat: `Alamat ${index + 1}`,
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
    handleResize() {
      if (window.innerWidth < 1024) {
        this.showSidebar = false;
      }
    },
    acceptRequest(index) {
      this.allBiodata[index].status = "accepted";
      alert(`Permohonan ${this.allBiodata[index].nama} diterima!`);
    },
    rejectRequest(index) {
      this.allBiodata[index].status = "rejected";
      alert(`Permohonan ${this.allBiodata[index].nama} ditolak!`);
    },
    logout() {
      alert("Anda telah logout!");
      // Tambahkan logika logout sesuai kebutuhan, misalnya redirect ke halaman login
    }
  },
  mounted() {
    window.addEventListener("resize", this.handleResize);
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.handleResize);
  }
};
</script>

<style scoped>
/* Tambahkan styling tambahan jika diperlukan */
</style>
