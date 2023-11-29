<?php
   include('templates/header.php');
?>
<link rel="stylesheet" href="<?= base_url() . "css/reseller.css" ?>">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<section class="reseller">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 order-last order-md-first starter-text">
                <div class="title-reseller">
                    <h2>
                        Daftarkan dirimu menjadi reseller kami
                    </h2>
                </div>
                <div class="description-reseller">
                    <p>
                        Daftarkan dirimu menjadi reseller kami dan mulai perjalanan bisnis
                        yang menarik. Dapatkan keuntungan dari layanan dan produk
                        berkualitas tanpa perlu investasi besar. Segera bergabung dan
                        mulailah hari baru sebagai bagian dari komunitas reseller kami!
                    </p>
                </div>
                <div class="button-reseller">
                    <a class="register-button" href="<?= base_url() . "daftar-reseller" ?>">DAFTAR</a>
                    <a class="list-reseller-button" href="#">LIST RESELLER</a>
                </div>
            </div>
            <div class="col-12 col-md-6 order-first order-md-last">
                <img src="<?= base_url() . "images/reseller_1.svg" ?>" alt="">
            </div>
        </div>

    </div>
</section>
<section class="reseller-benefit" style="margin-top: 40px; background-color:#3D3F3C;">
    <div class="container">
        <div class="row row-index">
            <div class="col-12">
                <div class="title-benefit">
                    <h3>
                        Keuntungan menjadi reseller
                    </h3>
                </div>
                <div class="description-benefit">
                    <div class="benefit-item col-12 col-md-3">
                        <img src="<?= base_url() . "images/frame-1.svg" ?>" alt="">
                    </div>
                    <div class="benefit-item col-12 col-md-3">
                        <img src="<?= base_url() . "images/frame-2.svg" ?>" alt="">
                    </div>
                    <div class="benefit-item col-12 col-md-3">
                        <img src="<?= base_url() . "images/frame-3.svg" ?>" alt="">
                    </div>
                    <div class="benefit-item col-12 col-md-3">
                        <img src="<?= base_url() . "images/frame-4.svg" ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="reseller-list">
    <div class="container">
        <div class="row row-index-reseller-list">
            <div class="col-12">
                <div class="title-reseller-list">
                    <h3>
                        List Reseller
                    </h3>
                </div>
                <div class="search-bar">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="text" class="form-control mt-2" placeholder="Cari nama toko atau daerah">
                    </form>
                </div>
                <div class="reseller-list-card">
                    <div class="row">
                        <div class="col-12 col-md-4 mt-md-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-photo">
                                        <img src="<?= base_url() . "images/cover-card-1.svg" ?>" class="card-img-top"
                                            alt="...">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">MARMUTBEN STORE</h5>
                                    </a>
                                    <!-- Tambahkan class "geo-location" sesuai dengan lokasi yang ingin ditampilkan -->
                                    <div class="geo-location Bekasi">
                                        <a href="#">
                                            <img src="<?= base_url() . "images/google-maps-icon.webp" ?>" width="15"
                                                height="15" alt="marmutben-google-maps-icon">Tambun, Kab. Bekasi
                                        </a>
                                    </div>

                                    <div class="star">
                                        <img src="https://buildwithangga.com/themes/front/images/ic_star.svg" width="15"
                                            height="15" alt="">5.0 | 156 dilihat
                                    </div>
                                    <a href="#">
                                        <p class="card-text">Marmutben Store adalah sebuah toko marmut yang menjual
                                            banyak
                                            tipe marmut. Mulai dari lokal hingga marmut ras. Buruan dapatkan segera
                                            marmut
                                            impian kamu !</p>
                                    </a>
                                    <div class="card-contact">
                                        <div class="whatsapp-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/whatsapp-icon.svg" ?>"
                                                    alt="">085761221493
                                            </a>
                                        </div>
                                        <div class="instagram-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/instagram-icon.svg" ?>"
                                                    alt="">@marmut.murah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-md-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-photo">
                                        <img src="<?= base_url() . "images/cover-card-1.svg" ?>" class="card-img-top"
                                            alt="...">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">MARMUTBEN STORE</h5>
                                    </a>
                                    <div class="geo-location">
                                        <a href="#">
                                            <img src="<?= base_url() . "images/google-maps-icon.webp" ?>" width="15"
                                                height="15" alt="marmutben-google-maps-icon">Tambun, Kab. Bekasi
                                        </a>
                                    </div>
                                    <div class="star">
                                        <img src="https://buildwithangga.com/themes/front/images/ic_star.svg" width="15"
                                            height="15" alt="">5.0 | 156 dilihat
                                    </div>
                                    <a href="#">
                                        <p class="card-text">Marmutben Store adalah sebuah toko marmut yang menjual
                                            banyak
                                            tipe marmut. Mulai dari lokal hingga marmut ras. Buruan dapatkan segera
                                            marmut
                                            impian kamu !</p>
                                    </a>
                                    <div class="card-contact">
                                        <div class="whatsapp-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/whatsapp-icon.svg" ?>"
                                                    alt="">085761221493
                                            </a>
                                        </div>
                                        <div class="instagram-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/instagram-icon.svg" ?>"
                                                    alt="">@marmut.murah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-md-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-photo">
                                        <img src="<?= base_url() . "images/cover-card-1.svg" ?>" class="card-img-top"
                                            alt="...">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">MARMUTBEN STORE</h5>
                                    </a>
                                    <div class="geo-location">
                                        <a href="#">
                                            <img src="<?= base_url() . "images/google-maps-icon.webp" ?>" width="15"
                                                height="15" alt="marmutben-google-maps-icon">Tambun, Kab. Bekasi
                                        </a>
                                    </div>
                                    <div class="star">
                                        <img src="https://buildwithangga.com/themes/front/images/ic_star.svg" width="15"
                                            height="15" alt="">5.0 | 156 dilihat
                                    </div>
                                    <a href="#">
                                        <p class="card-text">Marmutben Store adalah sebuah toko marmut yang menjual
                                            banyak
                                            tipe marmut. Mulai dari lokal hingga marmut ras. Buruan dapatkan segera
                                            marmut
                                            impian kamu !</p>
                                    </a>
                                    <div class="card-contact">
                                        <div class="whatsapp-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/whatsapp-icon.svg" ?>"
                                                    alt="">085761221493
                                            </a>
                                        </div>
                                        <div class="instagram-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/instagram-icon.svg" ?>"
                                                    alt="">@marmut.murah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-md-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-photo">
                                        <img src="<?= base_url() . "images/cover-card-1.svg" ?>" class="card-img-top"
                                            alt="...">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">MARMUTBEN STORE</h5>
                                    </a>
                                    <div class="geo-location">
                                        <a href="#">
                                            <img src="<?= base_url() . "images/google-maps-icon.webp" ?>" width="15"
                                                height="15" alt="marmutben-google-maps-icon">Tambun, Kab. Bekasi
                                        </a>
                                    </div>
                                    <div class="star">
                                        <img src="https://buildwithangga.com/themes/front/images/ic_star.svg" width="15"
                                            height="15" alt="">5.0 | 156 dilihat
                                    </div>
                                    <a href="#">
                                        <p class="card-text">Marmutben Store adalah sebuah toko marmut yang menjual
                                            banyak
                                            tipe marmut. Mulai dari lokal hingga marmut ras. Buruan dapatkan segera
                                            marmut
                                            impian kamu !</p>
                                    </a>
                                    <div class="card-contact">
                                        <div class="whatsapp-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/whatsapp-icon.svg" ?>"
                                                    alt="">085761221493
                                            </a>
                                        </div>
                                        <div class="instagram-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/instagram-icon.svg" ?>"
                                                    alt="">@marmut.murah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mt-md-3">
                            <div class="card">
                                <a href="#">
                                    <div class="card-photo">
                                        <img src="<?= base_url() . "images/cover-card-1.svg" ?>" class="card-img-top"
                                            alt="...">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="#">
                                        <h5 class="card-title">MARMUTBEN STORE</h5>
                                    </a>
                                    <div class="geo-location">
                                        <a href="#">
                                            <img src="<?= base_url() . "images/google-maps-icon.webp" ?>" width="15"
                                                height="15" alt="marmutben-google-maps-icon">Tambun, Kab. Bekasi
                                        </a>
                                    </div>
                                    <div class="star">
                                        <img src="https://buildwithangga.com/themes/front/images/ic_star.svg" width="15"
                                            height="15" alt="">5.0 | 156 dilihat
                                    </div>
                                    <a href="#">
                                        <p class="card-text">Marmutben Store adalah sebuah toko marmut yang menjual
                                            banyak
                                            tipe marmut. Mulai dari lokal hingga marmut ras. Buruan dapatkan segera
                                            marmut
                                            impian kamu !</p>
                                    </a>
                                    <div class="card-contact">
                                        <div class="whatsapp-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/whatsapp-icon.svg" ?>"
                                                    alt="">085761221493
                                            </a>
                                        </div>
                                        <div class="instagram-icon">
                                            <a href="#">
                                                <img src="<?= base_url() . "images/instagram-icon.svg" ?>"
                                                    alt="">@marmut.murah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testimoni">
    <div class="container">
        <div class="title-reseller-list">
            <h3>
                Testimoni Sobat Benben
            </h3>
        </div>
    </div>
</section>

<?php 
   include('templates/footer.php');
?>