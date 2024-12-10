<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <?php if (!empty($breadcrumb) && is_array($breadcrumb)): ?>
          <?php foreach ($breadcrumb as $key => $crumb): ?>
            <?php if ($key == array_key_last($breadcrumb)): ?>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $crumb ?></li>
            <?php else: ?>
              <li class="breadcrumb-item text-sm"><a href="<?= $breadcrumbLinks[$key] ?? 'javascript:;' ?>" class="text-dark opacity-5"><?= $crumb ?></a></li>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php else: ?>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        <?php endif; ?>
      </ol>
      <h6 class="font-weight-bolder mb-0"><?= !empty($breadcrumb) && is_array($breadcrumb) ? end($breadcrumb) : 'Dashboard' ?></h6>
    </nav>

    <button class="navbar-toggler shadow-none ms-2" type="button" id="iconNavbarSidenav">
      <span class="navbar-toggler-icon">
        <i class="fas fa-bars"></i>
      </span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbar">
      <div class="d-flex align-items-center">
        <a href="/logout" class="btn btn-outline-primary btn-sm">Logout</a>
      </div>
    </div>
  </div>
</nav>
