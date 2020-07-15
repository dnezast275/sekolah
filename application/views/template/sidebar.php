  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="<?= base_url('asset/'); ?>img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">dSchool CMS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 d-flex">
              <div class="image">
                  <img src="<?= base_url('asset/'); ?>img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="javascript:void(0)" class="d-block"><?= $user['nama']; ?></a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <?php foreach ($menulist as $m) : ?>
                      <?php if ($menu == $m['menu_name']) : ?>
                          <li class="nav-item menu-open <?= $m['treeview_icon']; ?>">
                              <a href="<?= base_url($m['menu_url']); ?>" class="nav-link">
                                  <i class="nav-icon <?= $m['menu_icon']; ?>"></i>
                                  <p><?= $m['menu_name']; ?></p>
                                  <i class="<?= $m['drop_icon']; ?>"></i>
                              <?php else : ?>
                          <li class="nav-item <?= $m['treeview_icon']; ?>">
                              <a href="<?= base_url($m['menu_url']); ?>" class="nav-link">
                                  <i class="nav-icon <?= $m['menu_icon']; ?>"></i>
                                  <p><?= $m['menu_name']; ?></p>
                                  <i class="<?= $m['drop_icon']; ?>"></i>
                              <?php endif; ?>

                              </a>
                              <ul class="nav nav-treeview">
                                  <?php $menuId = $m['id'];
                                    $querySubMenu = "SELECT *
                                FROM `sub_menu` JOIN `menu`
                                  ON `sub_menu`.`menu_id` = `menu`.`id`
                               WHERE `sub_menu`.`menu_id` = $menuId
                                 AND `sub_menu`.`active` = 1
                            ";
                                    $subMenu = $this->db->query($querySubMenu)->result_array(); ?>

                                  <?php foreach ($subMenu as $sm) : ?>
                                      <li class="nav-item">
                                          <?php if ($menu == $sm['title']) : ?>
                                              <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                                              <?php else : ?>
                                                  <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                                                  <?php endif; ?>
                                                  <i class="nav-icon <?= $sm['icon']; ?>"></i>
                                                  <p><?= $sm['title']; ?></p>
                                                  </a>
                                      </li>
                                  <?php endforeach; ?>
                              </ul>
                          </li>



                      <?php endforeach; ?>



              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>