<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import {
  VContainer,
  VRow,
  VCol,
  VCard,
  VBtn,
  VTextField,
  VAlert
} from 'vuetify/components'

defineProps({
  status: {
    type: String,
  },
})

const form = useForm({
  email: '',
})

const submit = () => {
  form.post(route('password.email'))
}
</script>

<template>
  <Head title="Lupa Password | Kantin Digital" />

  <v-container fluid class="auth-bg">
    <v-row class="fill-height" align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-card elevation="10" rounded="xl" class="pa-8">
          <!-- HEADER -->
          <div class="text-center mb-6">
            <div class="text-h5 font-weight-bold">
              🔑 Lupa Password
            </div>
            <p class="text-body-2 text-grey mt-2">
              Masukkan email Anda untuk menerima link reset password
            </p>
          </div>

          <!-- STATUS -->
          <v-alert
            v-if="status"
            type="success"
            variant="tonal"
            class="mb-4"
          >
            {{ status }}
          </v-alert>

          <!-- FORM -->
          <form @submit.prevent="submit">
            <v-text-field
              v-model="form.email"
              label="Email"
              type="email"
              prepend-inner-icon="mdi-email"
              :error-messages="form.errors.email"
              required
              autofocus
              autocomplete="username"
              class="mb-6"
            />

            <v-btn
              type="submit"
              color="primary"
              size="large"
              block
              :loading="form.processing"
              :disabled="form.processing"
            >
              Kirim Link Reset Password
            </v-btn>
          </form>

          <!-- FOOTER -->
          <div class="text-center mt-6 text-caption text-grey">
            Silakan cek inbox atau folder spam email Anda
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
