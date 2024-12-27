<?= $this->extend('layouts/pasien'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <script>alert('<?= session()->getFlashdata('success'); ?>');</script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <script>alert('<?= session()->getFlashdata('error'); ?>');</script>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Riwayat Daftar Poli</h6>
                    <a href="<?= base_url('pasien/daftar-poli/create'); ?>" class="btn btn-primary btn-sm align-items-center">
                        <i class="fas fa-plus me-2"></i> Daftar Poli Baru
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 5%;">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">Poli</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">Dokter</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 15%;">Hari</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 15%;">Jam Mulai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 15%;">Jam Selesai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 10%;">Antrian</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($daftarPoli)): ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($daftarPoli as $poli): ?>
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-sm font-weight-medium mb-0"><?= $i++; ?></p>
                                            </td>
                                            <td>
                                                <h6 class="text-sm font-weight-medium mb-0"><?= esc($poli['nama_poli'] ?? '-'); ?></h6>
                                            </td>
                                            <td>
                                                <h6 class="text-sm font-weight-medium mb-0"><?= esc($poli['nama_dokter'] ?? '-'); ?></h6>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= esc($poli['hari'] ?? '-'); ?></p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= esc($poli['jam_mulai'] ?? '-'); ?></p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= esc($poli['jam_selesai'] ?? '-'); ?></p>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-info"><?= esc($poli['no_antrian'] ?? '-'); ?></span>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('pasien/daftar-poli/detail/' . $poli['id']); ?>" class="btn btn-info btn-sm">
                                                    Detail Periksa
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data riwayat daftar poli.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <?= $pager->links('default', 'custom_pagination'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
