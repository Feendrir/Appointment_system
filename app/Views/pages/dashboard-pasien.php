<?= $this->extend('layouts/pasien'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="row">
        <!-- Selamat Datang -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark fw-bold">Selamat Datang, <?= esc($userName); ?>!</h5>
                    <p class="card-text">Ini adalah halaman dashboard pasien.</p>
                </div>
            </div>
        </div>

        <!-- Card Daftar Poli Terakhir -->
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Daftar Poli Terakhir</h5>
                    <?php if ($daftarPoliTerakhir): ?>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Nama Pasien:</th>
                                        <td><?= esc($daftarPoliTerakhir['nama_pasien']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Poli:</th>
                                        <td><?= esc($daftarPoliTerakhir['nama_poli']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Dokter:</th>
                                        <td><?= esc($daftarPoliTerakhir['nama_dokter']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Hari, Tanggal:</th>
                                        <td>
                                            <?= esc($daftarPoliTerakhir['hari']); ?>, 
                                            <?= $daftarPoliTerakhir['tanggal_periksa'] ? esc(date('d-m-Y', strtotime($daftarPoliTerakhir['tanggal_periksa']))) : '-'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jam Periksa:</th>
                                        <td>
                                            <?= esc($daftarPoliTerakhir['jam_mulai']); ?> - <?= esc($daftarPoliTerakhir['jam_selesai']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            <span class="badge bg-<?= $daftarPoliTerakhir['status_periksa'] === 'Sudah Diperiksa' ? 'success' : 'warning'; ?>">
                                                <?= esc($daftarPoliTerakhir['status_periksa']); ?>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-muted">Belum ada data poli yang terdaftar.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="row mt-4">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Kartu 1</h5>
                    <p class="card-text">Konten kartu 1.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Kartu 2</h5>
                    <p class="card-text">Konten kartu 2.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Kartu 3</h5>
                    <p class="card-text">Konten kartu 3.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Kartu 4</h5>
                    <p class="card-text">Konten kartu 4.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-4">
        <img src="<?= base_url('public/assets/img/logo_hospital.svg'); ?>" alt="Logo Hospital" width="120">
    </div> -->
</div>
<?= $this->endSection(); ?>
