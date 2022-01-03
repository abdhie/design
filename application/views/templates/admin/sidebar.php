<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
  <script>
    var navbarStyle = localStorage.getItem("navbarStyle");
    if (navbarStyle && navbarStyle !== 'transparent') {
      document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    }
  </script>
  <div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">
      <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
    </div>
    <a class="navbar-brand" href="index.html">
      <div class="d-flex align-items-center py-3"><img class="me-2" src="<?= base_url('assets/') ?>img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">Meta</span></div>
    </a>
  </div>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
      <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        <?php
        $role_id = $this->session->userdata('role_id');
        $query_menu = "SELECT `user_menu`.`id`, `menu`
								                  FROM `user_menu` JOIN `user_access_menu`
								                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
								                  WHERE `user_access_menu`.`role_id` = $role_id
								                  ORDER BY `user_access_menu`.`menu_id` ASC
								        ";
        $menu = $this->db->query($query_menu)->result_array();
        ?>
        <?php foreach ($menu as $m) : ?>
          <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label"><?= ucfirst($m['menu']) ?></div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
          </li>
          <?php
          $menuId = $m['id'];
          $query_Submenu = "SELECT * FROM `user_sub_menu` WHERE `menu_id` = $menuId AND `is_active` = 1 ";
          $sub_menu = $this->db->query($query_Submenu)->result_array();
          ?>
          <?php foreach ($sub_menu as $sm) : ?>
            <!-- sub menu-->
            <a class="nav-link" href="#" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="<?= $sm['icon'] ?>"></span></span>
                <span class="nav-link-text ps-1"><?= $sm['title'] ?></span>
              </div>
            </a>
          <?php endforeach; ?>
        <?php endforeach; ?>

        <li class="nav-item">
          <!-- label-->
          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Setting</div>
            <div class="col ps-0">
              <hr class="mb-0 navbar-vertical-divider" />
            </div>
          </div>

          <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1">Events</span></div>
          </a>
          <ul class="nav collapse" id="events">
            <li class="nav-item"><a class="nav-link" href="app/events/create-an-event.html" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create an event</span></div>
              </a><!-- more inner pages-->
            </li>
          </ul>
      </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>