<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  menus: Array,
})
</script>

<template>
  <Head title="Manajemen Menu" />

  <AuthenticatedLayout>
    <v-card>
      <v-card-title>Manajemen Menu</v-card-title>

      <v-data-table
        :headers="[
          { title: 'Nama Menu', key: 'name' },
          { title: 'Harga', key: 'price' },
          { title: 'Tenant', key: 'tenant.name' },
        ]"
        :items="menus"
      />
    </v-card>
  </AuthenticatedLayout>
</template>
