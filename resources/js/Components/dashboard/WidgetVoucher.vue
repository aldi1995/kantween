<template>
  <v-col cols="12" md="4">
    <v-card class="pa-5" rounded="xl" elevation="4">
      <div class="d-flex align-center justify-space-between">
        <div>
          <h3 class="text-body-2 text-grey">Voucher Aktif</h3>
          <p class="text-h5 font-weight-bold mt-1">
            3 Voucher
          </p>
        </div>
        <v-icon size="42" color="success">
          mdi-ticket-percent
        </v-icon>
      </div>

      <v-divider class="my-4" />

      <v-chip
        size="small"
        color="success"
        variant="tonal"
      >
        Berlaku sampai hari ini
      </v-chip>
    </v-card>
  </v-col>
</template>
