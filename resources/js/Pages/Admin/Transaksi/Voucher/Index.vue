<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  vouchers: Array,
})
</script>

<template>
  <Head title="Voucher" />

  <AuthenticatedLayout>
    <v-card>
      <v-card-title>Voucher</v-card-title>

      <v-data-table
        :headers="[
          { title: 'Kode', key: 'code' },
          { title: 'Nilai', key: 'amount' },
          { title: 'Expired', key: 'expired_at' },
        ]"
        :items="vouchers"
      />
    </v-card>
  </AuthenticatedLayout>
</template>
