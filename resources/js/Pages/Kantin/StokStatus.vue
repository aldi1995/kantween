<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Stok & Status | Kantween" />

  <AppLayout>
    <v-container fluid>
      <div class="mb-6">
        <h1 class="text-h5 font-weight-bold">Stok & Status Produk</h1>
        <p class="text-caption text-grey">
          Pantau stok dan status jual produk kantin
        </p>
      </div>

      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-archive"
            title="Belum ada data stok"
            text="Informasi stok produk akan ditampilkan di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
