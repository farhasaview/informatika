<!doctype html>
<html lang="en">
<head>
  <?php $this->load->view('public/template/head'); ?>
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <?php $this->load->view('public/template/header'); ?>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Bottom Header -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">TI NEWS</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Profesional News Always Truted For Every Netizen</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- END Header -->
  <div class="blog-page area-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="page-head-blog">
            <div class="single-blog-page">
              <!-- search option start -->
              <form action="#">
                <div class="search-option">
                  <input type="text" placeholder="Search...">
                  <button class="button" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </form>
              <!-- search option end -->
            </div>
            <div class="single-blog-page">
              <!-- recent start -->
              <div class="left-blog">
                <h4>recent post</h4>
                <div class="recent-post">
                 <?php
                 function limit_words($string, $word_limit){
                  $words = explode(" ",$string);
                  return implode(" ",array_splice($words,0,$word_limit));
                }
                foreach ($data as $i) :
                  $i->id_berita;
                  $i->sampul;
                  $i->judul;
                  $i->konten;
                  $i->tgl;
                  $i->nama_kategori;
                  ?>
                  <!-- start single post -->
                  <div class="recent-single-post">
                    <div class="post-img">
                      <a href="#">
                       <img src="<?=base_url()?>uploads/image/<?=$i->sampul?>" alt="">
                     </a>
                   </div>
                   <div class="pst-content">
                    <p><a href="<?= base_url()?>berita_public"><?=limit_words($i->konten,9)?></a></p>
                  </div>
                </div>
                <!-- End single post -->
              <?php endforeach;?>
            </div>
          </div>
          <!-- recent end -->
        </div>
        <!-- <div class="single-blog-page">
          <div class="left-blog">
            <?php foreach($data as $i): ?>
              <h4>categories</h4>
              <ul>
                <li>
                  <a href="<?=base_url()?>berita_public"><?=$i->nama_kategori?></a>
                </li>
              </ul>
            </div>
          </div>
        <?php endforeach;?> -->
<!--             <div class="single-blog-page">
              <div class="left-blog">
                <h4>archive</h4>
                <ul>
                  <li>
                    <a href="#">07 July 2016</a>
                  </li>
                  <li>
                    <a href="#">29 June 2016</a>
                  </li>
                  <li>
                    <a href="#">13 May 2016</a>
                  </li>
                  <li>
                    <a href="#">20 March 2016</a>
                  </li>
                  <li>
                    <a href="#">09 Fabruary 2016</a>
                  </li>
                </ul>
              </div>
            </div> -->
           <!--  <div class="single-blog-page">
              <div class="left-tags blog-tags">
                <div class="popular-tag left-side-tags left-blog">
                  <h4>popular tags</h4>
                  <ul>
                    <li>
                      <a href="#">Portfolio</a>
                    </li>
                    <li>
                      <a href="#">Project</a>
                    </li>
                    <li>
                      <a href="#">Design</a>
                    </li>
                    <li>
                      <a href="#">Website</a>
                    </li>
                    <li>
                      <a href="#">Joomla</a>
                    </li>
                    <li>
                      <a href="#">Html</a>
                    </li>
                    <li>
                      <a href="#">wordpress</a>
                    </li>
                    <li>
                      <a href="#">Masonry</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?php
                foreach ($data as $i) :
                  $i->id_berita;
                  $i->sampul;
                  $i->judul;
                  $i->konten;
                  $i->tgl;
                  $i->nama_kategori;
                  ?>
                <div class="single-blog">
                  <div class="single-blog-img">
                    <a href="blog-details.html">
                     <img src="<?=base_url()?>uploads/image/<?=$i->sampul?>" alt="">
                   </a>
                 </div>
                 <div class="blog-meta">
                  <!-- <span class="comments-type">
											<i class="fa fa-comment-o"></i>
											<a href="#">11 comments</a>
										</span> -->
                    <span class="date-type">
                     <i class="fa fa-calendar"></i><?= $i->tgl?>
                   </span>
                   <span class="date-type">
                     <i class="fa fa-folder-open"></i><?= $i->nama_kategori?>
                   </span>
                 </div>
                 <div class="blog-text">
                  <h4>
                   <a href="#"><?php echo $i->judul;?></a>
                 </h4>
                 <p>
                  <?=limit_words($i->konten,50)?>
                </p>
              </div>
              <span>
                <a href="<?=base_url()?>berita_public/view/<?=$i->id_berita?>" class="ready-btn">Read more</a>
              </span>
            </div>
            <?php endforeach;?>
          </div>
          <!-- End single blog -->
        <!-- End single blog -->
        <div class="blog-pagination">
          <ul class="pagination">
            <li><a href="#">&lt;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Blog Area -->

<div class="clearfix"></div>

<!-- Start Footer bottom Area -->
<footer>
  <?php $this->load->view('public/template/footer'); ?>
</footer>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<?php $this->load->view('public/template/js'); ?>
</body>

</html>
