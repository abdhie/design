    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <!-- sidebar -->
        <?php include_once(VIEWPATH . 'templates/admin/sidebar.php') ?>
        <!-- top menu -->
        <?php include_once(VIEWPATH . 'templates/admin/nav.php') ?>
        <!-- content -->
        <div class="content">
          <?php include_once(VIEWPATH . 'templates/admin/top_nav.php') ?>
          <?php include_once(VIEWPATH . 'admin/dashboard.php') ?>

          <footer class="footer">
            <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2021 &copy; <a href="">Siloka Creative</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v3.6.0</p>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </main>