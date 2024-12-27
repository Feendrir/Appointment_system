<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Jadwal</h6>
        </div>
        <div class="card-body">
          <form action="/dokter/jadwal/store" method="post">
            <?= csrf_field() ?>

            <!-- Field Hari -->
            <div class="mb-3">
              <label for="hari" class="form-label">Hari</label>
              <select class="form-select" id="hari" name="hari" required>
                <option value="">Pilih Hari</option>
                <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day): ?>
                  <option value="<?= $day ?>"><?= $day ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Field Jam Mulai -->
            <div class="mb-3">
              <label for="jam_mulai" class="form-label">Jam Mulai</label>
              <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
            </div>

            <!-- Field Jam Selesai -->
            <div class="mb-3">
              <label for="jam_selesai" class="form-label">Jam Selesai</label>
              <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
            </div>

            <!-- Field Status -->
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status" required>
                <option value="">Pilih Status</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
              </select>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-end">
              <a href="/dokter/jadwal" class="btn btn-dark me-2 align-items-center">Batal</a>
              <button type="submit" class="btn btn-primary align-items-center me-3">
                <i class="fas fa-save me-2"></i> Tambah Jadwal
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
