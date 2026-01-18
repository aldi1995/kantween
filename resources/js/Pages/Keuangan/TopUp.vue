<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Top Up Saldo | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Top Up Saldo</h1>
          <p class="text-caption text-grey">
            Proses pengisian saldo siswa
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-plus-circle">
          Top Up Baru
        </v-btn>
      </div>

      <!-- CONTENT -->
      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-plus-circle"
            title="Belum ada top up"
            text="Riwayat top up saldo akan tampil di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
