<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
  <?php if (session()->getFlashdata('success')): ?>
    <script>alert('<?= session()->getFlashdata('success') ?>');</script>
  <?php endif; ?>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6 class="mb-0">Kelola Poli</h6>
          <a href="/poli/create" class="btn btn-primary btn-sm align-items-center">
            <i class="fas fa-plus me-2"></i> Tambah Data
          </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 5%;">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 30%;">Nama Poli</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 50%;">Keterangan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4" style="width: 15%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($poli as $p): ?>
                  <tr>
                    <td class="text-center">
                        <p class="text-sm font-weight-medium mb-0"><?= $i++ ?></p>
                    </td>
                    <td>
                        <h6 class="text-sm font-weight-medium mb-0"><?= $p['nama_poli'] ?></h6>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $p['keterangan'] ?></p>
                    </td>
                    <td class="d-flex justify-content-center">
                      <a href="/poli/edit/<?= $p['id'] ?>" class="btn btn-primary btn-sm d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="/poli/delete/<?= $p['id'] ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-dark btn-sm d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" onclick="return confirm('Yakin ingin menghapus obat ini?');">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php if (empty($poli)): ?>
                  <tr>
                    <td colspan="4" class="text-center">Tidak ada data.</td>
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
<?= $this->endSection(); ?>
