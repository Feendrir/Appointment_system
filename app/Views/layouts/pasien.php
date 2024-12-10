<!DOCTYPE html>
<html lang="en">
<?= $this->include('components/header'); ?>

<body class="g-sidenav-show bg-gray-100">
  <?= $this->include('components/sidebar_pasien'); ?>
  <main class="main-content position-relative border-radius-lg">
    <?= $this->include('components/navbar'); ?>
    <div class="container-fluid py-4">
      <?= $this->renderSection('content'); ?>
    </div>
  </main>
  <?= $this->include('components/footer'); ?>
  <?= $this->include('components/scripts'); ?>
</body>
</html>
