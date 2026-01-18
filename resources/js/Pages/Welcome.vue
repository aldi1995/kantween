<script setup>
import { Head } from '@inertiajs/vue3'
import {
  VApp,
  VAppBar,
  VMain,
  VContainer,
  VRow,
  VCol,
  VCard,
  VBtn,
  VSpacer,
  VIcon,
  VDivider
} from 'vuetify/components'

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
})
</script>

<template>
  <Head title="Kantin Digital Sekolah" />

  <v-app class="landing-bg">
    <!-- ================= APP BAR ================= -->
    <v-app-bar flat elevation="0" class="px-6 app-bar">
      <div class="logo">
        🍱 <strong>KANTIN DIGITAL</strong>
      </div>
      <v-spacer />
      <v-btn
        v-if="canLogin"
        href="/login"
        variant="text"
        class="me-2"
      >
        Login
      </v-btn>
      <v-btn
        v-if="canRegister"
        href="/register"
        color="primary"
        rounded="lg"
      >
        Daftar
      </v-btn>
    </v-app-bar>

    <!-- ================= MAIN ================= -->
    <v-main>
      <!-- HERO SECTION -->
      <v-container class="hero-section">
        <v-row align="center">
          <!-- LEFT CONTENT -->
          <v-col cols="12" md="6">
            <h1 class="hero-title">
              Kantin Sekolah<br />
              <span class="text-primary">Lebih Cepat & Cashless</span>
            </h1>

            <p class="hero-subtitle">
              Sistem kantin digital untuk siswa, kasir, dan sekolah.
              Kelola saldo, voucher makan, dan transaksi secara
              <strong>aman, cepat, dan transparan</strong>.
            </p>

            <div class="hero-actions">
              <v-btn
                href="/login"
                color="primary"
                size="large"
                rounded="lg"
                class="me-4"
              >
                Mulai Sekarang
              </v-btn>

              <v-btn
                href="#fitur"
                variant="outlined"
                size="large"
                rounded="lg"
              >
                Lihat Fitur
              </v-btn>
            </div>
          </v-col>

          <!-- RIGHT CARD -->
          <v-col cols="12" md="6">
            <v-card
              class="feature-card"
              rounded="xl"
              elevation="8"
            >
              <v-row>
                <v-col cols="12" sm="6">
                  <FeatureItem
                    icon="mdi-wallet"
                    title="Saldo Digital"
                    desc="Top up saldo dan bayar tanpa uang tunai"
                  />
                </v-col>

                <v-col cols="12" sm="6">
                  <FeatureItem
                    icon="mdi-ticket-percent"
                    title="Voucher Makan"
                    desc="Voucher otomatis & memiliki masa berlaku"
                  />
                </v-col>

                <v-col cols="12" sm="6">
                  <FeatureItem
                    icon="mdi-history"
                    title="Riwayat Transaksi"
                    desc="Transaksi tercatat secara real-time"
                  />
                </v-col>

                <v-col cols="12" sm="6">
                  <FeatureItem
                    icon="mdi-chart-line"
                    title="Laporan Kantin"
                    desc="Monitoring transaksi harian & bulanan"
                  />
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>

      <!-- ================= FEATURES SECTION ================= -->
      <v-container id="fitur" class="feature-section">
        <v-row justify="center">
          <v-col cols="12" md="8" class="text-center">
            <h2 class="section-title">
              Kenapa Pakai Kantin Digital?
            </h2>
            <p class="section-subtitle">
              Solusi modern untuk kantin sekolah yang lebih
              tertib, transparan, dan efisien.
            </p>
          </v-col>
        </v-row>

        <v-row class="mt-10">
          <v-col cols="12" md="4">
            <InfoCard
              icon="mdi-school"
              title="Untuk Sekolah"
              desc="Monitoring kantin, laporan keuangan, dan kontrol penuh."
            />
          </v-col>

          <v-col cols="12" md="4">
            <InfoCard
              icon="mdi-account-school"
              title="Untuk Siswa"
              desc="Bayar cepat, aman, dan riwayat transaksi transparan."
            />
          </v-col>

          <v-col cols="12" md="4">
            <InfoCard
              icon="mdi-store"
              title="Untuk Kasir"
              desc="Proses transaksi cepat dan minim kesalahan."
            />
          </v-col>
        </v-row>
      </v-container>

      <!-- ================= FOOTER ================= -->
      <v-divider class="my-12" />

      <v-container class="footer text-center">
        <p class="text-body-2 text-grey">
          © {{ new Date().getFullYear() }} Kantin Digital Sekolah.
          All rights reserved.
        </p>
      </v-container>
    </v-main>
  </v-app>
</template>

<!-- ================= SUB COMPONENTS ================= -->
<script>
export default {
  components: {
    FeatureItem: {
      props: ['icon', 'title', 'desc'],
      template: `
        <div class="feature-item">
          <v-icon size="36" color="primary">{{ icon }}</v-icon>
          <h3 class="text-h6 mt-3">{{ title }}</h3>
          <p class="text-body-2 text-grey">{{ desc }}</p>
        </div>
      `,
    },
    InfoCard: {
      props: ['icon', 'title', 'desc'],
      template: `
        <v-card class="info-card" elevation="4" rounded="xl">
          <v-icon size="40" color="primary">{{ icon }}</v-icon>
          <h3 class="text-h6 mt-4">{{ title }}</h3>
          <p class="text-body-2 text-grey mt-2">{{ desc }}</p>
        </v-card>
      `,
    },
  },
}
</script>

<style scoped>
/* ===== GLOBAL ===== */
.landing-bg {
  background: linear-gradient(135deg, #f4f7fb, #e9f0fa);
}

/* ===== APP BAR ===== */
.app-bar {
  background: transparent;
}

.logo {
  font-size: 18px;
}

/* ===== HERO ===== */
.hero-section {
  min-height: calc(100vh - 64px);
  display: flex;
  align-items: center;
}

.hero-title {
  font-size: 42px;
  font-weight: 800;
  line-height: 1.2;
}

.hero-subtitle {
  margin-top: 20px;
  font-size: 16px;
  color: #555;
  max-width: 500px;
}

.hero-actions {
  margin-top: 30px;
}

/* ===== FEATURE CARD ===== */
.feature-card {
  padding: 30px;
}

.feature-item {
  padding: 20px;
}

/* ===== FEATURE SECTION ===== */
.feature-section {
  padding: 80px 0;
}

.section-title {
  font-size: 32px;
  font-weight: 700;
}

.section-subtitle {
  margin-top: 12px;
  color: #666;
}

/* ===== INFO CARD ===== */
.info-card {
  padding: 30px;
  text-align: center;
  height: 100%;
}

/* ===== FOOTER ===== */
.footer {
  padding-bottom: 40px;
}
</style>
