<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'

import WidgetSaldo from '@/Components/dashboard/WidgetSaldo.vue'
import WidgetVoucher from '@/Components/dashboard/WidgetVoucher.vue'
import WidgetTransaksi from '@/Components/dashboard/WidgetTransaksi.vue'
import WidgetAdminStats from '@/Components/dashboard/WidgetAdminStats.vue'

/**
 * ===============================
 * ROLE UI ONLY (SEMENTARA)
 * ganti manual:
 * 'admin' | 'kasir' | 'siswa'
 * ===============================
 */
const role = 'admin'

const isAdmin = role === 'admin'
const isKasir = role === 'kasir'
const isSiswa = role === 'siswa'
</script>

<template>
  <Head title="Dashboard | Kantween" />

  <AppLayout>
    <v-container fluid>
      <h1 class="text-h5 font-weight-bold mb-6">
        Dashboard
      </h1>

      <v-row>
        <!-- SISWA -->
        <WidgetSaldo v-if="isSiswa" />
        <WidgetVoucher v-if="isSiswa" />

        <!-- KASIR -->
        <WidgetTransaksi v-if="isKasir" />

        <!-- ADMIN -->
        <WidgetAdminStats v-if="isAdmin" />
        <WidgetTransaksi v-if="isAdmin" />
      </v-row>
    </v-container>
  </AppLayout>
</template>
