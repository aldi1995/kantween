<script setup>
import { ref } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'
import {
  VContainer,
  VRow,
  VCol,
  VCard,
  VBtn,
  VTextField,
  VIcon,
  VAlert
} from 'vuetify/components'

const showPassword = ref(false)
const showPasswordConfirmation = ref(false)

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  })
}
</script>

<template>
  <Head title="Register | Kantin Digital" />

  <v-container fluid class="auth-bg">
    <v-row class="fill-height" align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-card elevation="10" rounded="xl" class="pa-8">
          <!-- HEADER -->
          <div class="text-center mb-6">
            <div class="text-h5 font-weight-bold">
              🍱 Kantin Digital
            </div>
            <p class="text-body-2 text-grey mt-1">
              Buat akun baru untuk mulai menggunakan sistem
            </p>
          </div>

          <!-- FORM -->
          <form @submit.prevent="submit">
            <v-text-field
              v-model="form.name"
              label="Nama Lengkap"
              prepend-inner-icon="mdi-account"
              :error-messages="form.errors.name"
              required
              autofocus
              autocomplete="name"
              class="mb-4"
            />

            <v-text-field
              v-model="form.email"
              label="Email"
              type="email"
              prepend-inner-icon="mdi-email"
              :error-messages="form.errors.email"
              required
              autocomplete="username"
              class="mb-4"
            />

            <v-text-field
              v-model="form.password"
              :type="showPassword ? 'text' : 'password'"
              label="Password"
              prepend-inner-icon="mdi-lock"
              :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
              @click:append-inner="showPassword = !showPassword"
              :error-messages="form.errors.password"
              required
              autocomplete="new-password"
              class="mb-4"
            />

            <v-text-field
              v-model="form.password_confirmation"
              :type="showPasswordConfirmation ? 'text' : 'password'"
              label="Konfirmasi Password"
              prepend-inner-icon="mdi-lock-check"
              :append-inner-icon="showPasswordConfirmation ? 'mdi-eye-off' : 'mdi-eye'"
              @click:append-inner="showPasswordConfirmation = !showPasswordConfirmation"
              :error-messages="form.errors.password_confirmation"
              required
              autocomplete="new-password"
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
              Daftar
            </v-btn>
          </form>

          <!-- FOOTER -->
          <div class="text-center mt-6 text-caption text-grey">
            Sudah punya akun?
            <Link
              href="/login"
              class="text-primary text-decoration-none font-weight-medium"
            >
              Login di sini
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
