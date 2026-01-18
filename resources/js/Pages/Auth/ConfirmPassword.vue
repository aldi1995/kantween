<script setup>
import { ref } from 'vue'
import { Head, useForm } from '@inertiajs/vue3'
import {
  VContainer,
  VRow,
  VCol,
  VCard,
  VBtn,
  VTextField
} from 'vuetify/components'

const showPassword = ref(false)

const form = useForm({
  password: '',
})

const submit = () => {
  form.post(route('password.confirm'), {
    onFinish: () => form.reset(),
  })
}
</script>

<template>
  <Head title="Konfirmasi Password | Kantin Digital" />

  <v-container fluid class="auth-bg">
    <v-row class="fill-height" align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-card elevation="10" rounded="xl" class="pa-8">
          <!-- HEADER -->
          <div class="text-center mb-6">
            <div class="text-h5 font-weight-bold">
              🔒 Konfirmasi Password
            </div>
            <p class="text-body-2 text-grey mt-2">
              Demi keamanan, silakan masukkan kembali password Anda
            </p>
          </div>

          <!-- FORM -->
          <form @submit.prevent="submit">
            <v-text-field
              v-model="form.password"
              :type="showPassword ? 'text' : 'password'"
              label="Password"
              prepend-inner-icon="mdi-lock"
              :append-inner-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
              @click:append-inner="showPassword = !showPassword"
              :error-messages="form.errors.password"
              required
              autofocus
              autocomplete="current-password"
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
              Konfirmasi
            </v-btn>
          </form>

          <!-- FOOTER -->
          <div class="text-center mt-6 text-caption text-grey">
            Aksi ini diperlukan untuk melanjutkan ke halaman sensitif
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
