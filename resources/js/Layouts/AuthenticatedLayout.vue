<script setup>
import { ref } from 'vue'
import { usePage, Link } from '@inertiajs/vue3'

const drawer = ref(true)
const user = usePage().props.auth.user

const isAdmin   = user.role === 'admin'
const isTenant  = user.role === 'tenant'
const isStudent = user.role === 'user'
</script>

<template>
  <v-app>

    <!-- ================= TOP BAR ================= -->
    <v-app-bar color="primary" flat>
      <v-app-bar-nav-icon @click="drawer = !drawer" />
      <v-toolbar-title class="font-weight-bold">
        Kantin Sekolah
      </v-toolbar-title>

      <v-spacer />

      <v-menu>
        <template #activator="{ props }">
          <v-btn icon v-bind="props">
            <v-icon>mdi-account-circle</v-icon>
          </v-btn>
        </template>

        <v-list>
          <v-list-item>
            <v-list-item-title class="font-weight-bold">
              {{ user.username ?? user.email ?? 'User' }}
            </v-list-item-title>
            <v-list-item-subtitle>
              {{ user.role.toUpperCase() }}
            </v-list-item-subtitle>
          </v-list-item>

          <v-divider />

          <v-list-item as="Link" :href="route('profile.edit')">
            <v-list-item-title>Profile</v-list-item-title>
          </v-list-item>

          <v-list-item as="Link" method="post" :href="route('logout')">
            <v-list-item-title>Logout</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <!-- ================= SIDEBAR ================= -->
    <v-navigation-drawer v-model="drawer" app>
      <v-list nav density="comfortable">

        <!-- DASHBOARD -->
        <v-list-item
          prepend-icon="mdi-view-dashboard"
          title="Dashboard"
          as="Link"
          :href="route('dashboard')"
        />

        <!-- ================= ADMIN ================= -->
        <template v-if="isAdmin">
          <v-divider class="my-2" />
          <v-list-subheader>Manajemen</v-list-subheader>

          <v-list-item prepend-icon="mdi-account-group" title="Siswa" as="Link" href="/admin/students" />
          <v-list-item prepend-icon="mdi-store" title="Tenant" as="Link" href="/admin/tenants" />
          <v-list-item prepend-icon="mdi-food" title="Menu" as="Link" href="/admin/menus" />

          <v-divider class="my-2" />
          <v-list-subheader>Transaksi</v-list-subheader>

          <v-list-item prepend-icon="mdi-receipt-text" title="Pesanan" as="Link" href="/admin/orders" />
          <v-list-item prepend-icon="mdi-wallet" title="Wallet & Top Up" as="Link" href="/admin/wallets" />
          <v-list-item prepend-icon="mdi-ticket-percent" title="Voucher" as="Link" href="/admin/vouchers" />

          <v-divider class="my-2" />
          <v-list-subheader>Lainnya</v-list-subheader>

          <v-list-item prepend-icon="mdi-chart-bar" title="Laporan" as="Link" href="/admin/reports" />
          <v-list-item prepend-icon="mdi-bullhorn" title="Broadcast" as="Link" href="/admin/broadcasts" />
        </template>

        <!-- ================= TENANT ================= -->
        <template v-if="isTenant">
          <v-divider class="my-2" />
          <v-list-subheader>Tenant</v-list-subheader>

          <v-list-item prepend-icon="mdi-food" title="Menu" as="Link" href="/tenant/menus" />
          <v-list-item prepend-icon="mdi-receipt-text" title="Pesanan" as="Link" href="/tenant/orders" />
          <v-list-item prepend-icon="mdi-chart-line" title="Laporan Penjualan" as="Link" href="/tenant/reports" />
        </template>

        <!-- ================= SISWA ================= -->
        <template v-if="isStudent">
          <v-divider class="my-2" />
          <v-list-subheader>Siswa</v-list-subheader>

          <v-list-item prepend-icon="mdi-food-outline" title="Pesan Makanan" as="Link" href="/student/menus" />
          <v-list-item prepend-icon="mdi-receipt" title="Pesanan Saya" as="Link" href="/student/orders" />

          <v-divider class="my-2" />
          <v-list-subheader>Keuangan</v-list-subheader>

          <v-list-item prepend-icon="mdi-wallet" title="Wallet & Top Up" as="Link" href="/student/wallet" />
          <v-list-item prepend-icon="mdi-ticket-percent" title="Voucher Saya" as="Link" href="/student/vouchers" />
        </template>

      </v-list>
    </v-navigation-drawer>

    <!-- ================= MAIN ================= -->
    <v-main class="bg-grey-lighten-4">
      <v-container fluid>
        <slot />
      </v-container>
    </v-main>

  </v-app>
</template>
