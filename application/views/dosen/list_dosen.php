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

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Dosen</th>
                      <th>NIDN</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Dosen</th>
                      <th>NIDN</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($dosens as $dosen): ?>
                      <tr>
                        <td width="150"><?= $dosen->nama ?>
                      </td>
                       <td><?= $dosen->nidn ?>
                    </td>
                    <td width="250">
                      <a href="<?=base_url('dosen/edit_dosen/'.$dosen->id_dosen)?>" class="btn btn-small"><i class="fas fa-edit"></i>Edit</a>
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
  <?php $this->load->view('dosen/_partials/modal'); ?>

  <!-- Bootstrap core JavaScript-->
  <!-- Core plugin JavaScript-->
  <!-- Page level plugin JavaScript-->
  <!-- Custom scripts for all pages-->
  <!-- Demo scripts for this page-->
  <?php $this->load->view('dosen/_partials/js'); ?>

  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script>

</body>

</html>