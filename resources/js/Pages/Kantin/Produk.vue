<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, useForm, router } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
  products: Array,
  menus: Array,
})

const showDialog = ref(false)
const isEdit = ref(false)
const activeId = ref(null)

const form = useForm({
  kantin_menu_id: '',
  name: '',
  category: '',
  price: '',
  stock: '',
})

const openCreate = () => {
  form.reset()
  isEdit.value = false
  showDialog.value = true
}

const openEdit = (product) => {
  form.kantin_menu_id = product.kantin_menu_id
  form.name = product.name
  form.category = product.category
  form.price = product.price
  form.stock = product.stock
  activeId.value = product.id
  isEdit.value = true
  showDialog.value = true
}

const submit = () => {
  if (isEdit.value) {
    form.put(`/kantin/produk/${activeId.value}`, {
      onSuccess: () => showDialog.value = false,
    })
  } else {
    form.post('/kantin/produk', {
      onSuccess: () => showDialog.value = false,
    })
  }
}

const toggleStatus = (product) => {
  router.patch(`/kantin/produk/${product.id}/toggle`)
}
</script>

<template>
  <Head title="Produk Kantin | Kantween" />

  <AppLayout>
    <v-container fluid>
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Produk Kantin</h1>
          <p class="text-caption text-grey">
            Kelola produk makanan dan minuman
          </p>
        </div>

        <v-btn color="primary" prepend-icon="mdi-plus" @click="openCreate">
          Tambah Produk
        </v-btn>
      </div>

      <v-card rounded="xl">
        <v-table>
          <thead>
            <tr>
              <th>Produk</th>
              <th>Menu</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Status</th>
              <th class="text-end">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="p in products" :key="p.id">
              <td>{{ p.name }}</td>
              <td>{{ p.menu?.name }}</td>
              <td>{{ p.category }}</td>
              <td>Rp {{ p.price.toLocaleString() }}</td>
              <td>{{ p.stock }}</td>
              <td>
                <v-chip size="small" :color="p.is_active ? 'success' : 'grey'">
                  {{ p.is_active ? 'Aktif' : 'Nonaktif' }}
                </v-chip>
              </td>
              <td class="text-end">
                <v-btn size="small" variant="text" @click="openEdit(p)">
                  Edit
                </v-btn>
                <v-btn
                  size="small"
                  variant="text"
                  :color="p.is_active ? 'error' : 'success'"
                  @click="toggleStatus(p)"
                >
                  {{ p.is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                </v-btn>
              </td>
            </tr>
          </tbody>
        </v-table>
      </v-card>
    </v-container>

    <!-- MODAL -->
    <v-dialog v-model="showDialog" max-width="500">
      <v-card rounded="xl">
        <v-card-title>{{ isEdit ? 'Edit Produk' : 'Tambah Produk' }}</v-card-title>

        <v-card-text>
          <v-select
            label="Menu"
            :items="menus"
            item-title="name"
            item-value="id"
            v-model="form.kantin_menu_id"
          />

          <v-text-field label="Nama Produk" v-model="form.name" />
          <v-text-field label="Kategori" v-model="form.category" />
          <v-text-field label="Harga" type="number" v-model="form.price" />
          <v-text-field label="Stok" type="number" v-model="form.stock" />
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
