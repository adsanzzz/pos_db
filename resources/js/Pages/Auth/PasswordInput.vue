<template>
    <div class="w-full rounded min-h-14">
      <div class="w-full bg-white rounded border border-solid border-zinc-500">
        <div class="flex flex-wrap items-center py-1 pl-4 w-full rounded">
          <div
            class="flex relative flex-col flex-1 shrink justify-center items-start self-stretch my-auto whitespace-nowrap basis-6 min-h-10 min-w-60"
          >
            <input
              :type="showPassword ? 'text' : 'password'"
              :value="modelValue"
              @input="$emit('update:modelValue', $event.target.value)"
              class="z-0 self-stretch text-base w-full bg-transparent outline-none text-zinc-900"
              placeholder="Enter password"
            />
            <label
              class="absolute -left-1 -top-4 z-0 self-stretch px-1 text-sm bg-white text-zinc-800"
            >
              Password
            </label>
          </div>
          <button
            @click="togglePassword"
            class="flex flex-col justify-center items-center self-stretch p-3 my-auto w-12 min-h-12"
            type="button"
            aria-label="Toggle password visibility"
          >
            <img
              :src="
                showPassword
                  ? 'https://cdn.builder.io/api/v1/image/assets/TEMP/0a875619154262f702db02ca332b0cfe917c88df8151ee2c52219d7cb450a613?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966'
                  : 'https://cdn.builder.io/api/v1/image/assets/TEMP/0a875619154262f702db02ca332b0cfe917c88df8151ee2c52219d7cb450a613?placeholderIfAbsent=true&apiKey=4403a8f96f2f4610a2aa817af3063966'
              "
              class="object-contain w-6 aspect-square"
              alt="Toggle password visibility"
            />
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  
  const props = defineProps({
    modelValue: {
      type: String,
      default: "",
    },
  });
  
  defineEmits(["update:modelValue"]);
  
  const showPassword = ref(false);
  
  const togglePassword = () => {
    showPassword.value = !showPassword.value;
  };
  </script>
  