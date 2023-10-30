<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAdminsettings;

class AdminSettings extends BaseController
{
    public function index(){
        $modelSettings = new MAdminsettings();
        $data['dataConfig'] = $modelSettings->getListConfig();

        return view('admin/settings/index', $data);
    }

    public function edit_config(){
        $modelSettings = new MAdminsettings();
        $postData = $this->request->getPost();

        $emailNotifications = $postData['email_notifications'];
        $checkAvail = $modelSettings->getListConfig();

        if(empty($checkAvail)){
            $insertNotifications = $modelSettings->insertConfig($emailNotifications);
            if($insertNotifications != "success"){
                $session = session();
                $session->setFlashdata('error_message', 'Config gagal di input');
                // Mengarahkan pengguna kembali ke routes /kategori
                return redirect()->to(base_url().'admin/settings');
            }

            $logText = "Email Notifications is now set to $emailNotifications";
            $modelSettings->logRecord("INSERT", "SETTINGS", $emailNotifications, $logText);

            $session = session();
            $session->setFlashdata('success_message', 'Config berhasil di input');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/settings');
        }

        $updateNotifications = $modelSettings->updateConfig($emailNotifications);
        if($updateNotifications != 'success'){
            $session = session();
            $session->setFlashdata('error_message', 'Config gagal di update');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/settings');
        }

        $logText = "Email Notifications is now set to $emailNotifications";
        $modelSettings->logRecord("UPDATE", "SETTINGS", $emailNotifications, $logText);

        $session = session();
        $session->setFlashdata('success_message', 'Config berhasil di update');
        // Mengarahkan pengguna kembali ke routes /kategori
        return redirect()->to(base_url().'admin/settings');
    }
    
}