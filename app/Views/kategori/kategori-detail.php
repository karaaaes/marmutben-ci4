<?php
   include('templates/header.php');
?>
<section class="kategori_detail">
    <div id="project" class="project">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h3>Kategori</h3>
                    </div>
                </div>
            </div>
            <div class="menu">
                <div class="kategori-item">
                    <a href="<?= base_url() . 'kategori/1/1' ?>">
                        <div class="news_item">
                            <div class="news_img_kategori">
                                <figure><img src="<?= base_url('images/icon-little-marmut-new.png'); ?>"
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
                    <a href="<?= base_url() . 'kategori/2/1' ?>">
                        <div class="news_item">
                            <div class="news_img_kategori">
                                <figure><img src="<?= base_url('images/icon-little-marmut3.png'); ?>"
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
                    <a href="<?= base_url() . 'kategori/3/1' ?>">
                        <div class="news_item">
                            <div class="news_img_kategori">
                                <figure><img src="<?= base_url('images/icon-little-marmut-new1.png'); ?>"
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
                    <a href="<?= base_url() . 'kategori/4/1' ?>">
                        <div class="news_item">
                            <div class="news_img_kategori">
                                <figure><img src="<?= base_url('images/icon-little-marmut4.png'); ?>"
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
                    <a href="<?= base_url() . 'kategori/5/1' ?>">
                        <div class="news_item">
                            <div class="news_img_kategori">
                                <figure><img src="<?= base_url('images/icon-little-marmut5.png'); ?>"
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
                    <a href="<?= base_url() . 'kategori/6/1' ?>">
                        <div class="news_item">
                            <div class="news_img_kategori">
                                <figure><img src="<?= base_url('images/icon-little-marmut6.png'); ?>"
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
        <!-- Anakan section -->
        <div class="container" id="anakanSection">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h3>Marmut <?= $categoriesName; ?></h3>
                    </div>
                </div>
            </div>

            <div class="row mt-3" style="padding-left:15px; padding-right:15px;">
                <?php 
               // Mengambil data produk untuk halaman saat ini
               if (!empty($dataMarmutanakan)) {
                  foreach ($dataMarmutanakan as $marmutAnakan) {
                     $finalPrice = number_format($marmutAnakan['harga'], 0, '.', '.');
            ?>
                <div class="col-6 col-md-2 mb-3" style="padding-right: 0px; padding-left: 0px;">
                    <div class="menu-item menu-item-detail">
                        <a
                            href="marmut-detail.php?id=<?php echo $marmutAnakan['id']?>&categories=<?php echo $marmutAnakan['categories_marmut']?>">
                            <div class="news_item">
                                <div class="news_img_best news_img_best_category">
                                    <figure><img src="<?= base_url($marmutAnakan['image_marmut']); ?>"></figure>
                                </div>

                                <div class="news_text mb-2">
                                    <div class="title-marmut"><?php echo $marmutAnakan['jenis_marmut'] ?></div>
                                    <div class="price">Rp. <?php echo $finalPrice; ?></div>
                                    <div class="categories"><img src="<?= base_url('images/guinea-pig.png'); ?>"
                                            alt="Marmut Lucu"
                                            style="margin-right:6px;"><?php echo $marmutAnakan['categories'] ?></div>
                                </div>
                                <div class="col-md-12 text-center mb-2">
                                    <btn class="btn btn-primary w-100 buy-btn"
                                        style="padding:0.375rem 0.7rem !important;">
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
                <div class="col-md-12">
                    <!-- Pagination -->
                    <div class="pagination">
                        <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                        <a href="<?php echo site_url("kategori/{$categoriesId}/{$page}"); ?>"
                            class="<?php echo ($currentPage == $page) ? 'active' : ''; ?>">
                            <?php echo $page; ?>
                        </a>

                        <?php endfor; ?>
                    </div>
                    <!-- end six_box section -->
                    <a href="https://api.whatsapp.com/send?phone=6287780605997"><img
                            src="<?= base_url('images/whatsapp.webp'); ?>" id="whatsapp" class="whatsapp" alt=""></a>
                    <!-- End Pagination -->
                </div>
                <?php 
            }else{
            ?>
                <div class="col-12 col-md-12"
                    style="padding-right: 0px; padding-left: 0px; display:flex; text-align: center; justify-content: center;">
                    Data tidak Ditemukan
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
    <!-- End Anakan Section -->

    <!-- fashion section -->
    <div class="fashion mt-3 mb-3">
        <img src="<?= base_url('images/big-banner.jpg'); ?>" alt="#" />
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
                            <figure><img src="<?= base_url($promo['image_promo']); ?>"></figure>
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
</section>

<script>
    const whatsapp = document.getElementById("whatsapp");
    // Tampilkan atau sembunyikan tombol berdasarkan posisi scroll
    whatsapp.style.display = "block";

    document.querySelector('a[href="#myDiv"]').addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
<?php 
include('templates/footer.php');
?>