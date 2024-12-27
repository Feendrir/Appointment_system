<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6 class="mb-0">Daftar Pasien</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pasien</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Poli</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keluhan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($daftarPasien as $pasien): ?>
                            <tr>
                                <td class="text-center">
                                    <p class="text-sm font-weight-medium mb-0"><?= $i++; ?></p>
                                </td>
                                <td>
                                    <h6 class="text-sm font-weight-medium mb-0"><?= esc($pasien['nama_pasien']); ?></h6>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"><?= esc($pasien['nama_poli']); ?></p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0"><?= esc($pasien['keluhan']); ?></p>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('dokter/periksa/detail/' . $pasien['id']); ?>" class="btn btn-info btn-sm d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($daftarPasien)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada pasien yang perlu diperiksa.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
