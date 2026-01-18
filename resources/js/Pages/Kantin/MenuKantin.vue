<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm, router } from '@inertiajs/vue3'
import { ref } from 'vue'

/**
 * ===============================
 * PROPS DARI BACKEND
 * ===============================
 */
const props = defineProps({
  menus: Array,
})

/**
 * ===============================
 * MODAL STATE
 * ===============================
 */
const showDialog = ref(false)
const isEdit = ref(false)
const activeId = ref(null)

/**
 * ===============================
 * FORM (INERTIA)
 * ===============================
 */
const form = useForm({
  name: '',
  start_time: '',
  end_time: '',
})

const openCreate = () => {
  form.reset()
  isEdit.value = false
  activeId.value = null
  showDialog.value = true
}

const openEdit = (menu) => {
  form.name = menu.name
  form.start_time = menu.start_time
  form.end_time = menu.end_time
  activeId.value = menu.id
  isEdit.value = true
  showDialog.value = true
}

const submit = () => {
  if (isEdit.value) {
    form.put(`/kantin/menu/${activeId.value}`, {
      onSuccess: () => showDialog.value = false,
    })
  } else {
    form.post('/kantin/menu', {
      onSuccess: () => showDialog.value = false,
    })
  }
}

const toggleStatus = (menu) => {
  router.patch(`/kantin/menu/${menu.id}/toggle`)
}
</script>

<template>
  <Head title="Menu Kantin | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Menu Kantin</h1>
          <p class="text-caption text-grey">
            Kelola menu yang tersedia di kantin
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-plus" @click="openCreate">
          Tambah Menu
        </v-btn>
      </div>

      <!-- EMPTY -->
      <v-row v-if="menus.length === 0">
        <v-col cols="12">
          <v-card rounded="xl">
            <v-card-text>
              <v-empty-state
                icon="mdi-store-off"
                title="Belum ada menu"
                text="Menu kantin akan ditampilkan di sini"
              />
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>

      <!-- MENU CARDS -->
      <v-row>
        <v-col v-for="menu in menus" :key="menu.id" cols="12" md="4">
          <v-card rounded="xl" class="h-100">
            <v-card-title class="d-flex justify-space-between">
              <div>
                <div class="font-weight-bold">{{ menu.name }}</div>
                <div class="text-caption text-grey">
                  {{ menu.start_time }} - {{ menu.end_time }}
                </div>
              </div>

              <v-chip
                size="small"
                :color="menu.is_active ? 'success' : 'grey'"
              >
                {{ menu.is_active ? 'Aktif' : 'Nonaktif' }}
              </v-chip>
            </v-card-title>

            <v-card-text>
              <v-icon size="18" class="me-2">mdi-food</v-icon>
              {{ menu.product_count }} produk
            </v-card-text>

            <v-divider />

            <v-card-actions class="justify-end">
              <v-btn size="small" variant="text" @click="openEdit(menu)">
                Edit
              </v-btn>

              <v-btn
                size="small"
                variant="text"
                :color="menu.is_active ? 'error' : 'success'"
                @click="toggleStatus(menu)"
              >
                {{ menu.is_active ? 'Nonaktifkan' : 'Aktifkan' }}
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

    <!-- MODAL -->
    <v-dialog v-model="showDialog" max-width="500">
      <v-card rounded="xl">
        <v-card-title>{{ isEdit ? 'Edit Menu' : 'Tambah Menu' }}</v-card-title>

        <v-card-text>
          <v-text-field label="Nama Menu" v-model="form.name" />
          <v-text-field type="time" label="Jam Mulai" v-model="form.start_time" />
          <v-text-field type="time" label="Jam Selesai" v-model="form.end_time" />
        </v-card-text>

        <v-card-actions class="justify-end">
          <v-btn variant="text" @click="showDialog = false">Batal</v-btn>
          <v-btn color="primary" @click="submit" :loading="form.processing">
            Simpan
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </AppLayout>
</template>
