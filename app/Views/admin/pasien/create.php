<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Pasien</h6>
        </div>
        <div class="card-body px-4 pt-4 pb-3">
          <form action="/pasien/store" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-4">
              <label for="no_ktp" class="form-label">No KTP</label>
              <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukkan nomor KTP pasien" required>
            </div>

            <div class="mb-4">
              <label for="nama" class="form-label">Nama Pasien</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pasien" required>
            </div>

            <div class="mb-4">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat pasien" required>
            </div>

            <div class="mb-4">
              <label for="no_hp" class="form-label">No HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan no hp pasien" required>
            </div>

            <div class="d-flex justify-content-end">
              <a href="/pasien" class="btn btn-dark me-2">Batal</a>
              <button type="submit" class="btn btn-primary me-3"><i class="fas fa-save me-2"></i> Tambah Pasien</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
