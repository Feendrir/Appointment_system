<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Profil Dokter</h6>
        </div>
        <div class="card-body px-4 pt-4 pb-3">
          <form action="/dokter/updateProfile" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
              <label for="nama" class="form-label">Nama Dokter</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($dokter['nama']) ?>" placeholder="Masukkan nama dokter" required>
            </div>

            <div class="mb-4">
            <label for="id_poli" class="form-label">Pilih Poli</label>
            <select class="form-select" id="id_poli" name="id_poli" required>
                <option value="">Pilih Poli</option>
                <?php foreach ($poli as $p): ?>
                <option value="<?= esc($p['id']) ?>" <?= $dokter['id_poli'] == $p['id'] ? 'selected' : '' ?>>
                    <?= esc($p['nama_poli']) ?>
                </option>
                <?php endforeach; ?>
            </select>
            </div>

            <div class="mb-4">
              <label for="no_hp" class="form-label">Nomor Telepon</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= esc($dokter['no_hp']) ?>" placeholder="Masukkan nomor telepon" required>
            </div>

            <div class="mb-4">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" rows="3" required><?= esc($dokter['alamat']) ?></textarea>
            </div>

            <div class="d-flex justify-content-end">
              <a href="/dokter/setting" class="btn btn-dark me-2">Batal</a>
              <button type="submit" class="btn btn-primary me-3">
                <i class="fas fa-save me-2"></i> Simpan Perubahan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
