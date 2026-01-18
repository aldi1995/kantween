<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, router, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

/**
 * ===============================
 * PROPS DARI BACKEND
 * ===============================
 */
const props = defineProps({
  products: Array,
})

/**
 * ===============================
 * MODAL EDIT STOK
 * ===============================
 */
const showDialog = ref(false)
const activeProduct = ref(null)

const form = useForm({
  stock: 0,
})

const openEditStock = (product) => {
  activeProduct.value = product
  form.stock = product.stock
  showDialog.value = true
}

const saveStock = () => {
  if (!activeProduct.value) return

  form.patch(`/kantin/stok-status/${activeProduct.value.id}`, {
    onSuccess: () => {
      showDialog.value = false
      activeProduct.value = null
    },
  })
}

/**
 * ===============================
 * TOGGLE STATUS
 * ===============================
 */
const toggleStatus = (product) => {
  router.patch(`/kantin/produk/${product.id}/toggle`)
}
</script>

<template>
  <Head title="Stok & Status | Kantween" />

  <AppLayout>
    <v-container fluid>
      <!-- HEADER -->
      <div class="d-flex justify-space-between align-center mb-6">
        <div>
          <h1 class="text-h5 font-weight-bold">Stok & Status</h1>
          <p class="text-caption text-grey">
            Kelola ketersediaan dan stok produk kantin
          </p>
        </div>
      </div>

      <!-- TABLE -->
      <v-card rounded="xl">
        <v-card-text>
          <v-data-table
            :items="products"
            item-key="id"
            density="comfortable"
          >
            <!-- HEADER -->
            <template #headers>
              <tr>
                <th>Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Status</th>
                <th class="text-end">Aksi</th>
              </tr>
            </template>

            <!-- ROW -->
            <template #item="{ item }">
              <tr>
                <td class="font-weight-medium">
                  {{ item.name }}
                </td>

                <td>{{ item.category }}</td>

                <td>
                  <v-chip
                    size="small"
                    variant="tonal"
                    :color="item.stock > 0 ? 'primary' : 'grey'"
                  >
                    {{ item.stock }}
                  </v-chip>
                </td>

                <td>
                  <v-chip
                    size="small"
                    :color="item.is_active && item.stock > 0 ? 'success' : 'error'"
                    variant="flat"
                  >
                    {{
                      item.is_active && item.stock > 0
                        ? 'Tersedia'
                        : 'Habis'
                    }}
                  </v-chip>
                </td>

                <td class="text-end">
                  <v-btn
                    size="small"
                    variant="text"
                    color="primary"
                    @click="openEditStock(item)"
                  >
                    Edit Stok
                  </v-btn>

                  <v-btn
                    size="small"
                    variant="text"
                    :color="item.is_active ? 'error' : 'success'"
                    @click="toggleStatus(item)"
                  >
                    {{ item.is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                  </v-btn>
                </td>
              </tr>
            </template>
          </v-data-table>
        </v-card-text>
      </v-card>
    </v-container>

    <!-- MODAL EDIT STOK -->
    <v-dialog v-model="showDialog" max-width="400">
      <v-card rounded="xl">
        <v-card-title class="text-h6">
          Edit Stok
        </v-card-title>

        <v-card-text>
          <div class="mb-2 font-weight-medium">
            {{ activeProduct?.name }}
          </div>

          <v-text-field
            label="Jumlah Stok"
            type="number"
            v-model="form.stock"
            min="0"
          />
        </v-card-text>

        <v-card-actions class="justify-end">
          <v-btn variant="text" @click="showDialog = false">
            Batal
          </v-btn>

          <v-btn
            color="primary"
            variant="flat"
            @click="saveStock"
            :loading="form.processing"
          >
            Simpan
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </AppLayout>
</template>
