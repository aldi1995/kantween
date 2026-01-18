<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Menu Kantin | Kantween" />

  <AppLayout>
    <v-container fluid>
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Menu Kantin</h1>
          <p class="text-caption text-grey">
            Kelola menu yang tersedia di kantin
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-plus">
          Tambah Menu
        </v-btn>
      </div>

      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-store"
            title="Belum ada menu"
            text="Menu kantin akan ditampilkan di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
