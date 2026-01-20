<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  summary: Object,
})
</script>

<template>
  <Head title="Laporan" />

  <AuthenticatedLayout>
    <v-row dense>
      <v-col cols="12" md="4">
        <v-card>
          <v-card-title>Total Pesanan</v-card-title>
          <v-card-text class="text-h5">
            {{ summary.total_orders }}
          </v-card-text>
        </v-card>
      </v-col>

      <v-col cols="12" md="4">
        <v-card>
          <v-card-title>Total Pendapatan</v-card-title>
          <v-card-text class="text-h5">
            Rp {{ summary.total_revenue }}
          </v-card-text>
        </v-card>
      </v-col>

      <v-col cols="12" md="4">
        <v-card>
          <v-card-title>Total Top Up</v-card-title>
          <v-card-text class="text-h5">
            Rp {{ summary.total_topup }}
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>

    <v-card class="mt-6">
      <v-card-title>Laporan Sistem</v-card-title>
      <v-card-text>
        <p>Gunakan halaman ini untuk monitoring transaksi dan performa kantin.</p>
        <p>(Filter tanggal & export akan ditambahkan)</p>
      </v-card-text>
    </v-card>
  </AuthenticatedLayout>
</template>
