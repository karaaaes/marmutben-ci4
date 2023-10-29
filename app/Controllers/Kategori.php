<?php

namespace App\Controllers;
use App\Models\Mkategori;
use App\Models\Mpromo;

class Kategori extends BaseController
{
    public function index(){
        $modelKategori = new Mkategori();
        $data['dataMarmutanakan'] = $modelKategori->getKategoriMarmut(1);
        $data['dataMarmutRemaja'] = $modelKategori->getKategoriMarmut(2);
        $data['dataMarmutIndukan'] = $modelKategori->getKategoriMarmut(3);
        $data['dataMarmutBunting'] = $modelKategori->getKategoriMarmut(4);
        $data['dataMarmutIndukanHias'] = $modelKategori->getKategoriMarmut(5);
        $data['dataMarmutBuntingHias'] = $modelKategori->getKategoriMarmut(6);

        $modelPromo = new Mpromo(); 
        $data['dataPromo'] = $modelPromo->getListPromo();

        return view('kategori/kategori', $data);
    }

    public function detail($id, $page){
        $modelPromo = new Mpromo(); 
        $data['dataPromo'] = $modelPromo->getListPromo();

        $modelKategori = new Mkategori();
        $dataKategori = $modelKategori->checkCategories($id);

        if (empty($dataKategori)) {
            // Menggunakan session untuk menyimpan pesan notifikasi
            $session = session();
            $session->setFlashdata('message', 'Data Kategori Tidak Ada');
            // Mengarahkan pengguna kembali ke routes /kategori
            return redirect()->to(base_url().'kategori');
        }
        

        $categoriesName = $dataKategori[0]['categories'];
        $currentPage = isset($page) ? $page : 1;
        $itemsPerPage = 6; // Jumlah item per halaman
     
        // Fungsi untuk mengambil total jumlah item
        $totalItems = $modelKategori->getTotalItems($id);
        // Menghitung total halaman yang diperlukan
        $totalPages = ceil($totalItems / $itemsPerPage);
        // Menghitung offset
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Data to Parsed
        $data['categoriesId'] = $id;
        $data['categoriesName'] = $categoriesName;
        $data['dataMarmutanakan'] = $modelKategori->getKategoriMarmutDetail($id, $offset, $itemsPerPage);
        $data['currentPage'] = $currentPage;
        $data['totalPages'] = $totalPages;

        return view('kategori/kategori-detail', $data);
    }
}