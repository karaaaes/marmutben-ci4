<?php
namespace App\Models;

use CodeIgniter\Model;

class MAdminmarmutlist extends Model
{
    
    protected $table = 't_marmutben_products';

    public function getListMarmut()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.*, b.categories FROM t_marmutben_products as a
            LEFT JOIN t_marmutben_categories as b on a.categories_marmut = b.id
            WHERE b.status != 0
            ORDER BY id DESC
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function checkMarmut($idMarmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.*, b.categories FROM t_marmutben_products as a
            LEFT JOIN t_marmutben_categories as b on a.categories_marmut = b.id
            WHERE a.id = '$idMarmut'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getCategories($idCategories){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_categories
            WHERE id != '$idCategories'
            ORDER BY id ASC
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function checkAddMarmutAvailable($jenisMarmut, $categoriesMarmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT id 
            FROM t_marmutben_products 
            WHERE jenis_marmut = '$jenisMarmut' 
            AND categories_marmut = '$categoriesMarmut'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function checkMarmutAvailable($jenisMarmut, $categoriesMarmut, $idMarmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT id
            FROM t_marmutben_products
            WHERE jenis_marmut = '$jenisMarmut'
            AND categories_marmut = '$categoriesMarmut'
            AND id != '$idMarmut'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getImageMarmutById($idMarmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT image_marmut FROM t_marmutben_products
            WHERE id = '$idMarmut'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getOldMarmutData($idMarmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.id, a.jenis_marmut as `Jenis Marmut`, a.image_marmut as `Image Marmut`, b.categories `Kategori Marmut`, a.description as `Description`, a.harga as `Harga` 
            FROM t_marmutben_products as a
            LEFT JOIN t_marmutben_categories as b on a.categories_marmut = b.id 
            WHERE a.id = $idMarmut
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function insertMarmutData($jenisMarmut, $filePath, $categoriesMarmut, $description, $hargaMarmut, $dateCreated){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            INSERT INTO t_marmutben_products (jenis_marmut, image_marmut, categories_marmut, description, harga, date_created) 
            VALUES ('$jenisMarmut','$filePath','$categoriesMarmut','$description','$hargaMarmut','$dateCreated')
        ");

        return $query;
    }

    public function updateMarmutData($sqlTambahan = "", $jenisMarmut, $categoriesMarmut, $description, $hargaMarmut, $idMarmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            UPDATE t_marmutben_products SET `jenis_marmut`='$jenisMarmut', `categories_marmut` = '$categoriesMarmut',
            `description` = '$description', `harga` = '$hargaMarmut' $sqlTambahan
            WHERE id = '$idMarmut'
        ");

        return "success";
    }

    public function deleteMarmutData($idMarmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            DELETE FROM t_marmutben_products
            WHERE id = '$idMarmut'
        ");

        return "success";
    }

    public function getNewMarmutData($idMarmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.id, a.jenis_marmut as `Jenis Marmut`, a.image_marmut as `Image Marmut`, b.categories `Kategori Marmut`, a.description as `Description`, a.harga as `Harga` 
            FROM t_marmutben_products as a
            LEFT JOIN t_marmutben_categories as b on a.categories_marmut = b.id 
            WHERE a.id = $idMarmut
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    function logRecord($type, $menu, $item, $log){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
        INSERT INTO `t_marmutben_log` (type, menu, item, log)
        VALUES ('$type', '$menu', '$item', '$log')
        ");

        return "success";
    }

    public function getAllCategories(){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_categories 
            ORDER BY id ASC
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }
    
}
