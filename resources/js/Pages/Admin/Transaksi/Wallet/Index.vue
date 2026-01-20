<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  wallets: Array,
})
</script>

<template>
  <Head title="Wallet & Top Up" />

  <AuthenticatedLayout>
    <v-card>
      <v-card-title>Wallet & Top Up</v-card-title>

      <v-data-table
        :headers="[
          { title: 'User', key: 'user.name' },
          { title: 'Saldo', key: 'balance' },
          { title: 'Updated', key: 'updated_at' },
        ]"
        :items="wallets"
      />
    </v-card>
  </AuthenticatedLayout>
</template>
