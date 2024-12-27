<?= $this->extend('layouts/dokter') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="page-header min-height-250 border-radius-lg mt-4 d-flex flex-column justify-content-end">
    <span class="mask bg-primary opacity-9"></span>
    <div class="w-100 position-relative p-3">
      <div class="d-flex justify-content-between align-items-end">
        <div class="d-flex align-items-center">
          <div class="avatar avatar-xxl position-relative me-3">
            <img src="<?= base_url('assets/img/avatar.svg'); ?>" alt="profile_image" class="w-70 border-radius-lg shadow-sm">
          </div>
          <div>
            <h5 class="mb-1 text-white font-weight-bolder">
              <?= esc($dokter['nama']); ?>
            </h5>
            <p class="mb-0 text-white text-sm">
            <?= esc($dokter['nama_poli'] ?? 'Poli tidak ditemukan'); ?>
            </p>
            </p>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <a href="/dokter/setting" class="btn btn-outline-white mb-0 me-1 btn-sm">
            <i class="fas fa-cog me-1"></i> Setting
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12 col-xl-8">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Profile Information</h6>
            </div>
            <div class="col-md-4 text-end">
              <a href="/dokter/edit" class="btn btn-primary btn-sm">
                Edit Profile
              </a>
            </div>
          </div>
        </div>
          <div class="card-body p-3">
            <p class="text-md">
                Informasi profil dokter. Pastikan data Anda selalu diperbarui.
            </p>
            <hr class="horizontal gray-light my-2">
            <ul class="list-group">
              <li class="list-group-item border-0 ps-0 d-flex align-items-center">
                <strong class="text-dark" style="width: 180px;">Nama:</strong>
                <span class="ms-3 text-md"><?= esc($dokter['nama']); ?></span>
              </li>
              <li class="list-group-item border-0 ps-0 d-flex align-items-center">
                <strong class="text-dark" style="width: 180px;">Poli:</strong>
                <span class="ms-3 text-md"><?= esc($dokter['nama_poli'] ?? 'Belum ditentukan'); ?></span>
              </li>
              <li class="list-group-item border-0 ps-0 d-flex align-items-center">
                <strong class="text-dark" style="width: 180px;">Nomor Telepon:</strong>
                <span class="ms-3 text-md"><?= esc($dokter['no_hp']); ?></span>
              </li>
              <li class="list-group-item border-0 ps-0 d-flex align-items-center">
                <strong class="text-dark" style="width: 180px;">Alamat:</strong>
                <span class="ms-3 text-md"><?= esc($dokter['alamat']); ?></span>
              </li>
            </ul>
        </div>
      </div>
    </div>
    <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Platform Settings</h6>
            </div>
            <div class="card-body p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Email me when someone follows me</label>
                  </div>
                </li>
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1">
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Email me when someone answers on my post</label>
                  </div>
                </li>
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                  </div>
                </li>
              </ul>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">New launches and projects</label>
                  </div>
                </li>
                <li class="list-group-item border-0 px-0">
                  <div class="form-check form-switch ps-0">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4" checked>
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">Monthly product updates</label>
                  </div>
                </li>
                <li class="list-group-item border-0 px-0 pb-0">
                  <div class="form-check form-switch ps-0">
                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
  </div>
</div>

<?= $this->endSection() ?>
