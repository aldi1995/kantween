<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Produk Kantin | Kantween" />

  <AppLayout>
    <v-container fluid>
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Produk Kantin</h1>
          <p class="text-caption text-grey">
            Kelola produk makanan dan minuman
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-plus">
          Tambah Produk
        </v-btn>
      </div>

      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-food"
            title="Belum ada produk"
            text="Data produk kantin akan muncul di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
