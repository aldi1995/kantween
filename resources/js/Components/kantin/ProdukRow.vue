<script setup>
defineProps({
  name: {
    type: String,
    required: true,
  },
  category: {
    type: String,
    default: '-',
  },
  price: {
    type: Number,
    required: true,
  },
  stock: {
    type: Number,
    default: 0,
  },
  isAvailable: {
    type: Boolean,
    default: true,
  },
})
</script>

<template>
  <tr>
    <!-- NAMA -->
    <td class="font-weight-medium">
      {{ name }}
    </td>

    <!-- KATEGORI -->
    <td>
      {{ category }}
    </td>

    <!-- HARGA -->
    <td>
      Rp {{ price.toLocaleString('id-ID') }}
    </td>

    <!-- STOK -->
    <td>
      <v-chip
        size="small"
        :color="stock > 0 ? 'primary' : 'grey'"
        variant="tonal"
      >
        {{ stock }}
      </v-chip>
    </td>

    <!-- STATUS -->
    <td>
      <v-chip
        size="small"
        :color="isAvailable ? 'success' : 'error'"
        variant="flat"
      >
        {{ isAvailable ? 'Tersedia' : 'Habis' }}
      </v-chip>
    </td>

    <!-- ACTION -->
    <td class="text-end">
      <slot name="actions">
        <v-btn size="small" variant="text">
          Edit
        </v-btn>
      </slot>
    </td>
  </tr>
</template>
