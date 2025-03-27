<template>
  <main class="flex justify-center items-center p-5 min-h-screen bg-gray-50">
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
            <!-- Preview KTP -->
            <div v-if="selectedFiles.ktp" class="mt-2">
              <img :src="filePreview(selectedFiles.ktp)" alt="Preview KTP" class="w-32 h-auto rounded"/>
              <p class="text-xs text-gray-600 mt-1">{{ selectedFiles.ktp.name }}</p>
            </div>
          </div>

          <!-- Upload Box (Drag & Drop) -->
          <div
            :class="[
              'relative w-full rounded border border-dashed h-52 transition-colors duration-200',
              dragover ? 'bg-blue-50 border-blue-400' : 'bg-slate-50 border-blue-800 border-opacity-30'
            ]"
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
            <!-- Preview Upload -->
            <div v-if="selectedFiles.upload" class="absolute bottom-2 left-2 bg-white bg-opacity-80 p-2 rounded shadow">
              <img :src="filePreview(selectedFiles.upload)" alt="Preview Upload" class="w-16 h-auto rounded"/>
              <p class="text-xs text-gray-600 mt-1">{{ selectedFiles.upload.name }}</p>
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
            <!-- Preview Selfie -->
            <div v-if="selectedFiles.selfie" class="mt-2">
              <img :src="filePreview(selectedFiles.selfie)" alt="Preview Selfie" class="w-32 h-auto rounded"/>
              <p class="text-xs text-gray-600 mt-1">{{ selectedFiles.selfie.name }}</p>
            </div>
          </div>

          <!-- Progress Section -->
          <div v-if="showProgress" class="w-full">
            <p class="mb-1.5 text-sm font-bold text-stone-500">
              Uploading - 3/3 files
            </p>
            <div class="p-2.5 bg-white rounded border border-neutral-200">
              <p class="mb-2 text-xs text-stone-950">{{ progressFileName }}</p>
              <div class="bg-indigo-800 rounded-sm h-1" :style="{ width: uploadPercentage + '%' }"></div>
            </div>
          </div>

          <!-- Upload Button -->
          <button
            @click="handleUpload"
            :disabled="!allFilesSelected"
            class="text-sm font-bold text-white uppercase bg-indigo-800 rounded h-11 w-full focus:outline-none hover:bg-indigo-900 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
          >
            Upload Files
          </button>
        </section>
      </div>
    </article>
  </main>
</template>

<script setup>
import { ref, computed } from "vue";

const ktpInput = ref(null);
const selfieInput = ref(null);
const uploadInput = ref(null);
const showProgress = ref(false);
const dragover = ref(false);
const uploadPercentage = ref(0);
const progressFileName = ref("");

const selectedFiles = ref({
  ktp: null,
  selfie: null,
  upload: null,
});

// Tombol upload hanya aktif jika semua file telah dipilih
const allFilesSelected = computed(() => {
  return selectedFiles.value.ktp && selectedFiles.value.selfie && selectedFiles.value.upload;
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

const filePreview = (file) => {
  return URL.createObjectURL(file);
};

const handleUpload = () => {
  if (!allFilesSelected.value) {
    alert("Silahkan pilih semua file yang diperlukan sebelum mengupload.");
    return;
  }
  // Simulasi upload file
  showProgress.value = true;
  uploadPercentage.value = 0;
  // Misal menampilkan nama file KTP sebagai contoh progress
  progressFileName.value = selectedFiles.value.ktp.name;

  const interval = setInterval(() => {
    if (uploadPercentage.value >= 100) {
      clearInterval(interval);
      alert("Upload selesai!");
      showProgress.value = false;
      uploadPercentage.value = 0;
    } else {
      uploadPercentage.value += 10;
    }
  }, 300);

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
