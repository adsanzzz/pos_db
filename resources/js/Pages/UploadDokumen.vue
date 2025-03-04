<template>
    <main class="flex justify-center items-center p-5 min-h-screen bg-white">
      <article class="bg-white rounded-xl shadow-md w-full max-w-3xl p-8 md:p-16">
        <div class="w-full max-w-md mx-auto">
          <h1 class="mb-4 text-4xl font-bold text-center text-zinc-800 sm:text-3xl">
            Verification
          </h1>
          <p class="mb-7 text-base text-center text-zinc-800 text-opacity-80 sm:text-sm">
            Let's get you all set up so you can access your personal account.
          </p>
  
          <!-- Upload Section -->
          <section class="flex flex-col gap-5">
            <h2 class="mb-2 text-2xl font-bold text-center text-stone-950 sm:text-lg">
              Upload
            </h2>
  
            <!-- KTP File Input -->
            <div class="w-full">
              <div class="flex justify-between items-center px-3 py-2 h-9 bg-white rounded border border-green-600">
                <label class="text-xs text-stone-950">Foto KTP</label>
                <button @click="triggerFileInput('ktp')" type="button" class="focus:outline-none">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 9L17 14L7 14L12 9Z" fill="#1D1B20" />
                  </svg>
                </button>
                <input
                  type="file"
                  ref="ktpInput"
                  class="hidden"
                  @change="handleFileSelect($event, 'ktp')"
                  accept="image/*"
                />
              </div>
            </div>
  
            <!-- Upload Box (Drag & Drop) -->
            <div
              class="relative w-full rounded border border-dashed bg-slate-50 border-blue-800 border-opacity-30 h-52"
              @drop.prevent="handleDrop"
              @dragover.prevent="dragover = true"
              @dragleave.prevent="dragover = false"
            >
              <svg
                class="absolute inset-0"
                width="100%"
                height="100%"
                viewBox="0 0 446 202"
                fill="none"
              >
                <rect x="0.5" width="445" height="202" rx="4" fill="#F8F8FF" />
                <rect
                  x="1"
                  y="0.5"
                  width="444"
                  height="201"
                  rx="3.5"
                  stroke="#384EB7"
                  stroke-opacity="0.3"
                  stroke-dasharray="5 5"
                />
              </svg>
              <div class="relative z-10 flex flex-col items-center justify-center h-full">
                <svg width="50" height="50" viewBox="0 0 70 70" fill="none">
                  <path
                    d="M224.528 44.7458L224.621 44.7733L224.625 44.7688C225.062 44.8481 225.496 44.586 225.625 44.1519C226.797 40.2152 230.488 37.465 234.6 37.465C235.087 37.465 235.482 37.0702 235.482 36.5833C235.482 36.0964 235.087 35.7016 234.6 35.7016C229.546 35.7016 225.299 39.0666 223.935 43.6493C223.796 44.1162 224.062 44.6067 224.528 44.7458Z"
                    fill="#483EA8"
                  />
                </svg>
                <p class="mt-4 font-mulish text-base">
                  <span class="text-[#0F0F0F] font-bold">Drag & drop files or </span>
                  <button
                    @click="triggerFileInput('upload')"
                    class="text-[#483EA8] font-bold underline focus:outline-none"
                  >
                    Browse
                  </button>
                </p>
                <p class="mt-2 text-[#676767] text-xs font-mulish">
                  Supported formats: JPEG, PNG
                </p>
              </div>
              <input
                type="file"
                ref="uploadInput"
                class="hidden"
                @change="handleFileSelect($event, 'upload')"
                accept="image/jpeg,image/png"
              />
            </div>
  
            <!-- Progress Section -->
            <div v-if="showProgress" class="w-full">
              <p class="mb-1.5 text-sm font-bold text-stone-500">
                Uploading - 3/3 files
              </p>
              <div class="p-2.5 bg-white rounded border border-neutral-200">
                <p class="mb-2 text-xs text-stone-950">your-file-here.PDF</p>
                <div class="bg-indigo-800 rounded-sm h-1 w-2/3"></div>
              </div>
            </div>
  
            <!-- Selfie File Input -->
            <div class="w-full">
              <div class="flex justify-between items-center px-3 py-2 h-9 bg-white rounded border border-green-600">
                <label class="text-xs text-stone-950">Foto Selfie</label>
                <button @click="triggerFileInput('selfie')" type="button" class="focus:outline-none">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 9L17 14L7 14L12 9Z" fill="#1D1B20" />
                  </svg>
                </button>
                <input
                  type="file"
                  ref="selfieInput"
                  class="hidden"
                  @change="handleFileSelect($event, 'selfie')"
                  accept="image/*"
                />
              </div>
            </div>
  
            <!-- Upload Button -->
            <button
              @click="handleUpload"
              class="text-sm font-bold text-white uppercase bg-indigo-800 rounded h-11 w-full focus:outline-none hover:bg-indigo-900 transition-colors"
            >
              Upload Files
            </button>
          </section>
        </div>
      </article>
    </main>
  </template>
  
  <script setup>
  import { ref } from "vue";
  
  const ktpInput = ref(null);
  const selfieInput = ref(null);
  const uploadInput = ref(null);
  const showProgress = ref(true);
  const dragover = ref(false);
  
  const selectedFiles = ref({
    ktp: null,
    selfie: null,
    upload: null,
  });
  
  const triggerFileInput = (type) => {
    if (type === "ktp") {
      ktpInput.value?.click();
    } else if (type === "selfie") {
      selfieInput.value?.click();
    } else if (type === "upload") {
      uploadInput.value?.click();
    }
  };
  
  const handleFileSelect = (event, type) => {
    const file = event.target.files[0];
    if (file) {
      selectedFiles.value[type] = file;
    }
  };
  
  const handleDrop = (event) => {
    dragover.value = false;
    const file = event.dataTransfer.files[0];
    if (file) {
      selectedFiles.value.upload = file;
    }
  };
  
  const handleUpload = () => {
    // Logika upload bisa dikembangkan sesuai kebutuhan (misal: validasi dan kirim ke API)
    console.log("Uploading files:", selectedFiles.value);
  };
  </script>
  
  <style>
  @import url("https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css");
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Mulish:wght@400;700&display=swap");
  
  .font-mulish {
    font-family: "Mulish", sans-serif;
  }
  </style>
  