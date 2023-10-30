<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAdminpaket;

class AdminPaket extends BaseController
{
    public function index(){
        $modelPaket = new MAdminpaket();
        $data['dataPaket'] = $modelPaket->getListPaket();
        return view('admin/paket/index', $data);
    }

    public function delete_paket(){
        $modelPaket = new MAdminpaket();

        $postData = $this->request->getPost();

        $idPaket = $postData['id_paket'];
        $isAvailable = $modelPaket->checkPaket($idPaket);
        if(empty($isAvailable)){
            $session = session();
            $session->setFlashdata('error_message', 'Paket tidak ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/paket');
        }

        $deletePaket = $modelPaket->deletePaket($idPaket);
        if($deletePaket != "success"){
            
        }
        $logText = "Paket <b>".$isAvailable[0]['jenis']."</b> has been deleted.";
        $modelPaket->logRecord("DELETE", "PROMO", $idPaket, $logText);
        $session = session();
        $session->setFlashdata('success_message', 'Paket berhasil dihapus');
        // Mengarahkan pengguna kembali ke routes /kategori
        return redirect()->to(base_url().'admin/paket');
    }

    public function delete_all_paket(){
        $modelPaket = new MAdminpaket();
        $deleteAllPaket = $modelPaket->deleteAllPaket();

        if($deleteAllPaket == 'success'){
            $logText = "All paket has been deleted.";
            $modelPaket->logRecord("DELETE", "PAKET", "Delete All", $logText);

            $session = session();
            $session->setFlashdata('success_message', 'Semua paket berhasil dihapus');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/paket');
        }
    }

    public function import_paket() {
        $modelPaket = new MAdminpaket();
        
        if ($this->request->getFile('importFilePaket')) {
            $file = $this->request->getFile('importFilePaket');
            $tableName = 't_marmutben_paket';
    
            if ($file->getClientExtension() == 'csv') {
                if ($modelPaket->importCSVDataToDatabase($file->getPathname(), $tableName)) {
                    $logText = "Import data paket success.";
                    $modelPaket->logRecord("INSERT", "PAKET", "Import All", $logText);
                    $this->setFlashAndRedirect('success_message', 'Data berhasil diimpor ke dalam database');
                    return redirect()->to(base_url('admin/paket'));
                } else {
                    $this->setFlashAndRedirect('error_message', 'Gagal mengimpor data ke dalam database');
                    return redirect()->to(base_url('admin/paket'));
                }
            } else {
                $this->setFlashAndRedirect('error_message', 'File harus berformat CSV');
                return redirect()->to(base_url('admin/paket'));
            }
        } else {
            $this->setFlashAndRedirect('error_message', 'File CSV tidak ditemukan');
            return redirect()->to(base_url('admin/paket'));
        }
    }
    
    
    private function setFlashAndRedirect($key, $message) {
        $session = session();
        $session->setFlashdata($key, $message);
        return redirect()->to(base_url('admin/paket'));
    }
}