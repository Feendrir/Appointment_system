<!DOCTYPE html>
<html lang="en">
<?= $this->include('components/header'); ?>

<body>
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container d-flex justify-content-between">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="/">
      <img src="<?= base_url('assets/img/logo_hospital.svg'); ?>" alt="Logo" class="me-2" style="width: 15px; height: 15px;">
        Appointment System
      </a>
      <a href="/admin" class="btn btn-outline-light btn-sm">Admin Login</a>
    </div>
  </nav>

  <main class="main-content mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/BG_3.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
              <p class="text-lead text-white">Masuk ke akun Anda sebagai Dokter atau Pasien.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4 pb-4">
                <ul class="nav nav-pills justify-content-between w-100" id="loginTabs" role="tablist" style="padding: 0 10px;">
                  <li class="nav-item w-50">
                    <button class="nav-link active w-100 bg-primary text-white" id="doctor-tab" data-bs-toggle="tab" data-bs-target="#doctor-login" type="button" role="tab" aria-controls="doctor-login" aria-selected="true">Dokter</button>
                  </li>
                  <li class="nav-item w-50">
                    <button class="nav-link w-100 text-dark" id="patient-tab" data-bs-toggle="tab" data-bs-target="#patient-login" type="button" role="tab" aria-controls="patient-login" aria-selected="false">Pasien</button>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="loginTabsContent">
                  <div class="tab-pane fade show active" id="doctor-login" role="tabpanel" aria-labelledby="doctor-tab">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                    <?php endif; ?>
                    <form action="/doctor/login" method="post">
                      <?= csrf_field() ?>
                      <div class="mb-4">
                        <label for="nama" class="form-label">Username</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan username anda" required>
                      </div>
                      <div class="mb-4">
                        <label for="alamat" class="form-label">Password</label>
                        <input type="password" class="form-control" id="alamat" name="alamat" placeholder="Masukkan password anda" required>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                      </div>
                    </form>
                  </div>
                      <div class="tab-pane fade" id="patient-login" role="tabpanel" aria-labelledby="patient-tab">
                        <?php if (session()->getFlashdata('error')): ?>
                            <small class="text-danger"><?= session()->getFlashdata('error'); ?></small>
                        <?php endif; ?>
                          <form action="/patient/login" method="post">
                              <?= csrf_field() ?>
                              <div class="mb-4">
                                  <label for="patient-name" class="form-label">Nama</label>
                                  <input type="text" class="form-control" id="patient-name" name="nama" placeholder="Masukkan nama Anda" required>
                              </div>
                              <div class="mb-4">
                                  <label for="patient-address" class="form-label">Alamat</label>
                                  <input type="text" class="form-control" id="patient-address" name="alamat" placeholder="Masukkan alamat Anda" required>
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary w-100">Masuk</button>
                              </div>
                              <div class="text-center mt-3">
                                  <span class="text-dark text-sm">Pasien baru ? </span>
                                  <a href="/patient/register" class="text-primary fw-bold">Daftar</a>
                              </div>
                          </form>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <script>
    const tabs = document.querySelectorAll('#loginTabs .nav-link');
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(item => item.classList.remove('bg-primary', 'text-white'));
        tab.classList.add('bg-primary', 'text-white');
      });
    });
  </script>
</body>
</html>
