<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Gunakan komponen Header -->
    <Header
      :showSidebar="showSidebar"
      @toggle-sidebar="showSidebar = !showSidebar"
      @toggle-profile="showProfile = !showProfile"
    />

    <!-- Main Container -->
    <div class="flex pt-3">
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

      <!-- Main Content (Halaman Helpdesk) -->
      <div class="flex-1 ml-48 p-6 mt-16">
        <h1 class="text-2xl font-bold mb-4">Helpdesk Verifikator</h1>
        <!-- Navigasi Tab -->
        <div class="mb-6">
          <nav class="flex space-x-4 border-b pb-2">
            <button 
              @click="activeTab = 'faq'" 
              :class="activeTab === 'faq' ? 'text-purple-500 border-b-2 border-purple-500' : 'text-gray-600'" 
              class="py-2 px-4 focus:outline-none">
              FAQ & Panduan
            </button>
            <button 
              @click="activeTab = 'ticket'" 
              :class="activeTab === 'ticket' ? 'text-purple-500 border-b-2 border-purple-500' : 'text-gray-600'" 
              class="py-2 px-4 focus:outline-none">
              Pengajuan Tiket
            </button>
            <button 
              @click="activeTab = 'chat'" 
              :class="activeTab === 'chat' ? 'text-purple-500 border-b-2 border-purple-500' : 'text-gray-600'" 
              class="py-2 px-4 focus:outline-none">
              Live Chat
            </button>
          </nav>
        </div>

        <!-- Konten Berdasarkan Tab -->
        <div>
          <!-- Tab FAQ & Panduan -->
          <div v-if="activeTab === 'faq'">
            <div class="bg-white p-6 rounded-lg shadow">
              <h2 class="text-xl font-semibold mb-4">Pertanyaan Umum</h2>
              <div class="space-y-4">
                <div>
                  <button @click="toggleFaq(1)" class="w-full text-left font-medium text-gray-700">
                    Bagaimana cara memverifikasi transaksi?
                  </button>
                  <div v-if="faqOpen === 1" class="mt-2 text-gray-600">
                    Untuk memverifikasi transaksi, klik tombol verifikasi pada transaksi yang belum terverifikasi dan pastikan data transaksi sesuai.
                  </div>
                </div>
                <div>
                  <button @click="toggleFaq(2)" class="w-full text-left font-medium text-gray-700">
                    Apa yang harus dilakukan jika transaksi tidak valid?
                  </button>
                  <div v-if="faqOpen === 2" class="mt-2 text-gray-600">
                    Jika transaksi tidak valid, segera laporkan melalui formulir tiket bantuan dan sertakan bukti pendukung.
                  </div>
                </div>
                <div>
                  <button @click="toggleFaq(3)" class="w-full text-left font-medium text-gray-700">
                    Di mana saya bisa menemukan panduan penggunaan fitur?
                  </button>
                  <div v-if="faqOpen === 3" class="mt-2 text-gray-600">
                    Panduan penggunaan fitur verifikator dapat diakses melalui link dokumentasi yang tersedia di halaman ini.
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab Pengajuan Tiket -->
          <div v-if="activeTab === 'ticket'">
            <div class="bg-white p-6 rounded-lg shadow">
              <h2 class="text-xl font-semibold mb-4">Pengajuan Tiket Bantuan</h2>
              <form @submit.prevent="submitTicket">
                <div class="mb-4">
                  <label for="subject" class="block text-gray-700 mb-2">Subjek</label>
                  <input 
                    id="subject" 
                    v-model="ticket.subject" 
                    type="text" 
                    class="w-full border rounded p-2" 
                    placeholder="Masukkan subjek tiket"/>
                </div>
                <div class="mb-4">
                  <label for="description" class="block text-gray-700 mb-2">Deskripsi</label>
                  <textarea 
                    id="description" 
                    v-model="ticket.description" 
                    class="w-full border rounded p-2" 
                    placeholder="Jelaskan masalah Anda" 
                    rows="4">
                  </textarea>
                </div>
                <button type="submit" class="bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600">
                  Kirim Tiket
                </button>
              </form>
            </div>
          </div>

          <!-- Tab Live Chat -->
          <div v-if="activeTab === 'chat'">
            <div class="bg-white p-6 rounded-lg shadow">
              <h2 class="text-xl font-semibold mb-4">Live Chat</h2>
              <div class="h-64 bg-gray-100 rounded p-4 mb-4 overflow-y-auto">
                <p class="text-gray-500">Pesan chat akan muncul disini...</p>
              </div>
              <div class="flex">
                <input 
                  v-model="chatMessage" 
                  type="text" 
                  class="flex-1 border rounded p-2" 
                  placeholder="Tulis pesan..."/>
                <button 
                  @click="sendChat" 
                  class="ml-2 bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600">
                  Kirim
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Header from '../Components/Header.vue';

export default {
  components: {
    Header
  },
  
  data() {
    return {
      showSidebar: false,
      activeTab: 'faq',   // Tab default yang aktif
      faqOpen: null,      // Menyimpan FAQ yang sedang terbuka
      ticket: {           // Data untuk pengajuan tiket
        subject: '',
        description: ''
      },
      chatMessage: ''     // Pesan untuk live chat
    };
  },
  methods: {
    toggleFaq(index) {
      this.faqOpen = this.faqOpen === index ? null : index;
    },
    submitTicket() {
      // Tambahkan logika pengiriman tiket sesuai kebutuhan
      alert('Tiket dikirim: ' + this.ticket.subject);
      // Reset form setelah submit
      this.ticket.subject = '';
      this.ticket.description = '';
    },
    sendChat() {
      if (this.chatMessage.trim() !== '') {
        // Tambahkan logika pengiriman chat sesuai kebutuhan
        alert('Pesan terkirim: ' + this.chatMessage);
        this.chatMessage = '';
      }
    },
    handleResize() {
      if (window.innerWidth < 1024) {
        this.showSidebar = false;
      } else {
        this.showSidebar = true;
      }
    }
  },
  mounted() {
    this.handleResize();
    window.addEventListener('resize', this.handleResize);
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
  }
};
</script>

