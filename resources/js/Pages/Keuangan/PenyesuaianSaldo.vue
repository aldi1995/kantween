<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Penyesuaian Saldo | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Penyesuaian Saldo</h1>
          <p class="text-caption text-grey">
            Koreksi saldo siswa (manual adjustment)
          </p>
        </div>

        <v-btn color="warning" prepend-icon="mdi-scale-balance">
          Penyesuaian Baru
        </v-btn>
      </div>

      <!-- CONTENT -->
      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-scale-balance"
            title="Belum ada penyesuaian"
            text="Riwayat penyesuaian saldo akan ditampilkan di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
