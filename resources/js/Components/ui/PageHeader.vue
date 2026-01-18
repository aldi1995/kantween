<script setup>
defineProps({
  title: String,
  subtitle: String,
})
</script>

<template>
  <div class="mb-6">
    <h1 class="text-h5 font-weight-bold">{{ title }}</h1>
    <p class="text-medium-emphasis">{{ subtitle }}</p>
  </div>
</template>
