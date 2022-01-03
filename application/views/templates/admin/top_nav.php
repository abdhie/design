<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
  <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
    <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
  </button>
  <a class="navbar-brand me-1 me-sm-3" href="index.html">
    <div class="d-flex align-items-center"><img class="me-2" src="<?= base_url('assets/') ?>img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span></div>
  </a>
  <ul class="navbar-nav align-items-center d-none d-lg-block">
    <li class="nav-item">
      <div class="search-box" data-list='{"valueNames":["title"]}'>
        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input fuzzy-search" type="search" placeholder="Search..." aria-label="Search" />
          <span class="fas fa-search search-box-icon"></span>
        </form>
        <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
          <div class="btn-close-falcon" aria-label="Close"></div>
        </div>
      </div>
    </li>
  </ul>
  <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
    <li class="nav-item">
      <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label></div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
    </li>

    <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-xl">
          <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt="" />
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
        <div class="bg-white dark__bg-1000 rounded-2 py-2">
          <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-user me-1"></span><span><?= $user['name'] ?></span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#!">Set status</a>
          <a class="dropdown-item" href="#!">Profile &amp; account</a>
          <a class="dropdown-item" href="#!">Feedback</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#!">Settings</a>
          <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
        </div>
      </div>
    </li>
  </ul>
</nav>
<script>
  var navbarPosition = localStorage.getItem('navbarPosition');
  var navbarVertical = document.querySelector('.navbar-vertical');
  var navbarTopVertical = document.querySelector('.content .navbar-top');
  var navbarTop = document.querySelector('[data-layout] .navbar-top');
  var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');
  if (navbarPosition === 'top') {
    navbarTop.removeAttribute('style');
    navbarTopVertical.remove(navbarTopVertical);
    navbarVertical.remove(navbarVertical);
    navbarTopCombo.remove(navbarTopCombo);
  } else if (navbarPosition === 'combo') {
    navbarVertical.removeAttribute('style');
    navbarTopCombo.removeAttribute('style');
    navbarTop.remove(navbarTop);
    navbarTopVertical.remove(navbarTopVertical);
  } else {
    navbarVertical.removeAttribute('style');
    navbarTopVertical.removeAttribute('style');
    navbarTop.remove(navbarTop);
    navbarTopCombo.remove(navbarTopCombo);
  }
</script>