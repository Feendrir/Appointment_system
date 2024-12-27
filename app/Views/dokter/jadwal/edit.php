<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Jadwal</h6>
        </div>
        <div class="card-body">
          <form action="/dokter/jadwal/update/<?= $jadwal['id'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
              <label for="hari" class="form-label">Hari</label>
              <select class="form-select" id="hari" name="hari" required>
                <option value="">Pilih Hari</option>
                <?php foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day): ?>
                  <option value="<?= $day ?>" <?= $jadwal['hari'] === $day ? 'selected' : '' ?>><?= $day ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="jam_mulai" class="form-label">Jam Mulai</label>
              <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?= esc($jadwal['jam_mulai']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="jam_selesai" class="form-label">Jam Selesai</label>
              <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?= esc($jadwal['jam_selesai']) ?>" required>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status" <?= ($jadwal['status'] === 'aktif' && strtolower($jadwal['hari']) === $today) ? 'disabled' : '' ?>>
                <option value="aktif" <?= $jadwal['status'] === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="nonaktif" <?= $jadwal['status'] === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
              </select>
              <?php if ($jadwal['status'] === 'aktif' && strtolower($jadwal['hari']) === $today): ?>
                <input type="hidden" name="status" value="aktif">
              <?php endif; ?>
            </div>
            <div class="d-flex justify-content-end">
              <a href="/dokter/jadwal" class="btn btn-dark me-2 align-items-center">Batal</a>
              <button type="submit" class="btn btn-primary align-items-center me-3"><i class="fas fa-save me-2"></i> Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
