<?php
namespace App\Models;

use CodeIgniter\Model;

class MAdminbestseller extends Model
{
    // protected $table = 'my_table';

    public function getBestSeller()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.*, b.jenis_marmut, b.image_marmut, b.categories_marmut, b.harga, c.categories FROM t_marmutben_best_sellers as a 
            LEFT JOIN t_marmutben_products as b on a.marmut_id = b.id 
            LEFT JOIN t_marmutben_categories as c on b.categories_marmut = c.id 
            ORDER BY a.id ASC 
            LIMIT 6
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

    public function getListMarmutBestSeller($id_marmut){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.*, b.categories FROM t_marmutben_products as a
            LEFT JOIN t_marmutben_categories as b on a.categories_marmut = b.id
            WHERE b.status != 0
            AND a.id != '$id_marmut'
            ORDER BY id DESC
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getDataWidget($widget_id){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_best_sellers
            WHERE id = '$widget_id'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function updateBestSeller($widgetId, $marmut_id, $jumlah_terjual){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            UPDATE t_marmutben_best_sellers
            SET `marmut_id` = '$marmut_id', `jumlah_terjual` = '$jumlah_terjual'
            WHERE id = '$widgetId'
        ");
        return "success";
    }


}
