<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Broadcast" />

  <AuthenticatedLayout>
    <v-card>
      <v-card-title class="d-flex justify-space-between align-center">
        <span>Broadcast Pengumuman</span>
        <v-btn color="primary" prepend-icon="mdi-plus">
          Buat Broadcast
        </v-btn>
      </v-card-title>

      <v-data-table
        :headers="[
          { title: 'Judul', key: 'title' },
          { title: 'Target', key: 'target' },
          { title: 'Tanggal', key: 'created_at' },
        ]"
        :items="[]"
        no-data-text="Belum ada broadcast"
      />
    </v-card>
  </AuthenticatedLayout>
</template>
