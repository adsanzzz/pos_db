<template>
<<<<<<< HEAD
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
=======
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
>>>>>>> 268c62aa899df051bbfe10895bdb444a369b1dda
    </div>
  </div>
</template>

<script>
export default {
<<<<<<< HEAD
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
=======
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
>>>>>>> 268c62aa899df051bbfe10895bdb444a369b1dda
  },
  methods: {
    toggleSidebar() {
      this.isSidebarOpen = !this.isSidebarOpen;
    },
    acceptRequest(index) {
<<<<<<< HEAD
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
=======
      const biodata = this.filteredBiodataList[index];
      biodata.status = "accepted";
      alert(`Permohonan ${biodata.nama} diterima!`);
    },
    rejectRequest(index) {
      const biodata = this.filteredBiodataList[index];
      biodata.status = "rejected";
      alert(`Permohonan ${biodata.nama} ditolak!`);
    },
    handleResize() {
      // Jika lebar layar kurang dari 1024px, tutup sidebar secara otomatis
      if (window.innerWidth < 1024) {
        this.showSidebar = false;
      } else {
        this.showSidebar = true;
      }
    }
>>>>>>> 268c62aa899df051bbfe10895bdb444a369b1dda
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
<<<<<<< HEAD
/* Aturan khusus tambahan (jika diperlukan) */
/* Contoh: Mengatur tampilan tab aktif */
.tabs button.active {
  background: #6a0dad;
  color: #fff;
=======
/* Custom scrollbar */
::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}
::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
}
::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
  background: #555;
>>>>>>> 268c62aa899df051bbfe10895bdb444a369b1dda
}
</style>
