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
    <title>Login Admin <?=SITE_NAME?></title>
    <link href="<?=base_url()?>assets_public/img/logo-min.png" rel="icon">

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
                        <?php if($this->session->flashdata('msg')){ ?>
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">!</span>
                                <?php echo $this->session->flashdata('msg') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        <?php } ?>                        
                        <div class="login-form">
                            <form action="<?= base_url()?>login/check" method="post">
                                <div class="form-group">
                                    <label> Email </label>
                                    <input class="au-input au-input--full" type="text" name="email" placeholder="masukan email user">
                                </div>
                                <div class="form-group">
                                    <label> Password </label>
                                    <input class="au-input au-input--full" type="password" name="password" id="myInput" placeholder="masukan password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" onclick="myFunction()">Show Password
                                    </label>
                                    <!-- <label>
                                        <a href="<?= base_url()?>Lupa_password">Forgotten Password?</a>
                                    </label> -->
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">login</button>
                            </div>
                        </div>
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

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</body>

</html>
<!-- end document-->