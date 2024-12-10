<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


<script src="/assets/js/plugins/chartjs.min.js"></script>

<script>
  const iconNavbarSidenav = document.getElementById("iconNavbarSidenav");
  const sidenav = document.getElementById("sidenav-main");
  const body = document.body;

  if (iconNavbarSidenav) {
    iconNavbarSidenav.addEventListener("click", function () {
      if (sidenav.classList.contains("show")) {
        sidenav.classList.remove("show");
        body.classList.remove("g-sidenav-pinned");
      } else {
        sidenav.classList.add("show");
        body.classList.add("g-sidenav-pinned");
      }
    });
  }
</script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
  }
</script>
