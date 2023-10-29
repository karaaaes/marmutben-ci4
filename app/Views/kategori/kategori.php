<?php
   include('templates/header.php');
   include('core/core_functions.php');
?>
<!-- Tampilkan Flashdata jika tersedia -->
<section class="kategori">
   <!-- six_box section -->
   <div id="project" class="project project-category">
      <div class="container">
         <?php if (session()->getFlashdata('message')) : ?>
         <div class="alert alert-danger" style="margin-top:120px;">
            <?= session()->getFlashdata('message') ?>
         </div>
         <?php endif; ?>
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h3>Kategori - Paling Laris</h3>
               </div>
            </div>
         </div>
         <div class="menu">
            <div class="kategori-item">
               <a href="kategori/1/1">
                  <div class="news_item">
                     <div class="news_img_kategori">
                        <figure><img src="images/icon-little-marmut-new.png"
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
               <a href="kategori/2/1">
                  <div class="news_item">
                     <div class="news_img_kategori">
                        <figure><img src="images/icon-little-marmut3.png"
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
               <a href="kategori/3/1">
                  <div class="news_item">
                     <div class="news_img_kategori">
                        <figure><img src="images/icon-little-marmut-new1.png"
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
               <a href="kategori/4/1">
                  <div class="news_item">
                     <div class="news_img_kategori">
                        <figure><img src="images/icon-little-marmut4.png"
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
               <a href="kategori/5/1">
                  <div class="news_item">
                     <div class="news_img_kategori">
                        <figure><img src="images/icon-little-marmut5.png"
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
               <a href="kategori/6/1">
                  <div class="news_item">
                     <div class="news_img_kategori">
                        <figure><img src="images/icon-little-marmut6.png"
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
      <!-- end six_box section -->


      <button id="scrollToTopBtn" class="scroll-to-top">Scroll to Top</button>
      <!-- end six_box section -->
      <a href="https://api.whatsapp.com/send?phone=6287780605997"><img src="images/whatsapp.webp" id="whatsapp"
            class="whatsapp" alt=""></a>


      <!-- Anakan Section -->
      <div class="container" id="anakanSection">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h3>Anakan</h3>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="menu">
               <?php 
                  if (!empty($dataMarmutanakan)) {
                  foreach ($dataMarmutanakan as $marmutAnakan) {
                     $finalPrice = number_format($marmutAnakan['harga'], 0, '.', '.');
               ?>
               <div class="menu-item">
                  <a
                     href="<?php echo base_url() . "details/" . $marmutAnakan['id'] . "/" . $marmutAnakan['categories_marmut'] ?>">
                     <div class="news_item">
                        <div class="news_img_best">
                           <figure><img src="<?php echo $marmutAnakan['image_marmut'] ?>"></figure>
                        </div>

                        <div class="news_text mb-2">
                           <div class="title-marmut"><?php echo $marmutAnakan['jenis_marmut'] ?></div>
                           <div class="price">Rp. <?php echo $finalPrice; ?></div>
                           <div class="categories"><img src="images/guinea-pig.png" alt="Marmut Lucu"
                                 style="margin-right:6px;"><?php echo $marmutAnakan['categories'] ?></div>
                        </div>
                        <div class="col-md-12 text-center">
                           <btn class="btn btn-primary w-100 buy-btn mb-3" style="padding:0.375rem 0.7rem !important;">
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
               <a class="read_more" href="kategori/1/1">See More</a>
            </div>
            <?php 
                  }else {
               ?>
            <div class="col-md-12 d-flex justify-content-center align-items-center mt-3">
               <p>Data Tidak Ditemukan</p>
            </div>
         </div>
         <?php    
                  }
               ?>
      </div>
   </div>
   <hr class="mt-3" style="margin-bottom: 0px !important;" />
   <!-- End Anakan Section -->

   <!-- Remaja Section -->
   <div class="container" id="remajaSection">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h3>Remaja</h3>
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="menu">
            <?php 
                  if (!empty($dataMarmutRemaja)) {
                     foreach ($dataMarmutRemaja as $marmutRemaja) {
                        $finalPrice = number_format($marmutRemaja['harga'], 0, '.', '.');
               ?>
            <div class="menu-item">
               <a
                  href="<?php echo base_url() . "details/" . $marmutRemaja['id'] . "/" . $marmutRemaja['categories_marmut'] ?>">
                  <div class="news_item">
                     <div class="news_img_best">
                        <figure><img src="<?php echo $marmutRemaja['image_marmut'] ?>"></figure>
                     </div>

                     <div class="news_text mb-2">
                        <div class="title-marmut"><?php echo $marmutRemaja['jenis_marmut'] ?></div>
                        <div class="price">Rp. <?php echo $finalPrice; ?></div>
                        <div class="categories"><img src="images/guinea-pig.png" alt="Marmut Lucu"
                              style="margin-right:6px;"><?php echo $marmutRemaja['categories'] ?></div>
                     </div>
                     <div class="col-md-12 text-center">
                        <btn class="btn btn-primary w-100 buy-btn mb-3" style="padding:0.375rem 0.7rem !important;">
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
            <a class="read_more" href="kategori/2/1">See More</a>
         </div>
         <?php 
                  } else {
            ?>
         <div class="col-md-12 d-flex justify-content-center align-items-center mt-3">
            <p>Data Tidak Ditemukan</p>
         </div>
      </div>
      <?php    
                  }
            ?>
   </div>
   </div>
   <hr class="mt-3" style="margin-bottom: 0px !important;" />
   <!-- End Remaja Section -->

   <!-- Indukan Section -->
   <div class="container" id="indukanSection">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h3>Indukan</h3>
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="menu">
            <?php 
                  if (!empty($dataMarmutIndukan)) {
                     foreach ($dataMarmutIndukan as $marmutIndukan) {
                        $finalPrice = number_format($marmutIndukan['harga'], 0, '.', '.');
               ?>
            <div class="menu-item">
               <a
                  href="<?php echo base_url() . "details/" . $marmutIndukan['id'] . "/" . $marmutIndukan['categories_marmut'] ?>">
                  <div class="news_item">
                     <div class="news_img_best">
                        <figure><img src="<?php echo $marmutIndukan['image_marmut'] ?>"></figure>
                     </div>

                     <div class="news_text mb-2">
                        <div class="title-marmut"><?php echo $marmutIndukan['jenis_marmut'] ?></div>
                        <div class="price">Rp. <?php echo $finalPrice; ?></div>
                        <div class="categories"><img src="images/guinea-pig.png" alt="Marmut Lucu"
                              style="margin-right:6px;"><?php echo $marmutIndukan['categories'] ?></div>
                     </div>
                     <div class="col-md-12 text-center">
                        <btn class="btn btn-primary w-100 buy-btn mb-3" style="padding:0.375rem 0.7rem !important;">
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
            <a class="read_more" href="kategori/3/1">See More</a>
         </div>
         <?php 
                  } else {
            ?>
         <div class="col-md-12 d-flex justify-content-center align-items-center mt-3">
            <p>Data Tidak Ditemukan</p>
         </div>
      </div>
      <?php    
                  }
            ?>
   </div>
   </div>
   <hr class="mt-3" style="margin-bottom: 0px !important;" />
   <!-- End Indukan Section -->

   <!-- Bunting Section -->
   <div class="container" id="buntingSection">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h3>Bunting</h3>
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="menu">
            <?php 
                  if (!empty($dataMarmutBunting)) {
                     foreach ($dataMarmutBunting as $marmutBunting) {
                        $finalPrice = number_format($marmutBunting['harga'], 0, '.', '.');
               ?>
            <div class="menu-item">
               <a
                  href="<?php echo base_url() . "details/" . $marmutBunting['id'] . "/" . $marmutBunting['categories_marmut'] ?>">
                  <div class="news_item">
                     <div class="news_img_best">
                        <figure><img src="<?php echo $marmutBunting['image_marmut'] ?>"></figure>
                     </div>

                     <div class="news_text mb-2">
                        <div class="title-marmut"><?php echo $marmutBunting['jenis_marmut'] ?></div>
                        <div class="price">Rp. <?php echo $finalPrice; ?></div>
                        <div class="categories"><img src="images/guinea-pig.png" alt="Marmut Lucu"
                              style="margin-right:6px;"><?php echo $marmutBunting['categories'] ?></div>
                     </div>
                     <div class="col-md-12 text-center">
                        <btn class="btn btn-primary w-100 buy-btn mb-3" style="padding:0.375rem 0.7rem !important;">
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
            <a class="read_more" href="kategori/4/1">See More</a>
         </div>
         <?php 
                  } else {
            ?>
         <div class="col-md-12 d-flex justify-content-center align-items-center mt-3">
            <p>Data Tidak Ditemukan</p>
         </div>
      </div>
      <?php    
                  }
            ?>
   </div>
   </div>
   <hr class="mt-3" style="margin-bottom: 0px !important;" />
   <!-- End Bunting Section -->

   <!-- IndukanHias Section -->
   <div class="container" id="indukanHiasSection">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h3>Indukan Hias</h3>
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="menu">
            <?php 
                  if (!empty($dataMarmutIndukanHias)) {
                     foreach ($dataMarmutIndukanHias as $marmutIndukanHias) {
                        $finalPrice = number_format($marmutIndukanHias['harga'], 0, '.', '.');
               ?>
            <div class="menu-item">
               <a
                  href="<?php echo base_url() . "details/" . $marmutIndukanHias['id'] . "/" . $marmutIndukanHias['categories_marmut'] ?>">
                  <div class="news_item">
                     <div class="news_img_best">
                        <figure><img src="<?php echo $marmutIndukanHias['image_marmut'] ?>"></figure>
                     </div>

                     <div class="news_text mb-2">
                        <div class="title-marmut"><?php echo $marmutIndukanHias['jenis_marmut'] ?></div>
                        <div class="price">Rp. <?php echo $finalPrice; ?></div>
                        <div class="categories"><img src="images/guinea-pig.png" alt="Marmut Lucu"
                              style="margin-right:6px;"><?php echo $marmutIndukanHias['categories'] ?></div>
                     </div>
                     <div class="col-md-12 text-center">
                        <btn class="btn btn-primary w-100 buy-btn mb-3" style="padding:0.375rem 0.7rem !important;">
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
            <a class="read_more" href="kategori/5/1">See More</a>
         </div>
         <?php 
                  } else {
            ?>
         <div class="col-md-12 d-flex justify-content-center align-items-center mt-3">
            <p>Data Tidak Ditemukan</p>
         </div>
      </div>
      <?php    
                  }
            ?>
   </div>
   </div>
   <hr class="mt-3" style="margin-bottom: 0px !important;" />
   <!-- End IndukanHias Section -->

   <!-- BuntingHias Section -->
   <div class="container" id="buntingHiasSection">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h3>Bunting Hias</h3>
            </div>
         </div>
      </div>
      <div class="row mt-3">
         <div class="menu">
            <?php 
                  if (!empty($dataMarmutBuntingHias)) {
                     foreach ($dataMarmutBuntingHias as $marmutBuntingHias) {
                        $finalPrice = number_format($marmutBuntingHias['harga'], 0, '.', '.');
               ?>
            <div class="col-md-2">
               <div class="menu-item">
                  <a
                     href="<?php echo base_url() . "details/" . $marmutBuntingHias['id'] . "/" . $marmutBuntingHias['categories_marmut'] ?>">
                     <div class="news_item">
                        <div class="news_img_best">
                           <figure><img src="<?php echo $marmutBuntingHias['image_marmut'] ?>"></figure>
                        </div>

                        <div class="news_text mb-2">
                           <div class="title-marmut"><?php echo $marmutBuntingHias['jenis_marmut'] ?></div>
                           <div class="price">Rp. <?php echo $finalPrice; ?></div>
                           <div class="categories"><img src="images/guinea-pig.png" alt="Marmut Lucu"
                                 style="margin-right:6px;"><?php echo $marmutBuntingHias['categories'] ?></div>
                        </div>
                        <div class="col-md-12 text-center">
                           <btn class="btn btn-primary w-100 buy-btn mb-3" style="padding:0.375rem 0.7rem !important;">
                              Beli
                           </btn>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
            <?php 
                     }
               ?>
         </div>
         <div class="col-md-12">
            <a class="read_more" href="kategori/6/1">See More</a>
         </div>
         <?php 
                  } else {
               ?>
         <div class="col-md-12 d-flex justify-content-center align-items-center mt-3">
            <p>Data Tidak Ditemukan</p>
         </div>
      </div>
      <?php    
                  }
               ?>
   </div>
   </div>
   <hr class="mt-3" style="margin-bottom: 0px !important;" />
   <!-- End BuntingHias Section -->

   <!-- fashion section -->
   <div class="fashion mt-5">
      <img src="images/big-banner.jpg" alt="#" />
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
   </div>
</section>
<script>
   document.querySelector('a[href="#myDiv"]').addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
         behavior: 'smooth'
      });
   });
</script>
<script>
   const scrollToTopBtn = document.getElementById("scrollToTopBtn");

   // Tampilkan atau sembunyikan tombol berdasarkan posisi scroll
   window.addEventListener("scroll", () => {
      if (window.scrollY > 100) {
         scrollToTopBtn.style.display = "block";
      } else {
         scrollToTopBtn.style.display = "none";
      }
   });

   const whatsapp = document.getElementById("whatsapp");
   // Tampilkan atau sembunyikan tombol berdasarkan posisi scroll
   whatsapp.style.display = "block";

   // Fungsi untuk menggulir ke atas
   scrollToTopBtn.addEventListener("click", () => {
      window.scrollTo({
         top: 0,
         behavior: "smooth"
      });
   });
</script>
<?php 
include('templates/footer.php');
?>