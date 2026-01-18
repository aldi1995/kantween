<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import {
  VContainer,
  VRow,
  VCol,
  VCard,
  VIcon
} from 'vuetify/components'
</script>

<template>
  <Head title="Dashboard | Kantin Digital" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="mb-6">
        <h1 class="text-h5 font-weight-bold">
          Dashboard
        </h1>
        <p class="text-body-2 text-grey">
          Ringkasan aktivitas kantin hari ini
        </p>
      </div>

      <!-- STATS -->
      <v-row>
        <v-col cols="12" md="3">
          <v-card class="pa-4" elevation="4" rounded="xl">
            <v-icon color="primary" size="36">
              mdi-wallet
            </v-icon>
            <h3 class="text-h6 mt-2">Saldo Aktif</h3>
            <p class="text-h5 font-weight-bold">
              Rp 0
            </p>
          </v-card>
        </v-col>

        <v-col cols="12" md="3">
          <v-card class="pa-4" elevation="4" rounded="xl">
            <v-icon color="primary" size="36">
              mdi-ticket-percent
            </v-icon>
            <h3 class="text-h6 mt-2">Voucher Aktif</h3>
            <p class="text-h5 font-weight-bold">
              0
            </p>
          </v-card>
        </v-col>

        <v-col cols="12" md="3">
          <v-card class="pa-4" elevation="4" rounded="xl">
            <v-icon color="primary" size="36">
              mdi-cash-register
            </v-icon>
            <h3 class="text-h6 mt-2">Transaksi Hari Ini</h3>
            <p class="text-h5 font-weight-bold">
              0
            </p>
          </v-card>
        </v-col>

        <v-col cols="12" md="3">
          <v-card class="pa-4" elevation="4" rounded="xl">
            <v-icon color="primary" size="36">
              mdi-chart-line
            </v-icon>
            <h3 class="text-h6 mt-2">Pendapatan</h3>
            <p class="text-h5 font-weight-bold">
              Rp 0
            </p>
          </v-card>
        </v-col>
      </v-row>

      <!-- EMPTY STATE -->
      <v-row class="mt-6">
        <v-col cols="12">
          <v-card
            class="pa-6 text-center"
            elevation="2"
            rounded="xl"
          >
            <p class="text-body-1">
              🎉 Selamat datang di sistem Kantin Digital
            </p>
            <p class="text-body-2 text-grey">
              Data transaksi akan muncul di sini setelah sistem digunakan
            </p>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </AppLayout>
</template>
