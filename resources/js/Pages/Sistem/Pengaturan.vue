<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Pengaturan Sistem | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="mb-6">
        <h1 class="text-h5 font-weight-bold">Pengaturan Sistem</h1>
        <p class="text-caption text-grey">
          Konfigurasi umum aplikasi Kantween
        </p>
      </div>

      <!-- CONTENT -->
      <v-row>
        <v-col cols="12" md="6">
          <v-card rounded="xl">
            <v-card-title>Umum</v-card-title>
            <v-card-text>
              <v-empty-state
                icon="mdi-cog"
                title="Belum ada pengaturan"
                text="Pengaturan sistem akan muncul di sini"
              />
            </v-card-text>
          </v-card>
        </v-col>

        <v-col cols="12" md="6">
          <v-card rounded="xl">
            <v-card-title>Keamanan</v-card-title>
            <v-card-text>
              <v-empty-state
                icon="mdi-shield-lock"
                title="Belum ada konfigurasi"
                text="Pengaturan keamanan akan ditampilkan di sini"
              />
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </AppLayout>
</template>
