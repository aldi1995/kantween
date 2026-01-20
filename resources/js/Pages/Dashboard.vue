<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, usePage } from '@inertiajs/vue3'

const user = usePage().props.auth.user
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <v-row dense>

      <!-- CARD 1 -->
      <v-col cols="12" md="4">
        <v-card>
          <v-card-text>
            <div class="d-flex align-center">
              <v-icon size="36" color="primary">mdi-wallet</v-icon>
              <div class="ms-3">
                <div class="text-caption">Saldo</div>
                <div class="text-h6 font-weight-bold">Rp —</div>
              </div>
            </div>
          </v-card-text>
        </v-card>
      </v-col>

      <!-- CARD 2 -->
      <v-col cols="12" md="4">
        <v-card>
          <v-card-text>
            <div class="d-flex align-center">
              <v-icon size="36" color="success">mdi-ticket-percent</v-icon>
              <div class="ms-3">
                <div class="text-caption">Voucher Aktif</div>
                <div class="text-h6 font-weight-bold">—</div>
              </div>
            </div>
          </v-card-text>
        </v-card>
      </v-col>

      <!-- CARD 3 -->
      <v-col cols="12" md="4">
        <v-card>
          <v-card-text>
            <div class="d-flex align-center">
              <v-icon size="36" color="info">mdi-receipt-text</v-icon>
              <div class="ms-3">
                <div class="text-caption">Pesanan Aktif</div>
                <div class="text-h6 font-weight-bold">—</div>
              </div>
            </div>
          </v-card-text>
        </v-card>
      </v-col>

      <!-- WELCOME -->
      <v-col cols="12">
        <v-card>
          <v-card-text>
            <h3 class="text-h6 font-weight-bold">
              Selamat datang 👋
            </h3>
            <p class="text-body-2 mt-1">
              Kamu login sebagai <strong>{{ user.role }}</strong>.
              Silakan gunakan menu di samping untuk mulai menggunakan sistem kantin.
            </p>
          </v-card-text>
        </v-card>
      </v-col>

    </v-row>
  </AuthenticatedLayout>
</template>
