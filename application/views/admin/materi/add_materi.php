<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("dosen/_partials/head.php") ?>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-primary static-top">

      <a class="navbar-brand mr-1" href="<?=base_url('admin_materi')?>"><?= SITE_NAME ?></a>

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
      <ul class="sidebar navbar-nav">
        <li class="nav-item <?= $aktif=='admin_materi' ? 'active' : '' ?>">
          <a class="nav-link" href="<?= base_url('admin_materi')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown <?= $aktif=='admin_materi' ? 'active' : '' ?>">
          <a class="nav-link dropdown-toggle" href="<?=base_url('admin_materi')?>" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Setup</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('admin_materi/add') ?>">Add Materi</a>
            <a class="dropdown-item" href="<?= base_url('admin_materi') ?>">List Materi</a>
          </div>
        </li>
      </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php $this->load->view("dosen/_partials/breadcrumb.php") ?>

        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success') ?>
          </div>
        <?php endif; ?>

        <div class="card mb-3">
          <div class="card-header">
            <a href="<?= base_url('admin_materi') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            <form action="<?php base_url('admin_materi/add') ?>" method="post" enctype="multipart/form-data" >
              
              <div class="form-group">
                <select name="id_dosen" id="SelectLm" class="form-control" required="true">
                  <option value="">Pilih Dosen</option>
                  <!-- relasi materi ke dosen -->
                  <?php for ($i=0; $i < count($dosens) ; $i++) { 
                    ?>
                    <option value="<?=$dosens[$i]->id_dosen?>" <?= $dosens[$i]->id_dosen==$materi['id_dosen'] ? 'Selected' : ''?> ><?=$dosens[$i]->nama?></option>
                  <?php } ?>
                </select>
                <div class="invalid-feedback">
                  <?= form_error('id_dosen') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="nama_materi">Nama Materi*</label>
                <input class="form-control <?= form_error('nama_materi') ? 'is-invalid':'' ?>"
                type="text" name="nama_materi" placeholder="Nama Materi" />
                <div class="invalid-feedback">
                  <?= form_error('nama_materi') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="semester">Semester*</label>
                <input class="form-control <?= form_error('semester') ? 'is-invalid':'' ?>"
                type="number" name="semester" placeholder="Semester" />
                <div class="invalid-feedback">
                  <?= form_error('semester') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="file">File</label>
                <input class="form-control-file <?= form_error('file') ? 'is-invalid':'' ?>"
                type="file" name="file" />
                <div class="invalid-feedback">
                  <?= form_error('file') ?>
                </div>
              </div>

              <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>

          </div>

          <div class="card-footer small text-muted">
            * required fields
          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php $this->load->view("dosen/_partials/footer.php") ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("dosen/_partials/scrolltop.php") ?>

    <?php $this->load->view("dosen/_partials/js.php") ?>

  </body>

  </html>