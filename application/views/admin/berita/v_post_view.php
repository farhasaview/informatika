<!DOCTYPE html>
<html>
<head>
	<title><?php echo $berita['judul'];?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<div class="container">
		<br>
		<a href="<?= base_url()?>berita" type="button" class="btn btn-primary">Kembali</a>
		<div class="col-md-8 col-md-offset-2">
			<h2><?php echo $berita['judul'];?></h2><hr/>
			<p><?php echo $berita['tgl'];?> <?php $kategori = $berita['id_kategori'];
			if($kategori==1){
				echo "Akademik";
			}elseif($kategori==2){
				echo "Non Akademik";
			}else{
				echo $berita['id_kategori'];
			}
			?></p>
			<img src="<?php echo base_url().'uploads/image/'.$berita['sampul'];?>">
			<?php echo $berita['konten'];?><br><br>
		</div>
	</div>
	<script src="<?php echo base_url().'assets/jquery/jquery-2.2.3.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>
</html>