<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('dosen/_partials/head'); ?>
</head>

<body id="page-top">
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-dark bg-primary static-top">

      <a class="navbar-brand mr-1" href="<?=base_url('materi')?>"><?= SITE_NAME ?></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <!-- <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div> -->
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <!-- <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
        <!-- <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li> -->
      </ul>

    </nav>

  <div id="wrapper">

    <!-- Sidebar -->
          <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item <?= $aktif=='dosen' ? 'active' : '' ?>">
          <a class="nav-link" href="<?= base_url('materi')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
      </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <?php foreach($this->uri->segments as $segment): ?>
          <?php
          $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
          $is_active = $url == $this->uri->uri_string;
          ?>
        <li class="breadcrumb-item <?= $is_active ? 'active': '' ?>">
          <?php if($is_active): ?>
            <?= ucfirst($segment)?>
            <?php else: ?>
              <a href="<?=base_url($url)?>"><?=ucfirst($segment)?></a>
          <?php endif;?>
        </li>
        <?php endforeach;?>
      </ol>

      <!-- DataTables -->
      <div class="card mb-3">
        <div class="card-header">
          <a href="<?= site_url()?>">
            <i class="fas fa-arrow-left"></i> Comeback Home</a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Dosen</th>
                      <th>Nama Materi</th>
                      <th>Semester</th>
                      <th>Download Materi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Dosen</th>
                      <th>Nama Materi</th>
                      <th>Semester</th>
                      <th>Donwload Materi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($materis as $materi): ?>
                      <tr>
                        <td width="150"><?= $materi->nama ?></td>
                       <td><?= $materi->nama_materi ?></td>
                     <td><?= $materi->semester ?></td>
                    <td width="250">
                      <a href="<?=base_url('materi/download/'.$materi->file)?>" class="btn btn-success"><i class="fas fa-download"></i>Download</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view('dosen/_partials/footer'); ?>
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view('dosen/_partials/scrolltop'); ?>

  <!-- Logout Modal-->
 

  <!-- Bootstrap core JavaScript-->
  <!-- Core plugin JavaScript-->
  <!-- Page level plugin JavaScript-->
  <!-- Custom scripts for all pages-->
  <!-- Demo scripts for this page-->
  <?php $this->load->view('dosen/_partials/js'); ?>

</body>

</html>