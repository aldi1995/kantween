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
  VCheckbox,
  VIcon,
  VAlert
} from 'vuetify/components'

defineProps({
  canResetPassword: Boolean,
  status: String,
})

const showPassword = ref(false)

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  })
}
</script>

<template>
  <Head title="Login | Kantin Digital" />

  <v-container fluid class="login-bg">
    <v-row class="fill-height" align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-card elevation="10" rounded="xl" class="pa-8">
          <!-- HEADER -->
          <div class="text-center mb-6">
            <div class="text-h5 font-weight-bold">
              🍱 Kantin Digital
            </div>
            <p class="text-body-2 text-grey mt-1">
              Silakan login untuk melanjutkan
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
              autocomplete="email"
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
              autocomplete="current-password"
              class="mb-2"
            />

            <div class="d-flex justify-space-between align-center mb-6">
              <v-checkbox
                v-model="form.remember"
                label="Remember me"
                density="compact"
              />

              <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="text-caption text-decoration-none"
              >
                Lupa password?
              </Link>
            </div>

            <v-btn
              type="submit"
              color="primary"
              size="large"
              block
              :loading="form.processing"
              :disabled="form.processing"
            >
              Login
            </v-btn>
          </form>

          <!-- FOOTER -->
          <div class="text-center mt-6 text-caption text-grey">
            Belum punya akun?
            <Link
              href="/register"
              class="text-primary text-decoration-none font-weight-medium"
            >
              Daftar sekarang
            </Link>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<style scoped>
.login-bg {
  min-height: 100vh;
  background: linear-gradient(
    135deg,
    #f4f7fb,
    #e9f0fa
  );
}
</style>
