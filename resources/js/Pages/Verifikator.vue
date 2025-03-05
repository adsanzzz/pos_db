<template>
  <div class="flex">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="menu">
        <!-- Dashboard -->
        <div class="menu-item">
          <img class="icon" src="/images/dashboard.png" alt="Dashboard Icon" />
          <span class="menu-text">Dashboard</span>
        </div>

        <!-- Helpdesk -->
        <div class="menu-item">
          <img class="icon" src="/images/helpdesk.png" alt="Helpdesk Icon" />
          <span class="menu-text">Helpdesk</span>
        </div>
      </div>

      <!-- Tombol Logout -->
      <div class="menu-item logout">
        <img class="icon" src="/images/logout.png" alt="Logout Icon" />
        <span class="menu-text">Logout</span>
      </div>
    </div>


    <!-- Konten Utama -->
    <div class="content">
      <HeaderDeks />


      <!-- Tab Navigasi -->
      <div class="tabs">
        <button @click="selectedTab = 'request'" :class="{ active: selectedTab === 'request' }">Request</button>
        <button @click="selectedTab = 'accepted'" :class="{ active: selectedTab === 'accepted' }">Accepted</button>
        <button @click="selectedTab = 'rejected'" :class="{ active: selectedTab === 'rejected' }">Rejected</button>
      </div>

      <!-- Konten -->
      <div class="biodata-container">
        <div class="biodata-grid">
          <div v-for="(biodata, index) in biodataList" :key="index" class="biodata-card">
            <img src="/images/profile.png" class="profile-img" alt="Profile" />
            <h3>{{ biodata.nama }}</h3>
            <p><strong>NIK:</strong> {{ biodata.nik }}</p>
            <p><strong>Email:</strong> <a :href="'mailto:' + biodata.email">{{ biodata.email }}</a></p>
            <p><strong>Nomor HP:</strong> {{ biodata.hp }}</p>
            <p><strong>Alamat:</strong> {{ biodata.alamat }}</p>
            <div class="button-group">
              <button class="accept-btn" @click="acceptRequest(index)">✅ Accept</button>
              <button class="reject-btn" @click="rejectRequest(index)">❌ Reject</button>
            </div>
          </div>
        </div>
      </div>

      
    </div>
    <!-- Profil Petugas -->
    <div class="petugas-sidebar">
        <img src="/images/profile.png" class="petugas-img" alt="Profile Petugas" />
        <div class="petugas-info">
          <h3>adit</h3>
          <p>Admin</p>
        </div>
      </div>
  </div>
</template>

<script>
import HeaderDeks from "@/Components/HeaderDeks.vue";

export default {
  name: "Request",
  components: {
    HeaderDeks,
  },
  data() {
    return {
      selectedTab: "request",
      biodataList: Array(12).fill({
        nama: "Ahmed",
        nik: "3301216502050001",
        email: "ahmed@gmail.com",
        hp: "085441530959",
        alamat: "Jl. Halilintar No 121, RW01/RT07, Surakarta, Jawa Tengah",
      }),
      petugas: {
        nama: "Aditya Ikhsan",
        role: "Admin",
      },
    };
  },
  methods: {
    acceptRequest(index) {
      alert(`Permohonan ${this.biodataList[index].nama} diterima!`);
    },
    rejectRequest(index) {
      alert(`Permohonan ${this.biodataList[index].nama} ditolak!`);
    },
  },
};
</script>

<style>
/* Sidebar Petugas di Samping Konten */
.petugas-sidebar {
  width: 250px;
  border-radius: 10%;
  margin-right: 10px;
  background: #eaeaea;
  padding: 20px;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 160px;
  position: absolute;
  top: 0;
  right: 0;
}

/* Gambar Petugas */
.petugas-img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 3px solid #ffffff;
  margin-bottom: 10px;
}

/* Nama & Role */
.petugas-info h3 {
  font-size: 16px;
  margin: 5px 0 2px;
}

.petugas-info p {
  font-size: 14px;
  color: gray;
}
 


/* Sidebar */
.sidebar {
  height: calc(100vh - 60px);
  width: 180px;
  background-color: #e5e5e5;
  padding-top: 20px;
  position: fixed;
  left: 0;
  top: 64px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* Menu */
.menu {
  display: flex;
  flex-direction: column;
  gap: 15px;
  width: 100%;
  padding: 10px;
  align-items: center;
  justify-content: center;
}

/* Kotak menu */
.menu-item {
  background-color: #a787d2;
  border: 1px solid #ddd;
  border-radius: 10px;
  width: 80%;
  height: 100px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 0.3s;
}

.menu-item:hover {
  background-color: #d9bcff;
}

/* Logout */
.logout {
  margin-top: auto;
  margin-bottom: 20px;
  background-color: #ffffff;
}

.logout:hover {
  background-color: #b0b0b0;
}

/* Gambar di tengah */
.icon {
  width: 40px;
  height: 40px;
}

/* Teks */
.menu-text {
  color: #333;
  font-size: 14px;
  font-weight: bold;
  margin-top: 5px;
}

/* Pastikan header memiliki posisi tetap */
.content {
  margin-right: 240px;
  margin-left: 200px;
  margin-top: 40px;
  padding: 30px;
  flex: 1;
  overflow-y: auto;
  overflow-x: hidden;
  min-height: 100vh;
}

/* Pastikan tabs tidak menutupi header */
.tabs {
  position: sticky;
  top: 25px; /* Sesuaikan dengan tinggi header */
  background: white;
  padding: 10px 0;
  z-index: -1; /* Lebih tinggi dari header */
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
  border-bottom: 2px solid #ddd;
}


.tabs button {
  padding: 10px 15px;
  border: none;
  background-color: #ddd;
  cursor: pointer;
  border-radius: 5px;
  font-weight: bold;
}

.tabs button.active {
  background-color: #6a0dad;
  color: white;
}

/* Container Biodata */
.biodata-container {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  max-height: 550px;
  overflow-y: auto;
}

/* Grid Biodata */
.biodata-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
}

/* Card Biodata */
.biodata-card {
  background: #f9f9f9;
  padding: 15px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.profile-img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

/* Tombol */
.button-group {
  display: flex;
  gap: 10px;
  justify-content: center;
  margin-top: 10px;
}

.accept-btn {
  background-color: #28a745;
  color: white;
  border: none;
  padding: 8px 12px;
  border-radius: 5px;
  cursor: pointer;
}

.reject-btn {
  background-color: #dc3545;
  color: white;
  border: none;
  padding: 8px 12px;
  border-radius: 5px;
  cursor: pointer;
}

.accept-btn:hover {
  background-color: #218838;
}

.reject-btn:hover {
  background-color: #c82333;
}
</style>
