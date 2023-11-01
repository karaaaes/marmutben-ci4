<?php
namespace App\Models;

use CodeIgniter\Model;

class MAdminpromo extends Model
{
    protected $table = 't_marmutben_promo';
    public function getListPromoSection()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_promo 
            ORDER BY id DESC
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    function logRecord($type, $menu, $item, $log){
        // Contoh menjalankan kueri SQL SELECT
        $this->db->query("
        INSERT INTO `t_marmutben_log` (`type`, `menu`, `item`, `log`)
        VALUES ('$type', '$menu', '$item', '$log')
        ");

        return "success";
    }

    public function checkPromoAvailable($namaPromo)
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT id 
            FROM t_marmutben_promo 
            WHERE nama_promo = '$namaPromo' 
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }
    
    public function insertPromo($namaPromo, $filePath, $kodePromo, $jumlahPromo, $description, $startAt, $expiredAt, $status, $createdAt) {
        $data = [
            'nama_promo' => $namaPromo,
            'image_promo' => $filePath,
            'kode_promo' => $kodePromo,
            'jumlah_promo' => $jumlahPromo,
            'caption_promo' => $description,
            'start_at' => $startAt,
            'expired_at' => $expiredAt,
            'status' => $status,
            'created_at' => $createdAt,
        ];
    
        $this->db->table('t_marmutben_promo')->insert($data);
    
        return $this->db->insertID(); // Mengambil ID hasil query INSERT
    }

    public function getPromo($id){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_promo  
            WHERE id = '$id'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }
    
    public function checkPromo($namaPromo, $idPromo){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT id 
            FROM t_marmutben_promo 
            WHERE nama_promo = '$namaPromo' 
            AND id != '$idPromo'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getImagePromoById($idPromo){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT image_promo FROM t_marmutben_promo WHERE id = '$idPromo'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getOldPromoData($idPromo){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT id, nama_promo as `Nama Promo`, image_promo as `Image Promo`, kode_promo `Kode Promo`, 
            jumlah_promo as `Jumlah Promo`, caption_promo as `Caption Promo`, expired_at as `Expired At` 
            FROM t_marmutben_promo 
            WHERE id = $idPromo
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function updatePromoData($sqlTambahan = "", $namaPromo, $kodePromo, $jumlahPromo, $description, $expiredAt, $idPromo){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            UPDATE t_marmutben_promo SET `nama_promo`='$namaPromo', `kode_promo` = '$kodePromo', 
            `jumlah_promo` = '$jumlahPromo', `caption_promo` = '$description', `expired_at` = '$expiredAt' $sqlTambahan 
            WHERE id = '$idPromo'
        ");

        return "success";
    }

    public function getNewPromoData($idPromo){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT id, nama_promo as `Nama Promo`, image_promo as `Image Promo`, kode_promo `Kode Promo`, 
            jumlah_promo as `Jumlah Promo`, caption_promo as `Caption Promo`, expired_at as `Expired At` 
            FROM t_marmutben_promo 
            WHERE id = $idPromo
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function checkPromoEdit($idPromo){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_promo  
            WHERE id = '$idPromo'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function deletePromoData($id_promo){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            DELETE FROM t_marmutben_promo
            WHERE id = '$id_promo'
        ");

        return "success";
    }
}
