<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Obat</h6>
        </div>
        <div class="card-body px-4 pt-4 pb-3">
        <form action="/obat/update/<?= $obat['id'] ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-4">
              <label for="nama_obat" class="form-label">Nama Obat</label>
              <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= esc($obat['nama_obat']) ?>" placeholder="Masukkan nama obat" required>
            </div>
            
            <div class="mb-4">
              <label for="kemasan" class="form-label">Kemasan</label>
              <input type="text" class="form-control" id="kemasan" name="kemasan" value="<?= esc($obat['kemasan']) ?>" placeholder="Masukkan kemasan obat" required>
            </div>
            
            <div class="mb-4">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" value="<?= esc($obat['harga']) ?>" placeholder="Masukkan harga obat" required>
            </div>
            
            <div class="d-flex justify-content-end">
              <a href="/obat" class="btn btn-dark me-2 d-flex align-items-center">Batal</a>
              <button type="submit" class="btn btn-primary d-flex align-items-center me-3"><i class="fas fa-save me-2"></i> Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

