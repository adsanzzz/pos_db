<template>
  <header class="fixed top-0 left-0 w-full bg-white shadow-md p-4 flex items-center justify-between">
    <div class="flex items-center gap-x-6">
      <!-- Logo GWL -->
      <div class="text-2xl font-extrabold text-purple-600 tracking-wide pl-12">GWL</div>

      <!-- Image X -->
      <img class="pl-12 w-16" src="/images/x.png" alt="Dropdown" />

      <!-- Text Admin / -->
      <span class="text-gray-600 pl-1">Admin /</span>
    </div>

    <!-- Search Bar -->
    <div class="relative flex items-center">
      <input
        type="text"
        placeholder="Search..."
        class="bg-gray-100 rounded-md pl-4 pr-10 py-2 text-gray-500 w-64 focus:outline-none"
      />
      <img class="absolute right-3 top-1/2 -translate-y-1/2 w-5" src="/images/search.png" alt="Search Icon" />
    </div>

    <!-- Right Section (EN, Bell, Profile) -->
    <div class="flex items-center gap-x-6">
      <!-- Language Selector -->
      <div class="flex items-center gap-x-2 cursor-pointer">
        <span class="text-gray-500">En</span>
      </div>

      <!-- Notification Bell -->
      <div class="relative cursor-pointer">
        <img class="w-6" src="/images/belll.png" alt="Bell Icon" />
        <span class="absolute top-0 right-0 bg-green-500 text-white text-xs rounded-full px-1">3</span>
      </div>

      <!-- Profile Picture -->
      <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
        <img class="w-full h-full object-cover" src="/images/profile.png" alt="Profile" />
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header",
};
</script>
