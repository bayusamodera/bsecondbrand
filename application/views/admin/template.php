<?php $iden = $this->db->query("SELECT * FROM tb_web_identitas where id_identitas='1'")->row_array(); ?>


    <?php include '_partials/header.php' ?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>" target="_blank">
            <i class="fas fa-external-link-alt fa-fw"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <!-- Brand Logo -->
      <div class="bg-primary brand-link text-center">
        <a href="">
          <span class="brand-text font-weight-light font-weight-bold">
            <?php if ($this->session->level == 1) { ?>
              Super Admin <?php } else { ?>
              Administrator
            <?php } ?>
          </span>
        </a>
      </div>
      <!-- Sidebar -->
      <div class="sidebar">

        <?php
        $log = $this->model_pengguna->pengguna_edit($this->session->username)->row_array();
        if ($log['foto'] == '') {
          $foto = 'default.jpg';
        } else {
          $foto = $log['foto'];
        }
        echo "<div class='user-panel mt-3 pb-3 mb-3 d-flex'>
              <div class='image'>
                <img src='" . base_url() . "assets/images/user/$foto' class='img-circle elevation-2' alt='User Image'>
              </div>
              <div class='info text-center'>
                <a class='d-block'>$log[username]</a>
                <a class='d-block text-xs mt-1'><i class='fa fa-circle text-success'></i> Online</a>
              </div>
            </div>";
        ?>


        <?php include '_partials/sidebar.php' ?>

      </div>
    </aside>

    <?php echo $konten; ?>
    <?php include '_partials/footer.php' ?>

 