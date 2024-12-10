<!DOCTYPE html>
<html lang="en">
<?= $this->include('components/header'); ?>

<body>
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="/">
      <img src="<?= base_url('assets/img/logo_hospital.svg'); ?>" alt="Logo" class="me-2" style="width: 15px; height: 15px;">
        Appointment System
      </a>
    </div>
  </nav>

  <main class="main-content mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/BG_2.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
              <p class="text-lead text-white">Masuk untuk mengelola sistem.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>Masuk Admin</h5>
              </div>
              <div class="card-body">
                <?php if (isset($loginError)): ?>
                  <div class="alert alert-danger text-center"><?= esc($loginError) ?></div>
                <?php endif; ?>

                <form action="/admin/login" method="post">
                  <?= csrf_field() ?>

                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control <?= (isset($validation) && $validation->hasError('username')) ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Enter your username" value="<?= old('username') ?>">
                    <?php if (isset($validation) && $validation->hasError('username')): ?>
                      <div class="invalid-feedback">
                        <?= $validation->getError('username') ?>
                      </div>
                    <?php endif; ?>
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?= (isset($validation) && $validation->hasError('password')) ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Enter your password">
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                      <div class="invalid-feedback">
                        <?= $validation->getError('password') ?>
                      </div>
                    <?php endif; ?>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>
