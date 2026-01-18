<script setup>
defineProps({
  name: {
    type: String,
    required: true,
  },
  timeRange: {
    type: String,
    default: '-',
  },
  productCount: {
    type: Number,
    default: 0,
  },
  isActive: {
    type: Boolean,
    default: true,
  },
})
</script>

<template>
  <v-card
    rounded="xl"
    class="h-100"
    :variant="isActive ? 'elevated' : 'tonal'"
  >
    <!-- HEADER -->
    <v-card-title class="d-flex justify-space-between align-center">
      <div>
        <div class="text-subtitle-1 font-weight-bold">
          {{ name }}
        </div>
        <div class="text-caption text-medium-emphasis">
          {{ timeRange }}
        </div>
      </div>

      <v-chip
        size="small"
        :color="isActive ? 'success' : 'grey'"
        variant="flat"
      >
        {{ isActive ? 'Aktif' : 'Nonaktif' }}
      </v-chip>
    </v-card-title>

    <!-- CONTENT -->
    <v-card-text>
      <div class="d-flex align-center">
        <v-icon size="20" class="me-2">mdi-food</v-icon>
        <span>{{ productCount }} produk</span>
      </div>
    </v-card-text>

    <v-divider />

    <!-- ACTIONS -->
    <v-card-actions class="justify-end">
      <slot name="actions">
        <v-btn size="small" variant="text">
          Detail
        </v-btn>
      </slot>
    </v-card-actions>
  </v-card>
</template>
