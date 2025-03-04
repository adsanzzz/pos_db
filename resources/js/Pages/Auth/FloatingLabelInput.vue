<template>
    <div class="flex-1 shrink rounded basis-0 min-h-14 min-w-60">
      <div class="w-full bg-white rounded border border-solid border-zinc-500">
        <div class="flex items-center py-2 pl-4 w-full rounded">
          <div
            class="flex relative flex-col flex-1 shrink justify-center items-start self-stretch my-auto w-full basis-0 min-h-10 min-w-60"
          >
            <input
              :type="type"
              :value="modelValue"
              @input="$emit('update:modelValue', $event.target.value)"
              class="z-0 self-stretch text-base w-full bg-transparent outline-none text-zinc-900"
              :placeholder="placeholder"
            />
            <label
              class="absolute -left-1 -top-4 z-0 self-stretch px-1 text-sm bg-white text-zinc-800"
            >
              {{ label }}
            </label>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  defineProps({
    label: {
      type: String,
      required: true,
    },
    modelValue: {
      type: [String, Number],
      default: "",
    },
    type: {
      type: String,
      default: "text",
    },
    placeholder: {
      type: String,
      default: "",
    },
  });
  
  defineEmits(["update:modelValue"]);
  </script>
  