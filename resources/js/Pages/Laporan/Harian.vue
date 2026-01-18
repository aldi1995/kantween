<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Laporan Harian | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Laporan Harian</h1>
          <p class="text-caption text-grey">
            Ringkasan transaksi dan aktivitas harian
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
            icon="mdi-file-chart"
            title="Belum ada laporan harian"
            text="Data laporan harian akan ditampilkan di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
