<?php

namespace App\Controllers;
use App\Models\Mmarmut;
use App\Models\Mpromo;
use PHPMailer\PHPMailer\PHPMailer;


class Marmut extends BaseController
{
    public function details($id, $id_categories){
        $modelPromo = new Mpromo(); 
        $modelMarmut = new Mmarmut();

        $dataMarmutDetail = $modelMarmut->getDetailMarmut($id, $id_categories);
        if(empty($dataMarmutDetail)){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('message', 'Data Kategori Tidak Ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'kategori');
        }

        $data['dataPromo'] = $modelPromo->getListPromo();
        $data['dataConfig']= $modelMarmut->setEmailNotif();
        $data['idCategories'] = $id_categories;
        $data['dataDetailMarmut'] = $dataMarmutDetail;
        
        return view('marmut/marmut-detail', $data);
    }

    public function hit($id_categories){
        $modelMarmut = new Mmarmut();
        $dataHitCategories = $modelMarmut->checkHitCategories($id_categories);
        
        if (!empty($dataHitCategories)) {
            $hit = (int)$dataHitCategories[0]['hit'];
            $updateHit = $hit + 1;
        }

        $updateHitCategories = $modelMarmut->updateHitCategories($updateHit, $id_categories);

        if ($updateHitCategories == "success") {
            $dataHitCategoriesNow = $modelMarmut->checkHitCategories($id_categories);
            if (!empty($dataHitCategoriesNow)) {
                $hitNow = (int)$dataHitCategoriesNow[0]['hit'];
                echo json_encode($hitNow);
            } else {
                echo "Data hit tidak ditemukan.";
            }
        } else {
            echo "Terjadi kesalahan saat mengupdate hit.";
        }
    }

    public function cek_promo($kode_promo){
        $modelMarmut = new Mmarmut();
        $dataPromo = $modelMarmut->checkPromo($kode_promo);

        if (!empty($dataPromo)) {
            $jumlahPromo = $dataPromo[0]["jumlah_promo"];
            echo json_encode(array("status" => "valid", "jumlahPromo" => $jumlahPromo));
        }else{
            echo json_encode(array("status" => "invalid"));
        }
    }

    public function buy(){
        $postData = $this->request->getPost();
        
        $idMarmut = $postData['id'];
        $idCategories = $postData['id_categories'];
        $marmutName = $postData['nama_marmut'];
        $marmutJumlah = $postData['jumlah'];
        $marmutHarga = $postData['harga_marmut'];
        $marmutCategories = $postData['kategori_marmut'];
        $emailNotifications = $postData['email_notifications'];
        $receiverName = $postData['receiver_name'];
        $receiverPhone = $postData['receiver_phone'];
        $receiverLocation = $postData['receiver_location'];

        $url = base_url() . "details/$idMarmut/$idCategories";

        $array = [
            "receiverName" => $receiverName,
            "marmutName" => $marmutName,
            "marmutCategories" => $marmutCategories,
            "marmutJumlah" => $marmutJumlah,
            "marmutHarga" => $marmutHarga,
            "receiverPhone" => $receiverPhone,
            "receiverLocation" => $receiverLocation,
            "emailNotifications" => $emailNotifications
        ];

        $modelMarmut = new Mmarmut();
        $sendEmail = $modelMarmut->sendEmail($array);

        if($sendEmail!="success"){
            return redirect()->to(base_url());
        }

        // Lakukan redirect ke URL WhatsApp
        $text = "text=Halo%2C%20nama%20saya%20$receiverName%20ingin%20membeli%20$marmutName%20$marmutCategories%20dengan%20jumlah%20$marmutJumlah%20pcs%20dan%20mendapatkan%20harga%20Rp%20$marmutHarga.%20Harga%20tersebut%20belum%20termasuk%20ongkir.%0A%0AHubungi saya%0AWhatsapp%20:%20$receiverPhone%0ALokasi%20:%20$receiverLocation%0ALink%20Marmut%20:%20$url";
        $url = "https://api.whatsapp.com/send?phone=6287780605997&$text";

        return redirect()->to($url);
    }

}