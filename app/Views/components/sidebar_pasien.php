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
        <a class="nav-link <?= (uri_string() == 'dashboard-pasien') ? 'active' : '' ?>" href="/dashboard-pasien">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <img src="<?= base_url('assets/icons/dashboard-icon.svg'); ?>" alt="icon" class="icon-sidebar" style="width: 18px;">
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
        </li>
        <!-- Jadwal Periksa -->
        <li class="nav-item">
          <a class="nav-link <?= (strpos(uri_string(), 'daftar-poli') !== false) ? 'active' : '' ?>" href="<?= base_url('pasien/daftar-poli'); ?>">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <img src="<?= base_url('assets/icons/list-icon.svg'); ?>" alt="icon" class="icon-sidebar" style="width: 18px;">
              </div>
              <span class="nav-link-text ms-1">Daftar Poli</span>
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
    background-color: #ffffff !important; 
    color: #27272A !important; 
  }

  .nav-link.active .icon {
    background-color: #ffffff !important; 
    color: #ffffff !important;
    fill: #ffffff;
  }
</style>


  
