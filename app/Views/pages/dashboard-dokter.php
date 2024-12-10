<?= $this->extend('layouts/dokter'); ?>

<?= $this->section('content'); ?>
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang, <?= esc($userName); ?>!</h5>
                <p class="card-text">Ini adalah halaman dashboard dokter.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
