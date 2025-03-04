<template>
    <main class="bg-white overflow-hidden">
      <section class="flex justify-center items-center bg-black bg-opacity-40 px-8 py-20 md:px-20 md:py-40">
        <form
          @submit.prevent="handleSubmit"
          class="bg-zinc-600 rounded-3xl p-8 md:p-20 w-full max-w-lg"
        >
          <!-- Header: Logo & Title -->
          <header class="mb-6">
            <div class="flex flex-col md:flex-row items-center">
              <div class="md:w-2/3 flex justify-center md:justify-start">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/a8717ffa8f872b9208d66340e448c38da0598d471a021e012acb3318b2c34fcc?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
                  alt="Login logo"
                  class="w-32 md:w-48 object-contain"
                  loading="lazy"
                />
              </div>
              <div class="mt-4 md:mt-0 md:ml-6">
                <h1 class="text-4xl md:text-5xl font-medium text-center text-white">
                  Login!
                </h1>
              </div>
            </div>
          </header>
  
          <p class="mb-6 text-base text-center text-white">
            Please enter your credentials below to continue
          </p>
  
          <!-- Email Input -->
          <div class="mb-4">
            <label
              for="email"
              class="block text-base font-medium text-white mb-1"
            >
              Email
            </label>
            <input
              id="email"
              type="email"
              v-model="email"
              placeholder="Enter your email"
              class="w-full px-4 py-3 rounded-xl bg-zinc-500 text-neutral-400 text-lg"
            />
          </div>
  
          <!-- Password Input -->
          <div class="mb-4 relative">
            <label
              for="password"
              class="block text-base font-medium text-white mb-1"
            >
              Password
            </label>
            <input
              id="password"
              :type="showPassword ? 'text' : 'password'"
              v-model="password"
              placeholder="Enter your password"
              class="w-full px-4 py-3 rounded-xl bg-zinc-500 text-neutral-400 text-lg"
            />
            <button
              type="button"
              @click="showPassword = !showPassword"
              class="absolute inset-y-0 right-4 flex items-center"
            >
              <img
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/7cc58e6bdc4175e160cd56e6410785b296c1b61731d1a96420710127e31298ab?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966"
                alt="Toggle password visibility"
                class="w-6 h-6 object-contain"
              />
            </button>
          </div>
  
          <!-- Options: Remember Me & Forgot Password -->
          <div class="mb-6 flex flex-col md:flex-row md:justify-between items-center">
            <!-- Remember Me Checkbox -->
            <label class="flex items-center text-lg text-violet-400 cursor-pointer">
              <input type="checkbox" v-model="rememberMe" class="hidden" />
              <div
                :class="[
                  'w-6 h-6 rounded-sm border border-violet-400 flex-shrink-0 mr-2',
                  rememberMe ? 'bg-violet-400' : 'bg-transparent'
                ]"
              ></div>
              <span>Remember me</span>
            </label>
            <a
              href="#"
              class="text-lg text-violet-400 underline mt-4 md:mt-0"
            >
              Forgot Password?
            </a>
          </div>
  
          <!-- Submit Button -->
          <button
            type="submit"
            class="w-full py-4 text-base font-medium text-white bg-violet-400 rounded-xl hover:bg-violet-500 transition-colors"
          >
            Login
          </button>
        </form>
      </section>
    </main>
  </template>
  
  <script setup>
  import { ref } from "vue";
  
  const email = ref("");
  const password = ref("");
  const showPassword = ref(false);
  const rememberMe = ref(false);
  
  const handleSubmit = () => {
    console.log({
      email: email.value,
      password: password.value,
      rememberMe: rememberMe.value,
    });
  };
  </script>
  