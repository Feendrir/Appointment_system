<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Detail Riwayat Periksa</h6>
        </div>
        <div class="card-body">
            <table class="table align-items-center">
                <thead>
                    <tr>
                        <th>Tanggal Periksa</th>
                        <th>Nama Pasien</th>
                        <th>Nama Dokter</th>
                        <th>Keluhan</th>
                        <th>Biaya Periksa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detailPeriksa as $periksa): ?>
                    <tr>
                        <td><?= esc($periksa['tanggal_periksa']); ?></td>
                        <td><?= esc($periksa['nama_pasien']); ?></td>
                        <td><?= esc($periksa['nama_dokter']); ?></td>
                        <td><?= esc($periksa['keluhan']); ?></td>
                        <td><?= esc($periksa['biaya_periksa']); ?></td>
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
<?= $this->endSection(); ?>
