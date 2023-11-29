<?php
   include('templates/header.php');
?>
<link rel="stylesheet" href="<?= base_url() . "css/reseller.css" ?>">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>

</style>
<section class="reseller-register">
    <div class="row row-reseller">
        <div class="col-12 col-md-6 order-first order-md-first d-flex justify-content-center benefit-layer">
            <div class="reseller-benefit">
                <div class="reseller-benefit-title">
                    GABUNG MENJADI <br />RESELLER !
                </div>
                <div class="reseller-benefit-caption">
                    Kami mengundang Anda untuk bergabung sebagai mitra reseller kami. Dengan bergabung, Anda akan
                    menjadi bagian dari jaringan yang dinamis dan memberikan peluang bagi Anda untuk meraih
                    keberhasilan
                    bersama. <br /><br />
                    Dapatkan keuntungan potongan harga, diskon, pengiriman gratis, freebies, dukungan promosi, bantuan
                    pengiriman, dan informasi stok terbaru serta lelang bulanan melalui pendaftaran sebagai reseller. <br/><br/>
                    Jangan lewatkan kesempatan ini untuk menjalin kerjasama yang saling
                    menguntungkan. Ayo,
                    bergabunglah dan nikmati manfaat menjadi bagian dari tim kami!
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 order-last order-md-last d-flex justify-content-center register-card">
            <div class="card">
                <div class="card-body card-title-reseller">
                    <h5 class="card-title">DAFTAR RESELLER</h5>
                    <form>
                        <div class="mb-1">
                            <label for="nama_toko" class="form-label">Nama Toko</label>
                            <input type="text" class="form-control form-control-register" id="nama_toko"
                                name="nama_toko" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-1">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control form-control-register" id="alamat" name="alamat"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-register" id="email" name="email"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-1">
                            <label for="social_media" class="form-label">Social Media (Instagram)</label>
                            <input type="text" class="form-control form-control-register" id="social_media"
                                name="social_media" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-1">
                            <label for="whatsapp_number" class="form-label">No. Whatsapp</label>
                            <input type="text" class="form-control form-control-register" id="whatsapp_number"
                                name="whatsapp_number" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-1">
                            <label for="whatsapp_number" class="form-label">Deskripsi Toko</label>
                            <div class="form-floating">
                                <textarea class="form-control form-control-register" placeholder="Leave a comment here"
                                    id="floatingTextarea"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-register mt-2"
                            style="">
                            Ajukan Reseller</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inisialisasi Swiper -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 10,
    });
</script>

<?php 
   include('templates/footer.php');
?>