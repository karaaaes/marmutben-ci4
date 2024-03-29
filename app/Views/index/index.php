<meta name="keywords" content="marmut murah, jual marmut 2023, marmut terdekat, marmutben, marmut 2023, marmut">
<meta name="description" content="Jual beli marmut murah dan terpercaya - Bekasi">
<meta content="Jual marmut murah 2023 terlengkap dan terpercaya" itemprop="headline" />
<meta name="author" content="Marmutben">
<meta name="robots" content="index, follow">
<meta name="abstract"
   content="Selamat datang di marmutben.rakaeshardiansyah.my.id - Destinasi Terbaik untuk Marmut Impian Anda! Temukan koleksi eksklusif kami dari marmut yang lucu dan menggemaskan. Kami menyediakan marmut dengan beragam jenis, warna, dan karakter unik. Jelajahi sekarang dan bawa pulang teman berbulu Anda hari ini!">
<?php
include('templates/header.php');
include('core/core_functions.php');
?>
<!-- banner -->
<section class="banner_main">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="text-bg">
               <div class="pre-title">
                  Dapatkan marmut termurah hanya di
               </div>
               <h1> <span class="blodark"> MARMUTBEN</span>
               </h1>
               <div class="post-title">
                  Tempat jual dan beli marmut terpercaya!
               </div>
               <a class="read_more mb-3" href="/kategori">Beli Sekarang</a>
            </div>
         </div>
         <div class="col-md-4">
            <div class="ban_img">
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end banner -->

<!-- end six_box section -->
<a href="https://api.whatsapp.com/send?phone=6287780605997"><img src="images/whatsapp.webp" id="whatsapp"
      class="whatsapp" alt="nomor whatsapp marmutben marmut murah"></a>


