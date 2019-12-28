<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= $title;?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url()?>assets_admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url()?>assets_admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url()?>assets_admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets_admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url()?>assets_admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?= base_url()?>assets_admin/images/icon/logo ummi.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <h2>Reset Password</h2>
                        <hr />
                        <h5>Hello <span><?php echo $nama; ?></span>, silahkan isi form di bawah ini</h5>
                        <br />
                        <div class="login-form">
                            <form action='<?php base_url("lupa_password/reset_password/token/$token")?>' method="post">
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Masukan password baru kamu">
                                    <p> <?php echo form_error('password'); ?> </p>   
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" placeholder="Masukan kembali password baru kamu untuk konfirmasi">
                                    <p> <?php echo form_error('passconf'); ?> </p> 
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" onclick="btw()">Okay then let's submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url()?>assets_admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url()?>assets_admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url()?>assets_admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url()?>assets_admin/vendor/slick/slick.min.js">
    </script>
    <script src="<?= base_url()?>assets_admin/vendor/wow/wow.min.js"></script>
    <script src="<?= base_url()?>assets_admin/vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url()?>assets_admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= base_url()?>assets_admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url()?>assets_admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url()?>assets_admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url()?>assets_admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url()?>assets_admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url()?>assets_admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= base_url()?>assets_admin/js/main.js"></script>

    <!-- by the way -->
    <script type="text/javascript">
      function btw(){
         var tanya = confirm("Are you look nice by the way ?");
 
         if(tanya === true) {
            pesan = "Yes";
         }else{
            pesan = "Nope";
         }
 
         document.getElementById("pesan").innerHTML = pesan;
      }
    </script>

</body>

</html>
<!-- end document-->