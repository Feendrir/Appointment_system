<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Detail Riwayat Periksa</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pasien</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Dokter</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keluhan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detailPeriksa as $periksa): ?>
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($periksa['tanggal_periksa']); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($periksa['nama_pasien']); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($periksa['nama_dokter']); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($periksa['keluhan']); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0">Rp<?= number_format($periksa['biaya_periksa'], 0, ',', '.'); ?></p>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($detailPeriksa)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data periksa.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/dokter/riwayat-pasien" class="btn btn-dark mt-3">Tutup</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
