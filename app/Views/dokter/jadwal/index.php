<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
  <?php if (session()->getFlashdata('success')): ?>
    <script>alert('<?= session()->getFlashdata('success') ?>');</script>
  <?php endif; ?>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6 class="mb-0">Jadwal Dokter</h6>
          <a href="/dokter/jadwal/create" class="btn btn-primary btn-sm align-items-center">
            <i class="fas fa-plus me-2"></i> Tambah Jadwal
          </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 5%;">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 25%;">Hari</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">Jam Mulai</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">Jam Selesai</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4" style="width: 15%;">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4" style="width: 15%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($jadwal as $j): ?>
                  <tr>
                    <td class="text-center">
                      <p class="text-sm font-weight-medium mb-0"><?= $i++ ?></p>
                    </td>
                    <td>
                      <h6 class="text-sm font-weight-medium mb-0"><?= esc($j['hari']) ?></h6>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= esc($j['jam_mulai']) ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= esc($j['jam_selesai']) ?></p>
                    </td>
                    <td>
                      <span class="badge bg-<?= $j['status'] === 'aktif' ? 'success' : 'secondary' ?>"><?= ucfirst($j['status']) ?></span>
                    </td>
                    <td class="d-flex justify-content-center">
                      <!-- Tombol Edit -->
                      <?php if (strtolower($j['hari']) === strtolower($today) && $j['status'] === 'aktif'): ?>
                        <button type="button" class="btn btn-primary btn-sm d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;" onclick="showEditError()">
                          <i class="fas fa-edit"></i>
                        </button>
                      <?php else: ?>
                        <a href="/dokter/jadwal/edit/<?= $j['id'] ?>" class="btn btn-primary btn-sm d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                          <i class="fas fa-edit"></i>
                        </a>
                      <?php endif; ?>

                      <!-- Tombol Delete -->
                      <button type="button" class="btn btn-dark btn-sm d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" onclick="alert('Data tidak dapat dihapus karena berhubungan dengan riwayat pasien.');">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php if (empty($jadwal)): ?>
                  <tr>
                    <td colspan="6" class="text-center">Tidak ada data jadwal.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center mt-3">
        <?= $pager->links('default', 'custom_pagination') ?>
      </div>
    </div>
  </div>
</div>

<script>
  function showEditError() {
    alert('Jadwal tidak dapat diubah karena hari ini adalah jadwal pemeriksaan.');
  }
</script>

<?= $this->endSection(); ?>