<div class="container mt-3">
   <div class="row">
      <div class="col-md-12">
         <div class="titlepage">
            <h3>Kategori Populer</h3>
         </div>
      </div>
   </div>

   <div class="menu-container">
      <div class="menu">
         <div class="kategori-item">
            <a href="kategori-detail.php?categories=1">
               <div class="news_item">
                  <div class="news_img_kategori">
                     <figure><img src="images/icon-little-marmut-new.webp"
                           alt="display marmut murah meriah 2023. marmutben, tempat jual beli marmut termurah !">
                     </figure>
                  </div>
                  <div class="news_text mb-3">
                     <div class="title-kategori">Anakan</div>
                  </div>
               </div>
            </a>
         </div>
         <div class="kategori-item">
            <a href="kategori-detail.php?categories=2">
               <div class="news_item">
                  <div class="news_img_kategori">
                     <figure><img src="images/icon-little-marmut3.webp"
                           alt="display marmut murah meriah 2023. marmutben, tempat jual beli marmut termurah !">
                     </figure>
                  </div>
                  <div class="news_text mb-3">
                     <div class="title-kategori">Remaja</div>
                  </div>
               </div>
            </a>
         </div>
         <div class="kategori-item">
            <a href="kategori-detail.php?categories=3">
               <div class="news_item">
                  <div class="news_img_kategori">
                     <figure><img src="images/icon-little-marmut-new1.webp"
                           alt="display marmut murah meriah 2023. marmutben, tempat jual beli marmut termurah !">
                     </figure>
                  </div>
                  <div class="news_text mb-3">
                     <div class="title-kategori">Indukan</div>
                  </div>
               </div>
            </a>
         </div>
         <div class="kategori-item">
            <a href="kategori-detail.php?categories=4">
               <div class="news_item">
                  <div class="news_img_kategori">
                     <figure><img src="images/icon-little-marmut4.webp"
                           alt="display marmut murah meriah 2023. marmutben, tempat jual beli marmut termurah !">
                     </figure>
                  </div>
                  <div class="news_text mb-3">
                     <div class="title-kategori">Bunting</div>
                  </div>
               </div>
            </a>
         </div>
         <div class="kategori-item">
            <a href="kategori-detail.php?categories=5">
               <div class="news_item">
                  <div class="news_img_kategori">
                     <figure><img src="images/icon-little-marmut5.webp"
                           alt="display marmut murah meriah 2023. marmutben, tempat jual beli marmut termurah !">
                     </figure>
                  </div>
                  <div class="news_text mb-3">
                     <div class="title-kategori">Indukan Hias</div>
                  </div>
               </div>
            </a>
         </div>
         <div class="kategori-item">
            <a href="kategori-detail.php?categories=6">
               <div class="news_item">
                  <div class="news_img_kategori">
                     <figure><img src="images/icon-little-marmut6.webp"
                           alt="display marmut murah meriah 2023. marmutben, tempat jual beli marmut termurah !">
                     </figure>
                  </div>
                  <div class="news_text mb-3">
                     <div class="title-kategori">Bunting Hias</div>
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>
<div id="project" class="project">
   <!-- project section -->
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h3>Paling Laris</h3>
            </div>
         </div>
      </div>

      <div class="menu-container">
         <div class="menu">
            <?php
               // $dataBestSellerMarmut = getMarmutBestSeller();
               foreach ($bestSellers as $bestSeller) {
                  $finalPrice = number_format($bestSeller['harga'], 0, '.', '.');
            ?>
            <div class="menu-item">
               <a
                  href="<?php echo base_url() . "details/" . $bestSeller['marmut_id'] . "/". $bestSeller['categories_marmut']?>">
                  <div class="news_item">
                     <div class="news_img_best">
                        <figure><img src="<?php echo $bestSeller['image_marmut']; ?>"
                              alt="display marmut murah meriah 2023. marmutben, tempat jual beli marmut termurah !">
                        </figure>
                     </div>
                     <div class="news_text mb-3">
                        <div class="title-marmut"><?php echo $bestSeller['jenis_marmut']; ?><img
                              src="images/best-choice.png" alt="Hot Sale" style="margin-left:4px;"></div>
                        <div class="price">Rp. <?php echo $finalPrice; ?></div>
                        <div class="categories"><img src="images/guinea-pig.png" alt="Marmut Lucu"
                              style="margin-right:6px;"><?php echo $bestSeller['categories']?></div>
                        <div class="categories"><img src="images/money.png" alt="marmut terjual"
                              style="margin-right: 6px;"><?php echo $bestSeller['jumlah_terjual'] . " terjual"; ?></div>
                     </div>
                     <div class="col-md-12 text-center mb-2">
                        <btn class="btn btn-primary w-100 buy-btn" style="padding:0.375rem 0.7rem !important;">
                           Beli
                        </btn>
                     </div>
                  </div>
               </a>
            </div>
            <?php
}
?>
         </div>
         <div class="col-md-12">
            <a class="read_more" href="<?php echo base_url() . "kategori"?>">See More</a>
         </div>
      </div>
   </div>
   <!-- end project section -->

   <!-- fashion section -->
   <div class="fashion">
      <img src="images/big-banner.webp" alt="banner promo marmut" />
   </div>
   <!-- end fashion section -->


   <!-- promo section -->
   <div class="news mb-5">
      <div class="container">
         <div class="row mb-2">
            <div class="col-md-12">
               <div class="titlepage">
                  <h3>Promo Terbaru</h3>
               </div>
            </div>
         </div>
         <div class="row">
            <?php 
               foreach ($dataPromo as $promo) {
                $extractedCreatedAt = explode(" ", $promo['created_at']);
                $date = date_create($extractedCreatedAt[0]);
                $formattedDate = date_format($date, "M d, Y");
            ?>
            <div class="col-md-6 each-promo">
               <div class="row d_flex">
                  <div class="col-md-4 news_img_promo">
                     <figure><img src="<?php echo $promo['image_promo']; ?>"></figure>
                  </div>
                  <div class="col-md-8">
                     <div class="news_text_promo" style="">
                        <h4><?php echo $promo['nama_promo']; ?></h4>
                        <div class="created_date"><?php echo $formattedDate; ?></div>
                        <?php echo $promo['caption_promo']; ?>
                        <?php 
                                if($promo['kode_promo'] != '') {
                            ?>
                        <span class="kode_voucher">Kode voucher :
                           <?php echo $promo['kode_promo']; ?></strong></span>
                        <?php 
                                }else{
                            ?>
                        <span class="kode_voucher">Kode voucher tidak tersedia
                           <?php echo $promo['kode_promo']; ?></strong></span>
                        <?php 
                            
                                }?>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
            ?>
         </div>
      </div>
   </div>
   <!-- end promo section -->

   <?php
      include('templates/footer.php');
   ?>

   <script>
      const whatsapp = document.getElementById("whatsapp");
      // Tampilkan atau sembunyikan tombol berdasarkan posisi scroll
      whatsapp.style.display = "block";
   </script>