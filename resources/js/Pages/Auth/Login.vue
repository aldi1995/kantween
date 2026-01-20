<template>
  <v-container class="d-flex justify-center align-center" style="min-height: 100vh;">
    <Head title="Log in" />

    <v-card width="420" elevation="8">
      <v-card-title class="text-h5 font-weight-bold text-center">
        Login Kantin
      </v-card-title>

      <v-card-subtitle class="text-center mb-2">
        NISN / Username / Email
      </v-card-subtitle>

      <v-divider />

      <v-card-text>
        <form @submit.prevent="submit">
          <!-- LOGIN ID -->
          <v-text-field
            v-model="form.email"
            label="Login ID"
            placeholder="NISN / Username / Email"
            prepend-inner-icon="mdi-account"
            :error-messages="form.errors.email"
            required
            autofocus
            autocomplete="username"
          />

          <!-- PASSWORD -->
          <v-text-field
            v-model="form.password"
            :type="showPassword ? 'text' : 'password'"
            label="Password"
            prepend-inner-icon="mdi-lock"
            :append-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
            @click:append="showPassword = !showPassword"
            :error-messages="form.errors.password"
            required
            autocomplete="current-password"
          />

          <!-- REMEMBER -->
          <v-checkbox
            v-model="form.remember"
            label="Ingat saya"
            density="compact"
            class="mt-1"
          />

          <!-- STATUS -->
          <v-alert
            v-if="status"
            type="info"
            variant="tonal"
            class="mb-3"
          >
            {{ status }}
          </v-alert>

          <!-- ACTION -->
          <div class="d-flex justify-space-between align-center mt-4">
            <Link
              v-if="canResetPassword"
              :href="route('password.request')"
              class="text-decoration-underline text-caption"
            >
              Lupa password?
            </Link>

            <v-btn
              color="primary"
              type="submit"
              :loading="form.processing"
              :disabled="form.processing"
            >
              Masuk
            </v-btn>
          </div>
        </form>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script setup>
import { ref } from 'vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

defineProps({
  canResetPassword: Boolean,
  status: String,
})

const showPassword = ref(false)

const form = useForm({
  email: '',     // login universal
  password: '',
  remember: false,
})

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  })
}
</script>
