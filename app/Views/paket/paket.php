<?php
   include('templates/header.php');
?>

<section class="paket">
   <div id="project" class="project">
      <!-- Detail Beli Section -->
      <div class="container container-paket" id="anakanSection">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h3>Cek Paket Marmut Cepat</h3>
               </div>
            </div>
            <div class="row form-ongkir mt-3">
               <div class="col-md-12">
                  <div class="form-group">
                     <label class="label-ongkir" for="jenisSelect">Jenis Marmut</label>
                     <select class="form-control form-control-sm" id="jenisSelect" name="jenis">
                        <option selected disabled>--Pilih Jenis Marmut--</option>
                        <?php 
                     foreach($dataWilayah as $data){
                  ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['jenis']; ?></option>
                        <?php   
                     }
                  ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="label-ongkir" for="anakan">Anakan</label>
                     <input type="text" class="form-control form-control-sm" id="anakan" name="anakan" aria-describedby="emailHelp"
                        readonly />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="label-ongkir" for="remaja">Remaja</label>
                     <input type="text" class="form-control form-control-sm" id="remaja" name="remaja" aria-describedby="emailHelp"
                        readonly />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="label-ongkir" for="indukJantan">Induk Jantan</label>
                     <input type="text" class="form-control form-control-sm" id="indukJantan" name="indukJantan"
                        aria-describedby="emailHelp" readonly />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="label-ongkir" for="indukBuntingan">Induk Buntingan</label>
                     <input type="text" class="form-control form-control-sm" id="indukBuntingan" name="indukBuntingan"
                        aria-describedby="emailHelp" readonly />
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label class="label-ongkir" for="hargaGrosir">Harga Grosir (Minimal 10 Ekor)</label>
                     <input type="text" class="form-control form-control-sm" id="hargaGrosir" name="hargaGrosir"
                        aria-describedby="emailHelp" readonly />
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <div class="exception">Ingin informasi lebih lanjut ?<br />
                        Hubungi Admin <a
                           href="https://api.whatsapp.com/send?phone=6287780605997&text=Halo%20Admin%20saya%20ingin%20bertanya%paket"
                           target="_blank" style="color:blue !important;">DISINI</a></div>
                  </div>
               </div>
            </div>
         </div>
         <hr class="mt-3" />
         <!-- end six_box section -->
         <a href="https://api.whatsapp.com/send?phone=6287780605997"><img src="images/whatsapp.webp" id="whatsapp"
               class="whatsapp" alt=""></a>
      </div>
      <!-- End Detail Beli Section -->
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
</section>


<script>
   const whatsapp = document.getElementById("whatsapp");
   // Tampilkan atau sembunyikan tombol berdasarkan posisi scroll
   whatsapp.style.display = "block";

   var jenisSelect = document.getElementById("jenisSelect");
   var anakanInput = document.getElementById("anakan");
   var remajaInput = document.getElementById("remaja");
   var indukanJantanInput = document.getElementById("indukJantan");
   var indukanBuntinganInput = document.getElementById("indukBuntingan");
   var hargaGrosirInput = document.getElementById("hargaGrosir");

   function formatNumberWithThousands(number) {
      var parts = number.toString().split(".");
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      return parts.join(".");
   }

   function fillOngkirInfo(selectedJenis) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
         if (this.readyState === 4 && this.status === 200) {
            var dataJenis = JSON.parse(this.responseText);

            if (dataJenis.length > 0) {
               var infoJenis = dataJenis[0];
               anakanInput.value = "Rp. " + formatNumberWithThousands(infoJenis.anakan);
               remajaInput.value = "Rp. " + formatNumberWithThousands(infoJenis.remaja);
               indukanJantanInput.value = "Rp. " + formatNumberWithThousands(infoJenis.induk_jantan);
               indukanBuntinganInput.value = "Rp. " + formatNumberWithThousands(infoJenis.induk_buntingan);
               hargaGrosirInput.value = "Rp. " + formatNumberWithThousands(infoJenis.grosir);

            } else {
               anakanInput.value = "Tidak Ditemukan";
               remajaInput.value = "Tidak Ditemukan";
               indukanJantanInput.value = "Tidak Ditemukan";
               indukanBuntinganInput.value = "Tidak Ditemukan";
               hargaGrosirInput.value = "Tidak Ditemukan";
            }
         }
      };
      xhttp.open("GET", "get_paket.php?id=" + selectedJenis,
         true);
      xhttp.send();
   }

   function resetOngkirFields() {
      anakanInput.value = "";
      remajaInput.value = "";
      indukanJantanInput.value = "";
      indukanBuntinganInput.value = "";
      hargaGrosirInput.value = "";
   }

   jenisSelect.addEventListener("change", function () {
      var selectedJenis = jenisSelect.value;
      fillOngkirInfo(selectedJenis);
   });
</script>

<?php 
   include('templates/footer.php');
   ?>