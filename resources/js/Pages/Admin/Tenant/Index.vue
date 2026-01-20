<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  tenants: Array,
})
</script>

<template>
  <Head title="Manajemen Tenant" />

  <AuthenticatedLayout>
    <v-card>
      <v-card-title>Manajemen Tenant</v-card-title>

      <v-data-table
        :headers="[
          { title: 'Nama Tenant', key: 'name' },
          { title: 'Status', key: 'is_open' },
        ]"
        :items="tenants"
      />
    </v-card>
  </AuthenticatedLayout>
</template>
