<template>
    <button
      class="w-full max-w-screen-sm font-semibold"
      :class="variant === 'primary' ? 'text-zinc-100' : 'text-zinc-800'"
      @click="$emit('click')"
    >
      <div
        class="gap-1 self-stretch px-4 py-3.5 w-full rounded min-h-12"
        :class="variant === 'primary' ? 'bg-indigo-500' : ''"
      >
        <slot></slot>
      </div>
    </button>
  </template>
  
  <script setup>
  defineProps({
    variant: {
      type: String,
      default: "primary",
      validator: (value) => ["primary", "secondary"].includes(value),
    },
  });
  
  defineEmits(["click"]);
  </script>
  