<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <?php if (session()->getFlashdata('success')): ?>
        <script>alert('<?= session()->getFlashdata('success'); ?>');</script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <script>alert('<?= session()->getFlashdata('error'); ?>');</script>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6 class="mb-0">Daftar Pemeriksaan Pasien</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 5%;">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 25%;">Nama Pasien</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">Poli</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">Keluhan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center" style="width: 15%;">Aksi</th>
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
                                    <?php if (!empty($pasien['id_periksa'])): ?>
                                        <!-- Tombol Edit jika sudah diperiksa -->
                                        <a href="<?= base_url('dokter/periksa/edit/' . $pasien['id_periksa']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <?php else: ?>
                                        <!-- Tombol Periksa jika belum diperiksa -->
                                        <a href="<?= base_url('dokter/periksa/detail/' . $pasien['id']); ?>" class="btn btn-info btn-sm">Periksa</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($daftarPasien)): ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data pemeriksaan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
