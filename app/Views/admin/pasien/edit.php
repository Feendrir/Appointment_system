<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Pasien</h6>
        </div>
        <div class="card-body px-4 pt-4 pb-3">
        <form action="/pasien/update/<?= $pasien['id'] ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
              <label for="no_ktp" class="form-label">Nomor KTP</label>
              <input type="number" class="form-control" id="no_ktp" name="no_ktp" value="<?= esc($pasien['no_ktp']) ?>" placeholder="Masukkan Nomor KTP" required>
            </div>
            
            <div class="mb-4">
              <label for="nama" class="form-label">Nama Pasien</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($pasien['nama']) ?>" placeholder="Masukkan nama pasien" required>
            </div>
            
            <div class="mb-4">
              <label for="no_hp" class="form-label">Nomor Telepon</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= esc($pasien['no_hp']) ?>" placeholder="Masukkan nomor telepon" required>
            </div>

            <div class="mb-4">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?= esc($pasien['alamat']) ?>" placeholder="Masukkan alamat" required>
            </div>
            
            <div class="d-flex justify-content-end">
              <a href="/pasien" class="btn btn-dark me-2 d-flex align-items-center">Batal</a>
              <button type="submit" class="btn btn-primary d-flex align-items-center me-3"><i class="fas fa-save me-2"></i> Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

