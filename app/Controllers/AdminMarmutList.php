<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAdminmarmutlist;

class AdminMarmutList extends BaseController
{
    public function index(){
        $modelMarmutList = new MAdminmarmutlist();
        $data['dataMarmut'] = $modelMarmutList->getListMarmut();

        return view('admin/marmut_list/index', $data);
    }

    public function edit($id){
        $modelMarmutList = new MAdminmarmutlist();
        $data['getMarmut'] = $modelMarmutList->checkMarmut($id);
        if(empty($data['getMarmut'])){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('message', 'Data Kategori Tidak Ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/best_seller');
        }

        $data['getCategories'] = $modelMarmutList->getCategories($data['getMarmut'][0]['categories_marmut']);
        return view('admin/marmut_list/edit', $data);
    }

    public function action_edit(){
        $postData = $this->request->getPost();

        $idMarmut = $postData['id_marmut'];
        $jenisMarmut = $postData['jenis_marmut'];
        $hargaMarmut = $postData['harga_marmut'];
        $categoriesMarmut = $postData['categories_marmut'];
        $description = $postData['description'];

        $targetDirectory =  base_url() . "images/";
        $newImageName = "";
        $sqlTambahan = "";

        $modelMarmutList = new MAdminmarmutlist();
        $isAvailable = $modelMarmutList->checkMarmutAvailable($jenisMarmut, $categoriesMarmut, $idMarmut);
        if(!empty($isAvailable)){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data duplikat!');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/list');
        }

        // Memeriksa apakah file gambar baru diunggah
if ($this->request->getFile('image_marmut')->isValid()) {
    $imageFile = $this->request->getFile('image_marmut');
    $imageExtension = $imageFile->getClientExtension();

    // Ambil jalur gambar lama dari database
    $oldImageFilePath = $modelMarmutList->getImageMarmutById($idMarmut);

    // Hapus gambar lama jika ada
    if (is_file($oldImageFilePath[0]['image_marmut'])) {
        unlink($oldImageFilePath[0]['image_marmut']);
    }

    // Membuat nama file gambar baru dengan format yang unik
    $newImageName = 'marmut_' . uniqid() . '.' . $imageExtension;
    
    // Sesuaikan $targetDirectory dengan path absolut ke direktori "images" yang sesuai
    $targetDirectory = FCPATH . 'images/';

    $imageFile->move($targetDirectory, $newImageName);

    // Update kolom 'image_marmut' dalam database
    $filePath = 'images/' . $newImageName; // Path relatif ke gambar
    $sqlTambahan = ", image_marmut = '$filePath'";
}


        // Old Data
        $oldData = $modelMarmutList->getOldMarmutData($idMarmut);

        // Update Data
        $updateData = $modelMarmutList->updateMarmutData($sqlTambahan, $jenisMarmut, $categoriesMarmut, $description, $hargaMarmut, $idMarmut);

        // New Data After Update
        $newData = $modelMarmutList->getNewMarmutData($idMarmut);

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
                $modelMarmutList->logRecord("UPDATE", "MARMUT", $idMarmut, $logText);
            }
        }


        $session = session();
        $session->setFlashdata('success_message', 'Data berhasil di Update!');
        // Mengarahkan pengguna kembali ke routes /kategori
        return redirect()->to(base_url().'admin/list');
    }
}