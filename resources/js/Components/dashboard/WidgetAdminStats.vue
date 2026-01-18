<template>
  <v-col cols="12">
    <v-card class="pa-6" rounded="xl" elevation="4">
      <h3 class="text-h6 font-weight-bold mb-4">
        📊 Statistik Sistem
      </h3>

      <v-row>
        <v-col cols="12" md="3">
          <div class="stat-item">
            <v-icon color="primary">mdi-account-group</v-icon>
            <div>
              <p class="text-caption text-grey">Total User</p>
              <p class="text-h6 font-weight-bold">128</p>
            </div>
          </div>
        </v-col>

        <v-col cols="12" md="3">
          <div class="stat-item">
            <v-icon color="success">mdi-wallet</v-icon>
            <div>
              <p class="text-caption text-grey">Saldo Beredar</p>
              <p class="text-h6 font-weight-bold">Rp 12.500.000</p>
            </div>
          </div>
        </v-col>

        <v-col cols="12" md="3">
          <div class="stat-item">
            <v-icon color="info">mdi-store</v-icon>
            <div>
              <p class="text-caption text-grey">Kantin Aktif</p>
              <p class="text-h6 font-weight-bold">1</p>
            </div>
          </div>
        </v-col>

        <v-col cols="12" md="3">
          <div class="stat-item">
            <v-icon color="success">mdi-shield-check</v-icon>
            <div>
              <p class="text-caption text-grey">Status Sistem</p>
              <v-chip
                color="success"
                size="small"
                variant="tonal"
              >
                Normal
              </v-chip>
            </div>
          </div>
        </v-col>
      </v-row>
    </v-card>
  </v-col>
</template>

<style scoped>
.stat-item {
  display: flex;
  align-items: center;
  gap: 12px;
}
</style>
