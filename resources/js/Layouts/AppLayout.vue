<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import { useDisplay } from 'vuetify'

/**
 * ===============================
 * ROLE UI ONLY (SEMENTARA)
 * ===============================
 */
const role = 'admin' // admin | kasir | siswa

const isAdmin = role === 'admin'
const isKasir = role === 'kasir'
const isSiswa = role === 'siswa'

/**
 * Drawer responsive
 */
const drawer = ref(true)
const { mdAndUp } = useDisplay()

/**
 * ===============================
 * LOGOUT CONFIRMATION + TOAST
 * ===============================
 */
const showLogoutDialog = ref(false)
const snackbar = ref(false)
const snackbarText = ref('')
const snackbarColor = ref('success')

const confirmLogout = () => {
  showLogoutDialog.value = true
}

const doLogout = () => {
  showLogoutDialog.value = false
  router.post(route('logout'), {}, {
    onFinish: () => {
      snackbarText.value = 'Berhasil logout'
      snackbarColor.value = 'success'
      snackbar.value = true
    }
  })
}
</script>

<template>
  <v-app>
    <!-- ================= SIDEBAR ================= -->
    <v-navigation-drawer
      v-model="drawer"
      :permanent="mdAndUp"
      width="280"
    >
      <!-- LOGO -->
      <div class="pa-4 text-h6 font-weight-bold">
        🍱 Kantween
      </div>

      <v-divider />

      <!-- ================= CORE ================= -->
      <v-list nav density="comfortable">
        <v-list-subheader>CORE</v-list-subheader>

        <v-list-item
          link
          @click="router.visit('/dashboard')"
        >
          <template #prepend>
            <v-icon>mdi-view-dashboard</v-icon>
          </template>
          Dashboard
        </v-list-item>
      </v-list>

      <!-- ================= SISWA ================= -->
      <v-list nav density="comfortable" v-if="isSiswa">
        <v-list-subheader>SISWA</v-list-subheader>

        <v-list-item @click="router.visit('/siswa/saldo')">
          <template #prepend>
            <v-icon>mdi-wallet</v-icon>
          </template>
          Saldo
        </v-list-item>

        <v-list-item @click="router.visit('/voucher/saya')">
          <template #prepend>
            <v-icon>mdi-ticket-percent</v-icon>
          </template>
          Voucher Saya
        </v-list-item>

        <v-list-item @click="router.visit('/transaksi/saya')">
          <template #prepend>
            <v-icon>mdi-history</v-icon>
          </template>
          Riwayat Transaksi
        </v-list-item>
      </v-list>

      <!-- ================= KASIR ================= -->
      <v-list nav density="comfortable" v-if="isKasir">
        <v-list-subheader>KASIR</v-list-subheader>

        <v-list-item @click="router.visit('/kasir/transaksi')">
          <template #prepend>
            <v-icon>mdi-cash-register</v-icon>
          </template>
          Transaksi
        </v-list-item>

        <v-list-item @click="router.visit('/kasir/scan')">
          <template #prepend>
            <v-icon>mdi-qrcode-scan</v-icon>
          </template>
          Scan Transaksi
        </v-list-item>
      </v-list>

      <!-- ================= KANTIN ================= -->
      <v-list nav density="comfortable" v-if="isAdmin || isKasir">
        <v-list-subheader>KANTIN</v-list-subheader>

        <v-list-item @click="router.visit('/kantin/menu')">
          <template #prepend>
            <v-icon>mdi-store</v-icon>
          </template>
          Menu Kantin
        </v-list-item>

        <v-list-item @click="router.visit('/kantin/produk')">
          <template #prepend>
            <v-icon>mdi-food</v-icon>
          </template>
          Produk
        </v-list-item>

        <v-list-item @click="router.visit('/kantin/stok-status')">
          <template #prepend>
            <v-icon>mdi-archive</v-icon>
          </template>
          Stok & Status
        </v-list-item>
      </v-list>

      <!-- ================= VOUCHER ================= -->
      <v-list nav density="comfortable" v-if="isAdmin">
        <v-list-subheader>VOUCHER</v-list-subheader>

        <v-list-group value="voucher">
          <template #activator="{ props }">
            <v-list-item v-bind="props">
              <template #prepend>
                <v-icon>mdi-ticket-confirmation</v-icon>
              </template>
              Voucher
            </v-list-item>
          </template>

          <v-list-item class="ms-6" @click="router.visit('/voucher/aktif')">
            Voucher Aktif
          </v-list-item>

          <v-list-item class="ms-6" @click="router.visit('/voucher/expired')">
            Voucher Expired
          </v-list-item>

          <v-list-item class="ms-6" @click="router.visit('/voucher/distribusi')">
            Distribusi Voucher
          </v-list-item>
        </v-list-group>
      </v-list>

      <!-- ================= KEUANGAN ================= -->
      <v-list nav density="comfortable" v-if="isAdmin">
        <v-list-subheader>KEUANGAN</v-list-subheader>

        <v-list-item @click="router.visit('/keuangan/saldo-siswa')">
          <template #prepend>
            <v-icon>mdi-cash</v-icon>
          </template>
          Saldo Siswa
        </v-list-item>

        <v-list-item @click="router.visit('/keuangan/top-up')">
          <template #prepend>
            <v-icon>mdi-plus-circle</v-icon>
          </template>
          Top Up
        </v-list-item>

        <v-list-item @click="router.visit('/keuangan/penyesuaian-saldo')">
          <template #prepend>
            <v-icon>mdi-scale-balance</v-icon>
          </template>
          Penyesuaian Saldo
        </v-list-item>
      </v-list>

      <!-- ================= LAPORAN ================= -->
      <v-list nav density="comfortable" v-if="isAdmin">
        <v-list-subheader>LAPORAN</v-list-subheader>

        <v-list-item @click="router.visit('/laporan/harian')">
          <template #prepend>
            <v-icon>mdi-file-chart</v-icon>
          </template>
          Laporan Harian
        </v-list-item>

        <v-list-item @click="router.visit('/laporan/bulanan')">
          <template #prepend>
            <v-icon>mdi-calendar-month</v-icon>
          </template>
          Laporan Bulanan
        </v-list-item>
      </v-list>

      <!-- ================= SISTEM ================= -->
      <v-list nav density="comfortable" v-if="isAdmin">
        <v-list-subheader>SISTEM</v-list-subheader>

        <v-list-item @click="router.visit('/sistem/pengaturan')">
          <template #prepend>
            <v-icon>mdi-cog</v-icon>
          </template>
          Pengaturan
        </v-list-item>

        <v-list-item @click="router.visit('/sistem/audit-log')">
          <template #prepend>
            <v-icon>mdi-shield-search</v-icon>
          </template>
          Audit Log
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <!-- ================= TOP BAR ================= -->
    <v-app-bar app flat>
      <v-app-bar-nav-icon
        v-if="!mdAndUp"
        @click="drawer = !drawer"
      />
      <v-spacer />
      <v-btn variant="text" color="error" @click="confirmLogout">
        Logout
      </v-btn>
    </v-app-bar>

    <!-- ================= MAIN ================= -->
    <v-main class="bg">
      <slot />
    </v-main>

    <!-- ================= LOGOUT DIALOG ================= -->
    <v-dialog v-model="showLogoutDialog" max-width="400">
      <v-card rounded="xl">
        <v-card-title class="text-h6">Konfirmasi Logout</v-card-title>
        <v-card-text>
          Apakah Anda yakin ingin keluar dari aplikasi?
        </v-card-text>
        <v-card-actions class="justify-end">
          <v-btn variant="text" @click="showLogoutDialog = false">
            Batal
          </v-btn>
          <v-btn color="error" variant="flat" @click="doLogout">
            Logout
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!-- ================= TOAST ================= -->
    <v-snackbar
      v-model="snackbar"
      :color="snackbarColor"
      timeout="2500"
      location="top right"
    >
      {{ snackbarText }}
    </v-snackbar>
  </v-app>
</template>

<style scoped>
.bg {
  background: #f5f7fb;
}
</style>
