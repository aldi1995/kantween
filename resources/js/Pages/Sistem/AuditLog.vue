<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Audit Log | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Audit Log</h1>
          <p class="text-caption text-grey">
            Catatan aktivitas dan perubahan sistem
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-filter">
          Filter
        </v-btn>
      </div>

      <!-- CONTENT -->
      <v-card rounded="xl">
        <v-card-text>
          <v-empty-state
            icon="mdi-shield-search"
            title="Belum ada audit log"
            text="Aktivitas sistem akan tercatat di sini"
          />
        </v-card-text>
      </v-card>
    </v-container>
  </AppLayout>
</template>
