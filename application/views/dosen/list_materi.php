<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('dosen/_partials/head'); ?>
</head>

<body id="page-top">
  <!-- Navbar -->
  <?php $this->load->view('dosen/_partials/navbar'); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('dosen/_partials/sidebar'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php $this->load->view('dosen/_partials/breadcrumb'); ?>

      <!-- DataTables -->
      <div class="card mb-3">
        <div class="card-header">
          <a href="<?= base_url('dosen/add')?>">
            <i class="fas fa-plus"></i>Add Materi</a></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Dosen</th>
                      <th>Nama Materi</th>
                      <th>Semester</th>
                      <th>File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Dosen</th>
                      <th>Nama Materi</th>
                      <th>Semester</th>
                      <th>File</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($materis as $materi): ?>
                      <tr>
                        <td width="150"><?= $materi->nama ?></td>
                       <td><?= $materi->nama_materi ?></td>
                     <td><?= $materi->semester ?></td>
                    <td><a href="<?=base_url('dosen/download/'.$materi->file)?>" class="fas fa-download">Download</a>
                    <td width="250">
                      <a href="<?=base_url('dosen/edit/'.$materi->id_materi)?>" class="btn btn-small"><i class="fas fa-edit"></i>Edit</a>
                      <a href="<?=base_url('dosen/delete/'.$materi->id_materi)?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
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
  <?php $this->load->view('dosen/_partials/modal');?>

  <!-- Bootstrap core JavaScript-->
  <!-- Core plugin JavaScript-->
  <!-- Page level plugin JavaScript-->
  <!-- Custom scripts for all pages-->
  <!-- Demo scripts for this page-->
  <?php $this->load->view('dosen/_partials/js'); ?>

 <!--  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script> -->

</body>

</html>