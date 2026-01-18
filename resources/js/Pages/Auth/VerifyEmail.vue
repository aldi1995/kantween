<script setup>
import { computed } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import {
  VContainer,
  VRow,
  VCol,
  VCard,
  VBtn,
  VAlert
} from 'vuetify/components'

const props = defineProps({
  status: {
    type: String,
  },
})

const form = useForm({})

const submit = () => {
  form.post(route('verification.send'))
}

const verificationLinkSent = computed(
  () => props.status === 'verification-link-sent'
)
</script>

<template>
  <Head title="Verifikasi Email | Kantin Digital" />

  <v-container fluid class="auth-bg">
    <v-row class="fill-height" align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-card elevation="10" rounded="xl" class="pa-8">
          <!-- HEADER -->
          <div class="text-center mb-6">
            <div class="text-h5 font-weight-bold">
              📧 Verifikasi Email
            </div>
            <p class="text-body-2 text-grey mt-2">
              Sebelum melanjutkan, silakan verifikasi alamat email Anda
            </p>
          </div>

          <!-- INFO -->
          <p class="text-body-2 text-grey-darken-1 mb-4">
            Kami telah mengirimkan email berisi link verifikasi ke alamat email
            yang Anda gunakan saat pendaftaran.  
            Silakan klik link tersebut untuk mengaktifkan akun Anda.
          </p>

          <!-- SUCCESS ALERT -->
          <v-alert
            v-if="verificationLinkSent"
            type="success"
            variant="tonal"
            class="mb-4"
          >
            Link verifikasi baru telah dikirim ke email Anda.
          </v-alert>

          <!-- ACTIONS -->
          <form @submit.prevent="submit">
            <v-btn
              type="submit"
              color="primary"
              size="large"
              block
              :loading="form.processing"
              :disabled="form.processing"
              class="mb-4"
            >
              Kirim Ulang Email Verifikasi
            </v-btn>
          </form>

          <div class="text-center">
            <Link
              :href="route('logout')"
              method="post"
              as="button"
              class="text-caption text-grey text-decoration-none"
            >
              Keluar dari akun
            </Link>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<style scoped>
.auth-bg {
  min-height: 100vh;
  background: linear-gradient(
    135deg,
    #f4f7fb,
    #e9f0fa
  );
}
</style>
