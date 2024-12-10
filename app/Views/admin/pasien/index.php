<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid py-4">
  <?php if (session()->getFlashdata('success')): ?>
    <script>
      alert('<?= session()->getFlashdata('success') ?>');
    </script>
  <?php endif; ?>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6 class="mb-0">Kelola Pasien</h6>
          <a href="/pasien/create" class="btn btn-primary btn-sm align-items-center">
            <i class="fas fa-plus me-2"></i> Tambah Data
          </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4" style="width: 15%;">No RM</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4" style="width: 18%;">No KTP</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 18%;">Nama Pasien</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 15%;">No HP</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">Alamat</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4" style="width: 20%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pasien as $p): ?>
                  <tr>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 ps-3"><?= esc($p['no_rm']) ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 ps-3"><?= esc($p['no_ktp']) ?></p>
                    </td>
                    <td>
                      <h6 class="text-sm font-weight-medium mb-0"><?= esc($p['nama']) ?></h6>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= esc($p['no_hp']) ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= esc($p['alamat']) ?></p>
                    </td>
                    <td class="d-flex justify-content-center">
                      <a href="/pasien/edit/<?= $p['id'] ?>" class="btn btn-primary btn-sm d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="/pasien/delete/<?= $p['id'] ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-dark btn-sm d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;" onclick="return confirm('Yakin ingin menghapus obat ini?');">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php if (empty($pasien)): ?>
                  <tr>
                    <td colspan="5" class="text-center">
                      <p class="text-sm text-secondary font-weight-medium mb-0">Tidak ada data pasien.</p>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center mt-3">
    <nav aria-label="Page navigation">
      <?= $pager->links('default', 'custom_pagination') ?>
    </nav>
  </div>
</div>

<?= $this->endSection(); ?>
