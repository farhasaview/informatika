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

        <div class="card mb-3">
          <div class="card-header">
            <a href="<?= base_url('dosen/materi') ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            <form action="<?php base_url('dosen/edit') ?>" method="post" enctype="multipart/form-data" >
              
              <input type="hidden" name="id" value="<?= $materi->id_materi?>" />

              <div class="form-group">
                <select name="id_dosen" id="SelectLm" class="form-control" required="true">
                  <option value="">Pilih Dosen</option>
                  <!-- relasi materi ke dosen -->
                  <?php foreach($dosens as $dosen): ?>
                    <option value="<?=$dosen->id_dosen?>" <?= $dosen->id_dosen==$materi->id_dosen ? 'Selected' : ''?> ><?=$dosen->nama?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= form_error('id_dosen') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="nama_materi">Nama Materi*</label>
                <input class="form-control <?= form_error('nama_materi') ? 'is-invalid':'' ?>"
                type="text" name="nama_materi" placeholder="Nama Materi" value="<?=$materi->nama_materi?>" />
                <div class="invalid-feedback">
                  <?= form_error('nama_materi') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="semester">Semester*</label>
                <input class="form-control <?= form_error('semester') ? 'is-invalid':'' ?>"
                type="number" name="semester" placeholder="Semester" value="<?=$materi->semester?>" />
                <div class="invalid-feedback">
                  <?= form_error('semester') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="file">File</label>
                <input class="form-control-file <?= form_error('file') ? 'is-invalid':'' ?>"
                type="file" name="file" value="<?=$materi->file?>" />
                 <input type="hidden" name="old_file" value="<?= $materi->file ?>" />
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