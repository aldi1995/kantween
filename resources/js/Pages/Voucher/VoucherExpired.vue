<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Voucher Expired | Kantween" />

  <AppLayout>
    <v-container fluid>
      <div class="mb-6">
        <h1 class="text-h5 font-weight-bold">Voucher Expired</h1>
        <p class="text-caption text-grey">
          Riwayat voucher yang sudah tidak berlaku
        </p>
      </div>

      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-ticket-off"
            title="Belum ada voucher expired"
            text="Voucher yang kadaluarsa akan tampil di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
