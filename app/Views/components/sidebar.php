<!-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
  <div class="sidenav-header">
    <a class="navbar-brand m-0" href="#">
      <img src="<?= base_url('assets/img/logo_hospital.svg'); ?>" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Soft UI Dashboard</span>
    </a>
  </div>
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">
          <div class="icon icon-shape icon-sm bg-white shadow text-center border-radius-md">
            <i class="ni ni-tv-2 text-dark"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ni ni-user-run text-yellow"></i>
          <span class="nav-link-text">Tables</span>
        </a>
    </li>

    </ul>
  </div>
  <div class="sidenav-footer mx-3 ">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
          <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
            <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
          </div>
          <div class="docs-info">
            <h6 class="text-white up mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold">Please check our docs</p>
            <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
          </div>
        </div>
      </div>
      <a class="btn btn-primary mt-3 w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree">Upgrade to pro</a>
    </div>
</aside> -->

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/dashboard">
        <img src="<?= base_url('assets/img/logo_hospital.svg'); ?>" alt="icon" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Appointment System</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link <?= (uri_string() == 'dashboard') ? 'active' : '' ?>" href="/dashboard">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <img src="<?= base_url('assets/icons/dashboard-icon.svg'); ?>" alt="icon" class="icon-sidebar" style="width: 18px;">
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?= (strpos(uri_string(), 'obat') !== false) ? 'active' : '' ?>" href="/obat">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <img src="<?= base_url('assets/icons/obat-icon.svg'); ?>" alt="icon" class="icon-sidebar" style="width: 18px;">
          </div>
          <span class="nav-link-text ms-1">Kelola Obat</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?= (strpos(uri_string(), 'poli') !== false) ? 'active' : '' ?>" href="/poli">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <img src="<?= base_url('assets/icons/poliklinik-icon.svg'); ?>" alt="icon" class="icon-sidebar" style="width: 18px;">
          </div>
          <span class="nav-link-text ms-1">Kelola Poliklinik</span>
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (strpos(uri_string(), 'dokter') !== false) ? 'active' : '' ?>" href="/dokter">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="<?= base_url('assets/icons/dokter-icon.svg'); ?>" alt="icon" class="icon-sidebar" style="width: 18px;">
            </div>
            <span class="nav-link-text ms-1">Dokter</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (strpos(uri_string(), 'pasien') !== false) ? 'active' : '' ?>" href="/pasien">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="<?= base_url('assets/icons/pasien-icon.svg'); ?>" alt="icon" class="icon-sidebar" style="width: 18px;">
            </div>
            <span class="nav-link-text ms-1">Pasien</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (strpos(uri_string(), 'setting') !== false) ? 'active' : '' ?>" href="/#">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="<?= base_url('assets/icons/setting-icon.svg'); ?>" alt="icon" class="icon-sidebar" style="width: 18px;">
            </div>
            <span class="nav-link-text ms-1">Setting</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
          <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
            <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
          </div>
          <div class="docs-info">
            <h6 class="text-white up mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold">Please check our docs</p>
            <a href="#" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Contact Us</a>
          </div>
        </div>
      </div>
      <!-- <a class="btn btn-primary mt-3 w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree">Upgrade to pro</a> -->
    </div>
  </aside>

  <style>
  .nav-link.active {
    background-color: #ffffff !important; /* Warna biru */
    color: #27272A !important; /* Teks putih */
  }

  .nav-link.active .icon {
    background-color: #ffffff !important; /* Warna ikon */
    color: #ffffff !important;
    fill: #ffffff;
  }
</style>


  
