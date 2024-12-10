<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Poli</h6>
        </div>
        <div class="card-body">
          <form action="/poli/update/<?= $poli['id'] ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label for="nama_poli" class="form-label">Nama Poli</label>
              <input type="text" class="form-control" id="nama_poli" name="nama_poli" value="<?= $poli['nama_poli'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan</label>
              <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required><?= $poli['keterangan'] ?></textarea>
            </div>

            <div class="d-flex justify-content-end">
              <a href="/poli" class="btn btn-dark me-2 align-items-center">Batal</a>
              <button type="submit" class="btn btn-primary align-items-center me-3"><i class="fas fa-save me-2"></i> Simpan Perubahan</button>
            </div>
            <!-- <div class="d-flex justify-content-end">
              <a href="/poli" class="btn btn-secondary me-2">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
