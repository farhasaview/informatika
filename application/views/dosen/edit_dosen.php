<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("dosen/_partials/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("dosen/_partials/navbar.php") ?>
  <div id="wrapper">

    <?php $this->load->view("dosen/_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php $this->load->view("dosen/_partials/breadcrumb.php") ?>

        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?= $this->session->flashdata('success') ?>
        </div>
        <?php endif; ?>

        <!-- Card  -->
        <div class="card mb-3">
          <div class="card-header">

            <a href="<?= base_url('dosen/') ?>"><i class="fas fa-arrow-left"></i>
              Back</a>
          </div>
          <div class="card-body">

            <form action="<?php base_url('dosen/edit_dosen') ?>" method="post" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?= $dosen->id_dosen ?>" />

              <div class="form-group">
                <label for="nama">Nama*</label>
                <input class="form-control <?= form_error('nama') ? 'is-invalid':'' ?>"
                 type="text" name="nama" placeholder="Nama" value="<?= $dosen->nama ?>" />
                <div class="invalid-feedback">
                  <?= form_error('nama') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="nidn">NIDN</label>
                <input class="form-control <?= form_error('nidn') ? 'is-invalid':'' ?>"
                 type="number" name="nidn" min="0" placeholder="NIDN" value="<?= $dosen->nidn ?>" />
                <div class="invalid-feedback">
                  <?= form_error('nidn') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control <?= form_error('password') ? 'is-invalid':'' ?>"
                 type="password" name="password" min="0" placeholder="Password" value="<?= $dosen->password ?>" />
                <div class="invalid-feedback">
                  <?= form_error('password') ?>
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