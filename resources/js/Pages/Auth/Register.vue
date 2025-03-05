<template>
    <main class="bg-white overflow-hidden">
        <NavigationHeader />
      <section class="container mx-auto px-6 md:px-16 py-16 md:py-28">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
          <!-- Illustration Section -->
          <aside>
            <img
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/f9658120a0c02739b4ea0ec8d93f7f140ec273c3f4309e92590c27d12403da39?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
              alt="Registration illustration"
              class="w-full object-contain rounded-md md:mt-28 mt-10"
              loading="lazy"
            />
          </aside>
    
          <!-- Registration Form Section -->
          <article class="flex flex-col justify-center">
            <div class="w-full max-w-lg mx-auto">
              <!-- Logo: ditempatkan di kanan untuk tampilan desktop -->
              <div class="flex justify-end">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/354f04d0702899faf6f9ae27dceb91cf30cfd5c0de18e0be82ef79dd93e210cd?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
                  alt="Logo"
                  class="w-32 md:w-48 object-contain mb-8"
                  loading="lazy"
                />
              </div>
    
              <header class="mb-8 text-center">
                <h1 class="text-4xl font-semibold text-zinc-800">Sign up</h1>
                <p class="mt-4 text-base text-zinc-700 opacity-75">
                  Let's get you all set up so you can access your personal account.
                </p>
              </header>
    
              <form @submit.prevent="handleSubmit" class="space-y-6">
                <!-- First Row: Nama Lengkap & Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <FloatingLabelInput
                    v-model="formData.fullName"
                    label="Nama Lengkap"
                    placeholder="Enter your full name"
                  />
                  <FloatingLabelInput
                    v-model="formData.email"
                    label="Email"
                    type="email"
                    placeholder="Enter your email"
                  />
                </div>
    
                <!-- Second Row: NIK & Nomor Telp -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <FloatingLabelInput
                    v-model="formData.nik"
                    label="NIK"
                    placeholder="Enter your NIK"
                  />
                  <FloatingLabelInput
                    v-model="formData.phone"
                    label="Nomor Telp"
                    type="tel"
                    placeholder="Enter your phone number"
                  />
                </div>
    
                <!-- Address Field -->
                <FloatingLabelInput
                  v-model="formData.address"
                  label="Alamat"
                  placeholder="Enter your address"
                />
    
                <!-- Password Field -->
                <PasswordInput v-model="formData.password" />
    
                <!-- Terms Agreement -->
                <label class="flex items-center mt-6 text-sm font-medium text-zinc-800 cursor-pointer">
                  <input
                    type="checkbox"
                    v-model="formData.agreeToTerms"
                    class="hidden"
                  />
                  <img
                    :src="
                      formData.agreeToTerms
                        ? 'https://cdn.builder.io/api/v1/image/assets/TEMP/d2128ac2244d7c074d315f7606b21dbd16625bbb23d73106c13c1e991a796dd0?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966'
                        : 'https://cdn.builder.io/api/v1/image/assets/TEMP/d2128ac2244d7c074d315f7606b21dbd16625bbb23d73106c13c1e991a796dd0?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966'
                    "
                    alt="Terms checkbox"
                    class="w-6 h-6 object-contain mr-2"
                  />
                  <span>
                    I agree to all the
                    <a href="#" class="font-semibold text-[#FF8682] hover:underline">Terms</a>
                    and
                    <a href="#" class="font-semibold text-[#FF8682] hover:underline">Privacy Policies</a>
                  </span>
                </label>
    
                <!-- Submit Button and Login Link -->
                <div class="space-y-4 mt-10">
                  <TextButton type="submit" variant="primary">
                    Create account
                  </TextButton>
                  <p class="text-sm font-medium text-zinc-800 text-center">
                    Already have an account?
                    <a href="/login" class="font-semibold text-[#FF8682] hover:underline">Login</a>
                  </p>
                </div>
              </form>
            </div>
          </article>
        </div>
      </section>
    </main>
  </template>
    
  <script setup>
  import { reactive } from "vue";
  import NavigationHeader from "../../Components/NavigationHeader.vue";
  import FloatingLabelInput from "./FloatingLabelInput.vue";
  import PasswordInput from "./PasswordInput.vue";
  import TextButton from "./TextButton.vue";
  
  const formData = reactive({
    fullName: "",
    email: "",
    nik: "",
    phone: "",
    address: "",
    password: "",
    agreeToTerms: false,
  });
  
  const handleSubmit = () => {
    // Lakukan validasi atau kirim data ke API sesuai kebutuhan
    console.log("Form submitted:", formData);
  };
  </script>
    
  <style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");
  
  * {
    font-family: "Poppins", -apple-system, Roboto, Helvetica, sans-serif;
  }
  </style>
  