<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Distribusi Voucher | Kantween" />

  <AppLayout>
    <v-container fluid>
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Distribusi Voucher</h1>
          <p class="text-caption text-grey">
            Atur pembagian voucher ke siswa
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-send">
          Distribusikan
        </v-btn>
      </div>

      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-send-check"
            title="Belum ada distribusi"
            text="Riwayat distribusi voucher akan muncul di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
