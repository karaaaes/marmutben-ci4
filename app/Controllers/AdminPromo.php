<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAdminpromo;

class AdminPromo extends BaseController
{
    public function index(){
        $modelPromo = new MAdminpromo();
        $data['dataPromo'] = $modelPromo->getListPromoSection();

        return view('admin/promo/index', $data);
    }

    public function add(){
        return view('admin/promo/add');
    }

    public function action_add(){
        $modelPromo = new MAdminpromo();
        $postData = $this->request->getPost();

        $namaPromo = $postData['nama_promo'];
        $kodePromo = $postData['kode_promo'];
        $jumlahPromo = $postData['jumlah_promo'];
        $description = $postData['description'];
        $startAt = date('Y-m-d H:i:s');
        $createdAt = date('Y-m-d H:i:s');
        $expiredAt = $postData['expired_at'] . " 23:55:00";
        $status = '1';

        // Mengatur direktori tempat menyimpan gambar
        $imageFile = $this->request->getFile('image_promo');
        $imageExtension = $imageFile->getClientExtension();
        $targetDirectory = 'images/'; // Gunakan WRITEPATH untuk direktori writable
        $newImageName = '';

        // Membuat nama file gambar baru dengan format yang unik
        $newImageName = 'marmut_' . uniqid() . '.' . $imageExtension;
        
        // Gunakan metode store untuk memindahkan file
        $imageFile->move($targetDirectory, $newImageName);

        $filePath = 'images/' . $newImageName;
    
        $isAvailable = $modelPromo->checkPromoAvailable($namaPromo);
        if(!empty($isAvailable)){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data promo sudah ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/promo');
        }

        $insertData = $modelPromo->insertPromo($namaPromo,$filePath,$kodePromo,$jumlahPromo,$description,$startAt, $expiredAt,$status,$createdAt);
        if ($insertData != TRUE) {
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data gagal di insert !');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/promo');
        }

        $insertedId = $modelPromo->insertID(); // Mengambil ID hasil query INSERT
  
        $logText = "Promo <b>".$namaPromo."</b> has been added.";
        $modelPromo->logRecord("INSERT", "PROMO", $insertedId, $logText);

        $session = session();
        $session->setFlashdata('success_message', 'Data promo berhasil ditambahkan!');
        // Mengarahkan pengguna kembali ke routes /kategori
        return redirect()->to(base_url().'admin/promo');
    }

    public function edit($id){
        $modelPromo = new MAdminpromo();
        $data['dataPromo'] = $modelPromo->getPromo($id);
        if(empty($data['dataPromo'])){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data Promo Tidak Ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/promo');
        }

        // Mengambil nilai tanggal dan waktu dari database
        $tanggal_waktu = $data['dataPromo'][0]['expired_at'];

        // Memisahkan tanggal dan waktu
        list($tanggal, $waktu) = explode(' ', $tanggal_waktu);

        // Mengonversi tanggal ke format "YYYY-MM-DD"
        $data['tanggal_format'] = date('Y-m-d', strtotime($tanggal));

        return view('admin/promo/edit', $data);
    }

    public function action_edit(){
        $modelPromo = new MAdminpromo();
        $postData = $this->request->getPost();

        $idPromo = $postData['id_promo'];
        $namaPromo = $postData['nama_promo'];
        $kodePromo = $postData['kode_promo'];
        $jumlahPromo = $postData['jumlah_promo'];
        $description = $postData['description'];
        $expiredAt = $postData['expired_at'] . " 23:55:00";

        $targetDirectory =  base_url() . "images/";
        $newImageName = "";
        $sqlTambahan = "";

        $isAvailable = $modelPromo->checkPromo($namaPromo, $idPromo);
        if(!empty($isAvailable)){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data duplikat!');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/promo');
        }

        // Memeriksa apakah file gambar baru diunggah
        if ($this->request->getFile('image_promo')->isValid()) {
            $imageFile = $this->request->getFile('image_promo');
            $imageExtension = $imageFile->getClientExtension();

            // Ambil jalur gambar lama dari database
            $oldImageFilePath = $modelPromo->getImagePromoById($idPromo);

            // Hapus gambar lama jika ada
            if (is_file($oldImageFilePath[0]['image_promo'])) {
                unlink($oldImageFilePath[0]['image_promo']);
            }

            // Membuat nama file gambar baru dengan format yang unik
            $newImageName = 'promo_' . uniqid() . '.' . $imageExtension;
    
            // Sesuaikan $targetDirectory dengan path absolut ke direktori "images" yang sesuai
            $targetDirectory = FCPATH . 'images/';

            $imageFile->move($targetDirectory, $newImageName);

            // Update kolom 'image_marmut' dalam database
            $filePath = 'images/' . $newImageName; // Path relatif ke gambar
            $sqlTambahan = ", image_promo = '$filePath'";
        }


        // Old Data
        $oldData = $modelPromo->getOldPromoData($idPromo);
        // Update Data
        $updateData = $modelPromo->updatePromoData($sqlTambahan, $namaPromo, $kodePromo, $jumlahPromo, $description, $expiredAt, $idPromo);
        // New Data After Update
        $newData = $modelPromo->getNewPromoData($idPromo);

        if($updateData){
            // Bandingkan nilai-nilai field satu per satu
            $changedFields = [];
            foreach ($oldData[0] as $field => $valueOldData) {
                $valueUpdated = $newData[0][$field]; // Menggunakan array asosiatif
                if ($valueOldData != $valueUpdated) {
                    $changedFields[$field] = $valueUpdated;
                }
            }
        }

        // Log jika ada field yang diupdate
        if (!empty($changedFields)) {
            foreach ($changedFields as $field => $valueUpdated) {
                $valueOldData = $oldData[0][$field];
                $logText = "Updated field: $field from <strong>" . $valueOldData . "</strong> to <strong>" . $valueUpdated . "</strong>";
                // Log write (gantilah ini dengan metode yang sesuai untuk aplikasi Anda)
                $modelPromo->logRecord("UPDATE", "PROMO", $idPromo, $logText);
            }
        }

        $session = session();
        $session->setFlashdata('success_message', 'Data berhasil di Update!');
        // Mengarahkan pengguna kembali ke routes /kategori
        return redirect()->to(base_url().'admin/promo');
    }

    public function action_delete(){
        $modelPromo = new MAdminpromo();
        $postData = $this->request->getPost();

        $idPromo = $postData['id_promo'];
        $isAvail = $modelPromo->checkPromoEdit($idPromo);
        $delete = $modelPromo->deletePromoData($idPromo);

        if($delete != "success"){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data promo gagal dihapus');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/promo');
        }

        // log write
        $logText = "Marmut ".$isAvail[0]['nama_promo']." has been deleted from list.";
        $modelPromo->logRecord("DELETE", "PROMO", $idPromo, $logText);

        // Menggunakan session untuk menyimpan pesan notifikasi
        $session = session();
        $session->setFlashdata('success_message', 'Data promo berhasil dihapus');
        // Mengarahkan pengguna kembali ke routes /kategori
        return redirect()->to(base_url().'admin/promo');
    }
}