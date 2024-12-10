<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Dokter</h6>
                </div>
                <div class="card-body px-4 pt-4 pb-3">
                    <form action="/dokter/store" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama dokter" required>
                        </div>

                        <div class="mb-4">
                            <label for="id_poli" class="form-label">Pilih Poli</label>
                            <select class="form-select" id="id_poli" name="id_poli" required>
                                <option value="">Pilih Poli</option>
                                <?php foreach ($poli as $p): ?>
                                    <option value="<?= $p['id'] ?>"><?= esc($p['nama_poli']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="no_hp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor telepon" required>
                        </div>

                        <div class="mb-4">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="/dokter" class="btn btn-dark me-2 align-items-center">Batal</a>
                            <button type="submit" class="btn btn-primary align-items-center me-3"><i class="fas fa-save me-2"></i> Tambah Dokter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
