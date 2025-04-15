<template>
    <header class="fixed top-0 left-0 w-full bg-white shadow-md p-3 md:p-4 flex items-center justify-between z-50">
      <!-- Konten header seperti toggle, logo, search bar, notifikasi, dan profile -->
      <div class="flex items-center gap-x-2 md:gap-x-4">
        <button @click="$emit('toggle-sidebar')" class="lg:hidden flex items-center justify-center text-gray-700 p-1 rounded-md hover:bg-gray-100">
          <svg v-if="!showSidebar" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg v-else class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <div class="text-xl md:text-2xl font-extrabold text-purple-600 tracking-wide pl-4">GWL</div>
        <span class="hidden sm:inline text-gray-600 pl-28">Admin /</span>
      </div>
      <!-- Search Bar -->
      <div class="flex relative items-center">
        <input type="text" placeholder="Search..." class="bg-gray-100 rounded-md pl-4 pr-10 py-2 text-gray-500 w-40 lg:w-64 focus:outline-none" />
        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>
      <!-- Right Section -->
      <div class="flex items-center gap-x-2 md:gap-x-6">
        <div class="hidden md:flex items-center gap-x-2 cursor-pointer">
          <span class="text-gray-500">En</span>
        </div>
        <div class="relative cursor-pointer">
          <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="absolute top-0 right-0 bg-green-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
        </div>
        <div @click="$emit('toggle-profile')" class="lg:hidden cursor-pointer">
          <svg class="w-5 h-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-200 overflow-hidden">
          <img class="w-full h-full object-cover" src="/images/profile.png" alt="Profile" />
        </div>
      </div>
    </header>
  </template>
  
  <script>
  export default {
    name: "Header",
    props: {
      showSidebar: {
        type: Boolean,
        default: false
      }
    }
  };
  </script>
  