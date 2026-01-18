<script setup>
defineProps({
  headers: Array,
  items: Array,
})
</script>

<template>
  <v-data-table
    :headers="headers"
    :items="items"
    item-key="id"
    density="comfortable"
  />
</template>
