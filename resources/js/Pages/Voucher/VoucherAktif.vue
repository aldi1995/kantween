<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Voucher Aktif | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Voucher Aktif</h1>
          <p class="text-caption text-grey">
            Daftar voucher yang masih dapat digunakan
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-plus">
          Buat Voucher
        </v-btn>
      </div>

      <!-- CONTENT -->
      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-ticket-confirmation"
            title="Belum ada voucher aktif"
            text="Voucher aktif akan muncul di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
