<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Laporan Bulanan | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Laporan Bulanan</h1>
          <p class="text-caption text-grey">
            Rekap transaksi dan pendapatan bulanan
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-download">
          Export
        </v-btn>
      </div>

      <!-- CONTENT -->
      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-calendar-month"
            title="Belum ada laporan bulanan"
            text="Data laporan bulanan akan ditampilkan di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
