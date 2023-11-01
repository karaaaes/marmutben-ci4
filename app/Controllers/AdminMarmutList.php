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

    public function add(){
        $modelMarmutList = new MAdminmarmutlist();
        $data['dataCategories'] = $modelMarmutList->getAllCategories();
        return view('admin/marmut_list/add', $data);
    }

    public function action_add(){
        $modelMarmutList = new MAdminmarmutlist();
        $postData = $this->request->getPost();

        $jenisMarmut = $postData['jenis_marmut'];
        $hargaMarmut = $postData['harga_marmut'];
        $categoriesMarmut = $postData['categories_marmut'];
        $description = $postData['description'];
        $dateCreated = date("Y-m-d H:i:s");

        // Mengatur direktori tempat menyimpan gambar
        $imageFile = $this->request->getFile('image_marmut');
        $imageExtension = $imageFile->getClientExtension();
        $targetDirectory = 'images/'; // Gunakan WRITEPATH untuk direktori writable
        $newImageName = '';
        // Membuat nama file gambar baru dengan format yang unik
        $newImageName = 'marmut_' . uniqid() . '.' . $imageExtension;
        
        // Gunakan metode store untuk memindahkan file
        $imageFile->move($targetDirectory, $newImageName);

        $filePath = 'images/' . $newImageName;

        $isAvailable = $modelMarmutList->checkAddMarmutAvailable($jenisMarmut, $categoriesMarmut);
        if(!empty($isAvailable)){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data marmut sudah ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/list');
        }

        $insertData = $modelMarmutList->insertMarmutData($jenisMarmut, $filePath, $categoriesMarmut, $description, $hargaMarmut, $dateCreated);
        if ($insertData != TRUE) {
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data gagal di insert !');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/list');
        }

        $insertedId = $modelMarmutList->insertID(); // Mengambil ID hasil query INSERT
        $logText = "$jenisMarmut has been added to list.";
        $modelMarmutList->logRecord("INSERT", "MARMUT", $insertedId, $logText);
        $session = session();
        $session->setFlashdata('success_message', 'Data berhasil di insert !');
        // Mengarahkan pengguna kembali ke routes /kategori
        return redirect()->to(base_url('admin/list'));

    
    }

    public function edit($id){
        $modelMarmutList = new MAdminmarmutlist();
        $data['getMarmut'] = $modelMarmutList->checkMarmut($id);
        if(empty($data['getMarmut'])){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data Kategori Tidak Ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/list');
        }

        $data['getCategories'] = $modelMarmutList->getCategories($data['getMarmut'][0]['categories_marmut']);
        return view('admin/marmut_list/edit', $data);
    }

    public function action_edit(){
        $modelMarmutList = new MAdminmarmutlist();
        $postData = $this->request->getPost();

        $idMarmut = $postData['id_marmut'];
        $jenisMarmut = $postData['jenis_marmut'];
        $hargaMarmut = $postData['harga_marmut'];
        $categoriesMarmut = $postData['categories_marmut'];
        $description = $postData['description'];

        $targetDirectory =  base_url() . "images/";
        $newImageName = "";
        $sqlTambahan = "";

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

    public function action_delete(){
        $modelMarmutList = new MAdminmarmutlist();
        $postData = $this->request->getPost();

        $idMarmut = $postData['id_marmut'];
        $isAvail = $modelMarmutList->checkMarmut($idMarmut);
        $delete = $modelMarmutList->deleteMarmutData($idMarmut);

        if($delete != "success"){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Data marmut gagal dihapus');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/list');
        }

        // log write
        $logText = "Marmut ".$isAvail[0]['jenis_marmut']." has been deleted from list.";
        $modelMarmutList->logRecord("DELETE", "MARMUT", $idMarmut, $logText);

        // Menggunakan session untuk menyimpan pesan notifikasi
        $session = session();
        $session->setFlashdata('success_message', 'Data marmut berhasil dihapus');
        // Mengarahkan pengguna kembali ke routes /kategori
        return redirect()->to(base_url().'admin/list');
    }
}