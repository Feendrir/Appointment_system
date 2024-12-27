<?= $this->extend('layouts/pasien'); ?>

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
                <div class="card-header pb-0">
                    <h6>Tambah Daftar Poli</h6>
                </div>
                <div class="card-body">
                    <form action="/pasien/daftar-poli/store" method="post">
                        <?= csrf_field() ?>
                        
                        <!-- No. RM -->
                        <div class="mb-3">
                            <label for="no_rm" class="form-label">No. Rekam Medis</label>
                            <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?= esc($pasien['no_rm']) ?>" readonly>
                        </div>
                        <!-- Pilih Poli -->
                        <div class="mb-3">
                            <label for="id_poli" class="form-label">Pilih Poli</label>
                            <select class="form-select" id="id_poli" name="id_poli" required>
                                <option value="">Pilih Poli</option>
                                <?php foreach ($poli as $p): ?>
                                    <option value="<?= esc($p['id']) ?>"><?= esc($p['nama_poli']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Pilih Jadwal -->
                        <!-- Pilih Jadwal -->
                        <div class="mb-3">
                            <label for="id_jadwal" class="form-label">Pilih Jadwal</label>
                            <select class="form-select" id="id_jadwal" name="id_jadwal" required>
                                <option value="">Pilih Jadwal</option>
                                <?php foreach ($jadwal as $j): ?>
                                    <option value="<?= esc($j['id']) ?>">
                                        <?= esc($j['nama_dokter']) ?> | <?= esc($j['hari']) ?> | <?= esc($j['jam_mulai']) ?> - <?= esc($j['jam_selesai']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Keluhan -->
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan</label>
                            <textarea class="form-control" id="keluhan" name="keluhan" required></textarea>
                        </div>
                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end">
                            <a href="/pasien/daftar-poli" class="btn btn-dark me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
document.getElementById('id_poli').addEventListener('change', function () {
    const idPoli = this.value;
    const jadwalDropdown = document.getElementById('id_jadwal');

    // Reset jadwal options
    jadwalDropdown.innerHTML = '<option value="">Pilih Jadwal</option>';

    // Jika poli dipilih, lakukan AJAX untuk mendapatkan jadwal dokter
    if (idPoli) {
        fetch(`/pasien/daftar-poli/jadwal/${idPoli}`)
            .then(response => response.json())
            .then(data => {
                console.log(data); // Debug response dari server
                if (data.success && data.jadwal.length > 0) {
                    data.jadwal.forEach(j => {
                        const option = document.createElement('option');
                        option.value = j.id;
                        option.textContent = `${j.nama_dokter} | ${j.hari} | ${j.jam_mulai} - ${j.jam_selesai}`;
                        jadwalDropdown.appendChild(option);
                    });
                } else {
                    const option = document.createElement('option');
                    option.value = '';
                    option.textContent = 'Tidak ada jadwal dokter bertugas';
                    jadwalDropdown.appendChild(option);
                }
            })
            .catch(err => {
                console.error('Error:', err);
                const option = document.createElement('option');
                option.value = '';
                option.textContent = 'Terjadi kesalahan, coba lagi nanti';
                jadwalDropdown.appendChild(option);
            });
    }
});

</script>

<?= $this->endSection(); ?>
