<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Riwayat Pasien</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No RM</th>
                            <th>No KTP</th>
                            <th>Nama Pasien</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($riwayatPasien as $i => $pasien): ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= esc($pasien['no_rm']); ?></td>
                            <td><?= esc($pasien['no_ktp']); ?></td>
                            <td><?= esc($pasien['nama']); ?></td>
                            <td><?= esc($pasien['no_hp']); ?></td>
                            <td><?= esc($pasien['alamat']); ?></td>
                            <td>
                                <a href="<?= base_url('dokter/riwayat-pasien/detail/' . $pasien['id_pasien']); ?>" class="btn btn-info btn-sm">Lihat Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($riwayatPasien)): ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada riwayat pasien.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
