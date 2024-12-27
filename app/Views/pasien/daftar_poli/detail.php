<?= $this->extend('layouts/pasien'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6 class="mb-0">Detail Periksa</h6>
        </div>
        <div class="card-body">
            <!-- Data Pendaftaran Poli -->
            <h5>Data Umum</h5>
            <ul>
                <li><strong>Nama Dokter:</strong> <?= esc($daftarPoli['nama_dokter']); ?></li>
                <li><strong>Nama Poli:</strong> <?= esc($daftarPoli['nama_poli']); ?></li>
                <li><strong>Hari:</strong> <?= esc($daftarPoli['hari']); ?></li>
                <li><strong>Jam:</strong> <?= esc($daftarPoli['jam_mulai']); ?> - <?= esc($daftarPoli['jam_selesai']); ?></li>
                <li><strong>No. Antrian:</strong> <?= esc($daftarPoli['no_antrian']); ?></li>
            </ul>

            <hr>

            <!-- Data Setelah Periksa -->
            <h5>Data Setelah Periksa</h5>
            <?php if ($periksa): ?>
                <ul>
                    <li><strong>Tanggal Periksa:</strong> <?= esc($periksa['tanggal_periksa']); ?></li>
                    <li><strong>Catatan:</strong> <?= esc($periksa['catatan']); ?></li>
                    <li><strong>Obat yang Diresepkan:</strong></li>
                    <ul>
                        <?php foreach ($detailObat as $obat): ?>
                            <li><?= esc($obat['nama_obat']); ?> (<?= esc($obat['kemasan']); ?>) - Rp <?= number_format($obat['harga'], 0, ',', '.'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <li><strong>Total Biaya:</strong> Rp <?= number_format($periksa['biaya_periksa'], 0, ',', '.'); ?></li>
                </ul>
            <?php else: ?>
                <ul>
                    <li><strong>Tanggal Periksa:</strong> -</li>
                    <li><strong>Catatan:</strong> -</li>
                    <li><strong>Obat yang Diresepkan:</strong> -</li>
                    <li><strong>Total Biaya:</strong> -</li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <a href="<?= base_url('/pasien/daftar-poli'); ?>" class="btn btn-secondary">Kembali</a>
</div>
<?= $this->endSection(); ?>
