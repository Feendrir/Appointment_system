<!DOCTYPE html>
<html lang="en">
<?= $this->include('components/header'); ?>

<body>
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="/">
        Appointment System
      </a>
    </div>
  </nav>
  <main class="main-content mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/BG_1.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Register</h1>
              <p class="text-lead text-white">Mendaftar sebagai pasien baru.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4 pb-4">
                        <h5>Form Registrasi Pasien</h5>
                    </div>
                    <div class="card-body">
                        <form action="/patient/register" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-4">
                                <label for="no_ktp" class="form-label">Nomor KTP</label>
                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukkan nomor KTP" required>
                                <?php if (session()->getFlashdata('no_ktp')): ?>
                                    <small class="text-danger"><?= session()->getFlashdata('no_ktp'); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                                <?php if (session()->getFlashdata('nama')): ?>
                                    <small class="text-danger"><?= session()->getFlashdata('nama'); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" rows="3" required></textarea>
                                <?php if (session()->getFlashdata('alamat')): ?>
                                    <small class="text-danger"><?= session()->getFlashdata('alamat'); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4">
                                <label for="no_hp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor telepon aktif" required>
                                <?php if (session()->getFlashdata('no_hp')): ?>
                                    <small class="text-danger"><?= session()->getFlashdata('no_hp'); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">Saya menyetujui <a href="#" class="text-primary">syarat dan ketentuan</a>.</label>
                                <?php if (session()->getFlashdata('terms')): ?>
                                    <small class="text-danger"><?= session()->getFlashdata('terms'); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
  </main>
  <style>
    .text-sm {
    font-size: 0.875rem; 
    }

    .text-dark {
        color: #000; 
    }

    .text-primary {
        color: #0d6efd; 
        font-weight: bold;
    }
  </style>
</body>
</html>
