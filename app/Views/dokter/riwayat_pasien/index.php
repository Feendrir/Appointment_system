<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <?php if (session()->getFlashdata('success')): ?>
        <script>alert('<?= session()->getFlashdata('success') ?>');</script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <script>alert('<?= session()->getFlashdata('error') ?>');</script>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Riwayat Pasien</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 5%;">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">No. RM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">No. KTP</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 25%;">Nama Pasien</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 20%;">No. HP</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 30%;">Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($riwayatPasien as $pasien): ?>
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-medium mb-0"><?= $i++; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($pasien['no_rm']); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($pasien['no_ktp']); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($pasien['nama']); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($pasien['no_hp']); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-medium mb-0"><?= esc($pasien['alamat']); ?></p>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('dokter/riwayat-pasien/detail/' . $pasien['id_pasien']); ?>" class="btn btn-info btn-sm">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($riwayatPasien)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data riwayat pasien.</td>
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
