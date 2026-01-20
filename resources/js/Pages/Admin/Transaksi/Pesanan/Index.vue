<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  orders: Array,
})
</script>

<template>
  <Head title="Transaksi Pesanan" />

  <AuthenticatedLayout>
    <v-card>
      <v-card-title>Transaksi Pesanan</v-card-title>

      <v-data-table
        :headers="[
          { title: 'ID', key: 'id' },
          { title: 'Total', key: 'total_price' },
          { title: 'Status', key: 'status' },
          { title: 'Tanggal', key: 'created_at' },
        ]"
        :items="orders"
      />
    </v-card>
  </AuthenticatedLayout>
</template>
