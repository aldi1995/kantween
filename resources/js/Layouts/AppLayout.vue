<script setup>
import { Link } from '@inertiajs/vue3'
import {
  VApp,
  VAppBar,
  VMain,
  VNavigationDrawer,
  VList,
  VListItem,
  VListItemTitle,
  VIcon,
  VSpacer,
  VBtn
} from 'vuetify/components'
</script>

<template>
  <v-app>
    <!-- SIDEBAR -->
    <v-navigation-drawer
      app
      permanent
      width="260"
    >
      <div class="pa-4 text-h6 font-weight-bold">
        🍱 Kantin Digital
      </div>

      <v-list nav density="comfortable">
        <v-list-item to="/dashboard" link>
          <v-icon start>mdi-view-dashboard</v-icon>
          <v-list-item-title>Dashboard</v-list-item-title>
        </v-list-item>

        <v-list-item to="#" link>
          <v-icon start>mdi-wallet</v-icon>
          <v-list-item-title>Saldo</v-list-item-title>
        </v-list-item>

        <v-list-item to="#" link>
          <v-icon start>mdi-ticket-percent</v-icon>
          <v-list-item-title>Voucher</v-list-item-title>
        </v-list-item>

        <v-list-item to="#" link>
          <v-icon start>mdi-history</v-icon>
          <v-list-item-title>Transaksi</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <!-- TOP BAR -->
    <v-app-bar app flat>
      <v-spacer />
      <v-btn
        variant="text"
        color="error"
        as="a"
        href="/logout"
        method="post"
      >
        Logout
      </v-btn>
    </v-app-bar>

    <!-- MAIN -->
    <v-main class="app-bg">
      <slot />
    </v-main>
  </v-app>
</template>

<style scoped>
.app-bg {
  background: #f5f7fb;
}
</style>
