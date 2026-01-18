<script setup>
defineProps({
  icon: String,
  title: String,
  subtitle: String,
})
</script>

<template>
  <v-card class="pa-10 text-center" rounded="xl">
    <v-icon size="64" class="mb-4">{{ icon }}</v-icon>
    <div class="text-h6">{{ title }}</div>
    <div class="text-medium-emphasis">{{ subtitle }}</div>
  </v-card>
</template>
