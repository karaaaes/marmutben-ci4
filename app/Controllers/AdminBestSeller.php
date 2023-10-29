<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAdminbestseller;

class AdminBestSeller extends BaseController
{
    public function index(){
        $modelBestseller = new MAdminbestseller();
        $data['dataBestSeller'] = $modelBestseller->getBestSeller();

        return view('admin/best_seller/index', $data);
    }

    public function edit($widget_id, $id){
        $modelBestseller = new MAdminbestseller();
        $data['getMarmut'] = $modelBestseller->checkMarmut($id);
        if(empty($data['getMarmut'])){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('message', 'Data Kategori Tidak Ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/best_seller');
        }

        $data['id'] = [$widget_id, $id];
        $data['marmutBestSeller'] = $modelBestseller->getListMarmutBestSeller($id);
        $data['marmutWidget'] = $modelBestseller->getDataWidget($widget_id);

        return view('admin/best_seller/edit', $data);
    }

    public function action_edit(){
        $postData = $this->request->getPost();

        $widgetId = $postData['widget_id'];
        $idMarmut = $postData['jenis_marmut'];
        $jumlahTerjual = $postData['jumlah_terjual'];

        $modelBestseller = new MAdminbestseller();
        $deleteAction = $modelBestseller->updateBestSeller($widgetId, $idMarmut, $jumlahTerjual);
        if($deleteAction == "success"){
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('success_message', 'Data best seller berhasil di update');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/best_seller');
        }else{
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('error_message', 'Gagal di update');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'admin/best_seller');
        }
    }
}
