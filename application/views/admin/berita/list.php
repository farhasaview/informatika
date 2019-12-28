<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('dosen/_partials/head'); ?>
</head>

<body id="page-top">
  <!-- Navbar -->
<nav class="navbar navbar-expand navbar-dark bg-primary static-top">

      <a class="navbar-brand mr-1" href="<?=base_url('berita')?>"><?= SITE_NAME ?></a>

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
        <li class="nav-item <?= $aktif=='berita' ? 'active' : '' ?>">
          <a class="nav-link" href="<?= base_url('berita')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown <?= $aktif=='berita' ? 'active' : '' ?>">
          <a class="nav-link dropdown-toggle" href="<?=base_url('berita')?>" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Setup</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('berita/add') ?>">Add Materi</a>
            <a class="dropdown-item" href="<?= base_url('berita') ?>">List Materi</a>
          </div>
        </li>
      </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php $this->load->view('dosen/_partials/breadcrumb'); ?>

      <!-- DataTables -->
      <div class="card mb-3">
        <div class="card-header">
          <a href="<?= base_url('admin')?>">
            <i class="fas fa-arrow-left"></i> Comeback home admin</a><br><br>
          <a href="<?= base_url('berita/add')?>">
            <i class="fas fa-plus"></i>Add Berita</a>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Judul</th>
                      <th>Sampul</th>
                      <th>Kategori</th>
                      <th>Konten</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      function limit_words($string, $word_limit){
                        $words = explode(" ",$string);
                        return implode(" ",array_splice($words,0,$word_limit));
                      }
                      foreach ($beritas as $berita) : ?>
                      <tr>
                        <td width="150"><?= $berita->judul ?></td>
                       <td>
                      <img src="<?=base_url('uploads/image/'.$berita->sampul)?>" width="64" />
                    </td>
                    <td><?= $berita->nama_kategori ?>
                    </td>
                     <td class="small">
                      <?= limit_words($berita->konten,30)?>...<a href="<?=base_url()?>berita/view/<?=$berita->id_berita?>"> Selengkapnya ></a></td>
                    <td width="250">
                      <a href="<?=base_url('berita/edit/'.$berita->id_berita)?>" class="btn btn-small"><i class="fas fa-edit"></i>Edit</a>
                     <a href="<?=base_url('berita/delete/'.$berita->id_berita)?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
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

<!--   <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script> -->

</body>

</html>