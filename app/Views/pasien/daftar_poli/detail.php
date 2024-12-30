<?= $this->extend('layouts/pasien'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Header -->
                <div class="card-header pb-0">
                    <h5 class="mb-0">Detail Periksa</h5>
                    <p class="text-sm"><?= esc($daftarPoli['nama_pasien'] ?? 'Nama pasien tidak ditemukan'); ?></p>
                </div>

                <!-- Data Umum -->
                <div class="card-body">
                    <h6 class="text-uppercase text-secondary text-xs font-weight-bolder">Data Umum</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 px-0 d-flex align-items-center">
                            <strong class="text-dark" style="width: 180px;">Tanggal:</strong>
                            <span class="ms-3"><?= esc($daftarPoli['tanggal'] ?? '-'); ?></span>
                        </li>
                        <li class="list-group-item border-0 px-0 d-flex align-items-center">
                            <strong class="text-dark" style="width: 180px;">Nama Dokter:</strong>
                            <span class="ms-3"><?= esc($daftarPoli['nama_dokter'] ?? '-'); ?></span>
                        </li>
                        <li class="list-group-item border-0 px-0 d-flex align-items-center">
                            <strong class="text-dark" style="width: 180px;">Nama Poli:</strong>
                            <span class="ms-3"><?= esc($daftarPoli['nama_poli'] ?? '-'); ?></span>
                        </li>
                        <li class="list-group-item border-0 px-0 d-flex align-items-center">
                            <strong class="text-dark" style="width: 180px;">Hari:</strong>
                            <span class="ms-3"><?= esc($daftarPoli['hari'] ?? '-'); ?></span>
                        </li>
                        <li class="list-group-item border-0 px-0 d-flex align-items-center">
                            <strong class="text-dark" style="width: 180px;">Jam:</strong>
                            <span class="ms-3"><?= esc($daftarPoli['jam_mulai'] ?? '-'); ?> - <?= esc($daftarPoli['jam_selesai'] ?? '-'); ?></span>
                        </li>
                        <li class="list-group-item border-0 px-0 d-flex align-items-center">
                            <strong class="text-dark" style="width: 180px;">No. Antrian:</strong>
                            <span class="ms-3 badge bg-primary"><?= esc($daftarPoli['no_antrian'] ?? '-'); ?></span>
                        </li>
                    </ul>
                </div>

                <!-- Data Setelah Periksa -->
                <div class="card-body">
                    <h6 class="text-uppercase text-secondary text-xs font-weight-bolder">Data Setelah Periksa</h6>
                    <?php if ($periksa): ?>
                        <ul class="list-group">
                            <li class="list-group-item border-0 px-0 d-flex align-items-center">
                                <strong class="text-dark" style="width: 180px;">Tanggal Periksa:</strong>
                                <span class="ms-3"><?= esc($periksa['tanggal_periksa']); ?></span>
                            </li>
                            <li class="list-group-item border-0 px-0 d-flex align-items-center">
                                <strong class="text-dark" style="width: 180px;">Catatan:</strong>
                                <span class="ms-3"><?= esc($periksa['catatan']); ?></span>
                            </li>
                            <li class="list-group-item border-0 px-0 d-flex align-items-start">
                                <strong class="text-dark" style="width: 180px;">Obat yang Diresepkan:</strong>
                                <ul class="ms-3 list-group">
                                    <?php foreach ($detailObat as $obat): ?>
                                        <li class="list-group-item border-0 px-0">
                                            <span><?= esc($obat['nama_obat']); ?> (<?= esc($obat['kemasan']); ?>) - Rp <?= number_format($obat['harga'], 0, ',', '.'); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="list-group-item border-0 px-0 d-flex align-items-center">
                                <strong class="text-dark" style="width: 180px;">Total Biaya:</strong>
                                <span class="ms-3">Rp <?= number_format($periksa['biaya_periksa'], 0, ',', '.'); ?></span>
                            </li>
                        </ul>
                    <?php else: ?>
                        <p class="text-center text-muted">Belum ada data pemeriksaan.</p>
                    <?php endif; ?>
                </div>

                <!-- Tombol Kembali -->
                <div class="card-footer">
                    <a href="<?= base_url('/pasien/daftar-poli'); ?>" class="btn btn-secondary w-100">
                        Kembali ke Daftar Poli
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
