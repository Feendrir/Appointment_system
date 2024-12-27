<?= $this->extend('layouts/dokter') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <?php if (session()->getFlashdata('success')): ?>
    <script>
        alert('<?= session()->getFlashdata('success') ?>');
    </script>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Jadwal Dokter</h6>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#inputJadwalModal">
                        <i class="fas fa-plus me-1"></i> Tambah Jadwal
                    </button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal as $j): ?>
                                <tr>
                                    <td><?= esc($j['hari']); ?></td>
                                    <td><?= esc($j['jam_mulai']); ?></td>
                                    <td><?= esc($j['jam_selesai']); ?></td>
                                    <td>
                                        <form action="/dokter/jadwal/delete/<?= $j['id']; ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if (empty($jadwal)): ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada jadwal</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Input Jadwal -->
<div class="modal fade" id="inputJadwalModal" tabindex="-1" aria-labelledby="inputJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/dokter/jadwal/input" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="inputJadwalLabel">Tambah Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-select" id="hari" name="hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    </div>
                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
