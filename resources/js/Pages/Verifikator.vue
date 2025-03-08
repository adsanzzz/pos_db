<template>
  <div class="flex min-h-screen bg-gray-50 text-[14px] font-sans">
    <!-- MOBILE SIDEBAR -->
    <transition name="slide">
      <div v-if="isSidebarOpen" class="fixed inset-0 z-50 flex lg:hidden">
        <!-- Overlay background -->
        <div class="fixed inset-0 bg-black opacity-50" @click="toggleSidebar"></div>
        <!-- Sidebar mobile -->
        <aside class="relative flex flex-col w-64 bg-white border-r border-gray-200">
          <!-- Header mobile sidebar -->
          <div class="flex items-center justify-between h-16 border-b border-gray-200 px-4">
            <h1 class="text-3xl font-bold text-purple-600">GWL</h1>
            <button @click="toggleSidebar">
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
                :class="{ 'bg-purple-50': item.active }"
                @click="item.isLogout ? logout() : null"
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
                  :class="{ 'text-red-500': item.isLogout }"
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
            :class="{ 'bg-purple-50': item.active }"
            @click="item.isLogout ? logout() : null"
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
              :class="{ 'text-red-500': item.isLogout }"
            >
              {{ item.label }}
            </span>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col">
      <!-- HEADER / TOPBAR -->
      <header class="flex items-center h-16 px-6 bg-white border-b border-gray-200">
        <!-- Tombol hamburger hanya untuk mobile -->
        <button class="lg:hidden mr-4" @click="toggleSidebar">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
        <span class="text-sm font-medium text-neutral-700 mr-4">
          Admin /
        </span>
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
        <div class="flex items-center gap-6 ml-auto">
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
          <div class="relative">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/180dad359c3d1c7280ef3ed80196856f0d64ea11"
              alt="Notification"
              class="w-6 h-6 object-cover"
            />
            <span class="absolute top-0 right-0 w-2 h-2 bg-green-500 border border-white rounded-full"></span>
          </div>
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
      <!-- CONTENT -->
      <main class="p-4">
        <div class="tabs flex gap-4 mb-4 border-b pb-2">
          <button
            :class="{ active: selectedTab === 'request' }"
            @click="selectedTab = 'request'"
            class="px-4 py-2 rounded-md transition-all duration-300 hover:bg-gray-200"
          >
            Request
          </button>
          <button
            :class="{ active: selectedTab === 'accepted' }"
            @click="selectedTab = 'accepted'"
            class="px-4 py-2 rounded-md transition-all duration-300 hover:bg-gray-200"
          >
            Accepted
          </button>
          <button
            :class="{ active: selectedTab === 'rejected' }"
            @click="selectedTab = 'rejected'"
            class="px-4 py-2 rounded-md transition-all duration-300 hover:bg-gray-200"
          >
            Rejected
          </button>
        </div>
        <div class="biodata-container bg-white p-4 rounded-md shadow-sm">
          <div class="biodata-grid grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <div
              v-for="(biodata, index) in filteredBiodata"
              :key="index"
              class="biodata-card p-4 bg-gray-50 rounded-md shadow-sm text-center transition-all duration-300 hover:shadow-md hover:scale-105"
            >
              <img
                src="/images/profile.png"
                alt="Profile"
                class="profile-img w-12 h-12 rounded-full mx-auto mb-2"
              />
              <h3 class="font-bold text-lg">{{ biodata.nama }}</h3>
              <p class="text-sm"><strong>NIK:</strong> {{ biodata.nik }}</p>
              <p class="text-sm">
                <strong>Email:</strong>
                <a :href="'mailto:' + biodata.email" class="text-blue-500 hover:underline">
                  {{ biodata.email }}
                </a>
              </p>
              <p class="text-sm"><strong>Nomor HP:</strong> {{ biodata.hp }}</p>
              <p class="text-sm"><strong>Alamat:</strong> {{ biodata.alamat }}</p>
              <div v-if="selectedTab === 'request'" class="button-group mt-2 flex justify-center gap-2">
                <button
                  class="accept-btn bg-green-500 text-white px-3 py-1 rounded-md transition-all duration-300 hover:bg-green-600"
                  @click="acceptRequest(index)"
                >
                  ✅ Accept
                </button>
                <button
                  class="reject-btn bg-red-500 text-white px-3 py-1 rounded-md transition-all duration-300 hover:bg-red-600"
                  @click="rejectRequest(index)"
                >
                  ❌ Reject
                </button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdminPage",
  data() {
    return {
      selectedTab: "request",
      isSidebarOpen: false,
      biodataList: Array(12).fill({
        nama: "Ahmed",
        nik: "3301216502050001",
        email: "ahmed@gmail.com",
        hp: "085441530959",
        alamat: "Jl. Halilintar No 121, RW01/RT07, Surakarta, Jawa Tengah",
        status: "request",
      }),
      menuItems: [
        {
          label: "Dashboard",
          icon: "/images/dashboard.png",
          active: true,
        },
        {
          label: "Helpdesk",
          icon: "/images/helpdesk.png",
          active: false,
        },
        {
          label: "Logout",
          icon: "/images/logout.png",
          active: false,
          isLogout: true,
        },
      ],
    };
  },
  computed: {
    filteredBiodata() {
      return this.biodataList.filter(
        (biodata) => biodata.status === this.selectedTab
      );
    },
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
