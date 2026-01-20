<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  students: Array,
})
</script>

<template>
  <Head title="Manajemen Siswa" />

  <AuthenticatedLayout>
    <v-card>
      <v-card-title>Manajemen Siswa</v-card-title>

      <v-data-table
        :headers="[
          { title: 'NISN', key: 'nisn' },
          { title: 'Nama', key: 'name' },
          { title: 'Kelas', key: 'class' },
        ]"
        :items="students"
      />
    </v-card>
  </AuthenticatedLayout>
</template>
