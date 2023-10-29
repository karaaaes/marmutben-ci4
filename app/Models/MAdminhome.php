<?php
namespace App\Models;

use CodeIgniter\Model;

class MAdminhome extends Model
{
    // protected $table = 'my_table';

    public function countMarmutCategories()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.id, COUNT(b.categories_marmut) as jumlah_data 
            FROM t_marmutben_categories as a 
            LEFT JOIN t_marmutben_products as b on a.id = b.categories_marmut
            GROUP BY a.id 
            ORDER BY a.id;
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getDataHit()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_hit 
            ORDER BY id
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getAllLog()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_log 
            ORDER BY timestamp DESC 
            LIMIT 4
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function getLog($firstDate , $lastDate){
        if($firstDate != "" && $lastDate != ""){
            $sql = "
                SELECT * FROM t_marmutben_log 
                WHERE timestamp BETWEEN '$firstDate' AND '$lastDate'
                ORDER BY id DESC
            ";
        }else{
            $sql = "
                SELECT * FROM t_marmutben_log 
                ORDER BY id DESC
            ";
        }

        $query = $this->db->query($sql);
        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }
}
