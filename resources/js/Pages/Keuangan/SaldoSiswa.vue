<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Saldo Siswa | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Saldo Siswa</h1>
          <p class="text-caption text-grey">
            Pantau saldo seluruh siswa
          </p>
        </div>
      </div>

      <!-- CONTENT -->
      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-cash"
            title="Belum ada data saldo"
            text="Data saldo siswa akan muncul di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
