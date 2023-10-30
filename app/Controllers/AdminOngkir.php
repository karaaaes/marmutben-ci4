<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAdminmarmutlist;
use App\Models\MAdminongkir;

class AdminOngkir extends BaseController
{
    public function index(){
        $modelOngkir = new MAdminongkir();
        $data['dataOngkir'] = $modelOngkir->getListOngkir();

        return view('admin/ongkir/index', $data);
    }

    public function import_ongkir() {
        $modelOngkir = new MAdminongkir();
        
        if ($this->request->getFile('importFileOngkir')) {
            $file = $this->request->getFile('importFileOngkir');
            $tableName = 't_marmutben_ongkir';
    
            if ($file->getClientExtension() == 'csv') {
                if ($modelOngkir->importCSVDataToDatabase($file->getPathname(), $tableName)) {
                    $logText = "Import data ongkir success.";
                    $modelOngkir->logRecord("INSERT", "ONGKIR", "Import All", $logText);
                    $this->setFlashAndRedirect('success_message', 'Data berhasil diimpor ke dalam database');
                    return redirect()->to(base_url('admin/ongkir'));
                } else {
                    $this->setFlashAndRedirect('error_message', 'Gagal mengimpor data ke dalam database');
                    return redirect()->to(base_url('admin/ongkir'));
                }
            } else {
                $this->setFlashAndRedirect('error_message', 'File harus berformat CSV');
                return redirect()->to(base_url('admin/ongkir'));
            }
        } else {
            $this->setFlashAndRedirect('error_message', 'File CSV tidak ditemukan');
            return redirect()->to(base_url('admin/ongkir'));
        }
    }
    
    
    private function setFlashAndRedirect($key, $message) {
        $session = session();
        $session->setFlashdata($key, $message);
        return redirect()->to(base_url('admin/ongkir'));
    }
    

    public function delete_ongkir(){
        $modelOngkir = new MAdminongkir();
        $deleteAction = $modelOngkir->deleteAllOngkir();
        if ($deleteAction == "success") {
            $logText = "All ongkir has been deleted.";
            $modelOngkir->logRecord("DELETE", "ONGKIR", "Delete All", $logText);

            $session = session();
            $session->setFlashdata("success_message","Data ongkir berhasil dihapus");
            return redirect()->to(base_url('admin/ongkir'));
        }
    }

}