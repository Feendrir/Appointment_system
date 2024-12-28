<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <?php if (session()->getFlashdata('error')): ?>
        <script>alert('<?= session()->getFlashdata('error'); ?>');</script>
    <?php endif; ?>
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6 class="mb-0">Edit Pemeriksaan</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('dokter/periksa/update'); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_periksa" value="<?= esc($periksa['id']); ?>">

                <!-- Nama Pasien -->
                <div class="mb-3">
                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" id="nama_pasien" class="form-control" value="<?= esc($periksa['nama_pasien']); ?>" readonly>
                </div>

                <!-- Tanggal Periksa -->
                <div class="mb-3">
                    <label for="tanggal_periksa" class="form-label">Tanggal Periksa</label>
                    <input type="text" id="tanggal_periksa" class="form-control" value="<?= esc($periksa['tanggal_periksa']); ?>" readonly>
                </div>

                <!-- Catatan Pemeriksaan -->
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan Pemeriksaan</label>
                    <textarea id="catatan" name="catatan" class="form-control" required><?= esc($periksa['catatan']); ?></textarea>
                </div>

                <!-- Obat -->
                <div class="mb-3">
                    <label for="obat" class="form-label">Obat</label>
                    <select id="obat" name="obat[]" class="form-select select2" multiple>
                        <?php foreach ($obat as $o): ?>
                            <option value="<?= esc($o['id']); ?>" data-harga="<?= esc($o['harga']); ?>" 
                                <?= in_array($o['id'], array_column($selectedObat, 'id_obat')) ? 'selected' : '' ?>>
                                <?= esc($o['nama_obat']); ?> | <?= esc($o['kemasan']); ?> | Rp <?= number_format($o['harga'], 0, ',', '.'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Total Biaya -->
                <div class="mb-3">
                    <label for="total_biaya" class="form-label">Total Biaya</label>
                    <input type="text" id="total_biaya" class="form-control" value="Rp <?= number_format($periksa['biaya_periksa'], 0, ',', '.'); ?>" readonly>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end">
                    <a href="/dokter/periksa" class="btn btn-dark me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        // Inisialisasi Select2
        $('.select2').select2({
            placeholder: "Pilih Obat",
            allowClear: true,
            width: '100%' // Agar dropdown menyesuaikan lebar field
        });

        // Hitung total biaya saat obat dipilih
        $('#obat').on('change', function () {
            const selectedOptions = Array.from(this.selectedOptions);
            const biayaPeriksa = 150000;
            let totalHargaObat = 0;

            selectedOptions.forEach(option => {
                totalHargaObat += parseInt(option.getAttribute('data-harga'));
            });

            const totalBiaya = biayaPeriksa + totalHargaObat;
            $('#total_biaya').val(`Rp ${totalBiaya.toLocaleString('id-ID')}`);
        });

        // Kalkulasi ulang total biaya berdasarkan obat yang sudah dipilih sebelumnya
        $('#obat').trigger('change');
    });
</script>

<?= $this->endSection(); ?>
